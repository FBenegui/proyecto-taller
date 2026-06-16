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
        ]);         
        $producto = Producto::findOrFail($request->producto_id);         
        // Verificar stock antes de agregar         
        if ($producto->stock < $request->cantidad) {             
            return back()->with('error', 'No hay suficiente stock');         
            }         
        $carrito = $this->obtenerCarrito();         
        // ¿El producto ya está en el carrito?         
        $item = $carrito->detalles()                         
            ->where('producto_id', $producto->id)->first();         
        if ($item) {             
        // Si ya existe: suma la cantidad             
        $item->cantidad += $request->cantidad;             
        $item->subtotal  = $item->cantidad * $item->precio_unitario;             
        $item->save();         
        } 
        else {             
        // Si no existe: crea un nuevo ítem             
        $carrito->detalles()->create([                 
            'producto_id' => $producto->id,                 
            'cantidad' => $request->cantidad,                 
            'precio_unitario' => $producto->precio,                 
            'subtotal' => $producto->precio * $request->cantidad,             
            ]);         
            }         
        $this->recalcularTotal($carrito);         
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
