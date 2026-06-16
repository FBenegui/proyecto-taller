<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class productoController extends Controller
{
    public function index()
    {
        // Trae los productos, incluyendo los que tienen baja lógica
        $productos = Producto::withTrashed()->get(); 
        
        return view('backend.productos.index', compact('productos'));
    } 

    public function create()
    {
        return view('backend.productos.create');
    }

    public function store(Request $request)
    {
        // Guardamos lo que escribas en el formulario
        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => 1, // Le ponemos 1 para que no tire error si no hay categorías
            'activo' => true,
        ]);

        // Te devolvemos a la tabla para que veas tu producto nuevo
        return redirect('/productos');
    }

    public function edit($id)
    {
        // Buscamos el producto específico que se quiere editar
        $producto = Producto::findOrFail($id);
        
        // Lo mandamos a una vista nueva llamada 'edit'
        return view('backend.productos.edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        // Buscamos el producto y le actualizamos los datos
        $producto = Producto::findOrFail($id);
        
        $producto->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
        ]);

        // Volvemos a la tabla
        return redirect('/productos')->with('success', 'Producto actualizado.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        // Te devuelve a la misma página
        return redirect()->back()->with('success', 'Producto eliminado exitosamente.');
    }

    public function restore($id)
    {
        $producto = Producto::withTrashed()->findOrFail($id);
        $producto->restore();
        return redirect()->back()->with('success', 'Producto restaurado exitosamente.');
    }
}