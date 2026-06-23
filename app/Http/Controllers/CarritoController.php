<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\Producto;
use App\Models\VentaDetalle;
use Illuminate\Support\Facades\DB;

class CarritoController extends Controller
{
    private function obtenerCarrito()     {        
        return VentaCabecera::firstOrCreate
        (['user_id' => auth()->id(), 'estado'  => 'carrito',],             
        // Si crea uno nuevo, arranca con total 0             
        ['total' => 0]);     
    }
    
    public function index(){         
        $carrito = $this->obtenerCarrito();         
        // with('producto') evita N+1: una sola consulta para todos los productos         
        $items = $carrito->detalles()->with('producto')->get();         
        return view('backend.usuarios.carrito', compact('carrito', 'items'));     
    } 

    public function agregar(Request $request){         
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad'    => 'required|integer|min:1',
        ], [
            'producto_id.required' => 'El producto es obligatorio.',
            'producto_id.exists' => 'El producto seleccionado no es válido.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad mínima es 1 unidad.',
        ]);
        $producto = Producto::findOrFail($request->producto_id);
        $carrito = $this->obtenerCarrito();         
        // ¿El producto ya está en el carrito?         
        $item = $carrito->detalles()                         
            ->where('producto_id', $producto->id)->first();         
        // Verificar stock antes de agregar (considerando la cantidad ya en el carrito)
        $cantidadSolicitada = (int) $request->cantidad;
        $cantidadExistente = $item ? (int) $item->cantidad : 0;
        $totalDeseado = $cantidadExistente + $cantidadSolicitada;

        if ((int) $producto->stock < $totalDeseado) {
            // Responder apropiadamente según el tipo de solicitud
            if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json(['error' => 'No hay suficiente stock', 'available' => (int)$producto->stock - $cantidadExistente], 422);
            }
            return back()->with('error', 'No hay suficiente stock');
        }

        if ($item) {
            // Si ya existe: suma la cantidad
            $item->cantidad = $totalDeseado;
            $item->subtotal  = $item->cantidad * $item->precio_unitario;
            $item->save();
        } else {
            // Si no existe: crea un nuevo ítem
            $carrito->detalles()->create([
                'producto_id' => $producto->id,
                'cantidad' => $cantidadSolicitada,
                'precio_unitario' => $producto->precio,
                'subtotal' => $producto->precio * $cantidadSolicitada,
            ]);
        }

        $this->recalcularTotal($carrito);

        if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json(['message' => 'Producto agregado al carrito', 'added' => $cantidadSolicitada], 200);
        }

        return back()->with('success', 'Producto agregado al carrito');
    } 

    public function eliminar($id)
    {         
        $carrito = $this->obtenerCarrito();         
        // where('id',$id) evita eliminar ítems de otro carrito         
        $carrito->detalles()->where('id', $id)->delete();         
        $this->recalcularTotal($carrito);         
        return back()->with('success', 'Producto eliminado');
    }

    public function vaciar()
    {
        $carrito = $this->obtenerCarrito();
        $carrito->detalles()->delete();
        $this->recalcularTotal($carrito);
        return back()->with('success', 'Carrito vaciado correctamente.');
    }

    public function incrementar($id)
    {
        $carrito = $this->obtenerCarrito();
        $item = $carrito->detalles()->where('id', $id)->firstOrFail();

        $producto = Producto::find($item->producto_id);
        if (!$producto) {
            return back()->with('error', 'Producto no encontrado.');
        }

        $nuevaCantidad = $item->cantidad + 1;
        if ($producto->stock < $nuevaCantidad) {
            return back()->with('error', 'No hay suficiente stock para aumentar la cantidad.');
        }

        $item->cantidad = $nuevaCantidad;
        $item->subtotal = $item->cantidad * $item->precio_unitario;
        $item->save();

        $this->recalcularTotal($carrito);
        return back()->with('success', 'Cantidad actualizada.');
    }

    public function decrementar($id)
    {
        $carrito = $this->obtenerCarrito();
        $item = $carrito->detalles()->where('id', $id)->firstOrFail();

        $item->cantidad = max(0, $item->cantidad - 1);
        if ($item->cantidad === 0) {
            $item->delete();
        } else {
            $item->subtotal = $item->cantidad * $item->precio_unitario;
            $item->save();
        }

        $this->recalcularTotal($carrito);
        return back()->with('success', 'Cantidad actualizada.');
    }

    public function actualizarCantidad(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1',
        ], [
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad mínima es 1 unidad.',
        ]);

        $carrito = $this->obtenerCarrito();
        $item = $carrito->detalles()->where('id', $id)->firstOrFail();

        $producto = Producto::find($item->producto_id);
        if (!$producto) {
            return back()->with('error', 'Producto no encontrado.');
        }

        $cantidad = (int) $request->cantidad;
        if ($cantidad > $producto->stock) {
            return back()->with('error', 'No hay suficiente stock para esa cantidad.');
        }

        $item->cantidad = $cantidad;
        $item->subtotal = $cantidad * $item->precio_unitario;
        $item->save();

        $this->recalcularTotal($carrito);
        return back()->with('success', 'Cantidad actualizada.');
    }
    
    public function confirmar()     
    {         
        $carrito = $this->obtenerCarrito();         
        if ($carrito->detalles()->count() === 0) 
            {             
                return back()->with('error', 'Tu carrito está vacío');         
            }         
            // recalcular para asegurar total actualizado
            $this->recalcularTotal($carrito);
            $items = $carrito->detalles()->with('producto')->get();

            // Ejecutar en transacción y bloquear filas de producto para evitar sobreventa
            DB::beginTransaction();
            try {
                $productIds = $items->pluck('producto.id')->filter()->unique()->values()->all();
                $productos = Producto::whereIn('id', $productIds)->lockForUpdate()->get()->keyBy('id');

                foreach ($items as $item) {
                    $pid = data_get($item, 'producto.id') ?? data_get($item, 'producto_id');
                    $cantidad = data_get($item, 'cantidad', 0);
                    $producto = $productos->get($pid);
                    if (!$producto) {
                        DB::rollBack();
                        return back()->with('error', 'Producto no encontrado en la compra');
                    }
                    if ($producto->stock < $cantidad) {
                        DB::rollBack();
                        return back()->with('error', "No hay suficiente stock para: {$producto->nombre}");
                    }
                    $producto->stock = $producto->stock - $cantidad;
                    $producto->save();
                }

                // Marcar carrito como confirmado y guardar fecha
                $carrito->update([
                    'estado' => 'confirmado',
                    'fecha_venta' => now(),
                ]);

                DB::commit();

                $total = $carrito->total;
                return redirect()->route('compra.confirmada')
                                ->with('items', $items)
                                ->with('total', $total);
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'No se pudo procesar la compra: ' . $e->getMessage());
            }
            } 

    private function recalcularTotal(VentaCabecera $carrito)
    {         
        // sum() suma todos los subtotales de los ítems del carrito         
        $total = $carrito->detalles()->sum('subtotal');         
        $carrito->update(['total' => $total]);     
    } 
}
