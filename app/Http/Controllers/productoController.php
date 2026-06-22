<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class productoController extends Controller
{
    public function index()
    {
        // Si el usuario autenticado es admin mostramos el panel de backend
        if (Auth::check() && method_exists(Auth::user(), 'rol') && Auth::user()->rol && Auth::user()->rol->nombre === 'admin') {
            $productos = Producto::withTrashed()->with('categoria')->get();
            return view('backend.productos.index', compact('productos'));
        }

        // Para visitantes y clientes mostramos catálogo público con productos activos
        $productos = Producto::where('activo', true)->with('categoria')->get();
        return view('productos', compact('productos'));
    } 

    public function create()
    {
        $categorias = \App\Models\Categoria::all();
        return view('backend.productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // Guardamos lo que escribas en el formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|max:5120',
        ]);

        $data = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
            'activo' => true,
        ];

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/','', $file->getClientOriginalName());
            $destination = public_path('imagenes');
            $file->move($destination, $filename);
            $data['url_imagen'] = 'imagenes/' . $filename;
        }

        Producto::create($data);

        // Te devolvemos a la tabla para que veas tu producto nuevo
        return redirect('/productos');
    }

    public function edit($id)
    {
        // Buscamos el producto específico que se quiere editar
        $producto = Producto::findOrFail($id);
        $categorias = \App\Models\Categoria::all();
        return view('backend.productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        // Buscamos el producto y le actualizamos los datos
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id',
            'imagen' => 'nullable|image|max:5120',
        ]);

        $data = [
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'categoria_id' => $request->categoria_id,
        ];

        if ($request->hasFile('imagen')) {
            // borrar imagen anterior si existe
            if (!empty($producto->url_imagen) && file_exists(public_path($producto->url_imagen))) {
                @unlink(public_path($producto->url_imagen));
            }

            $file = $request->file('imagen');
            $filename = time() . '_' . preg_replace('/[^a-zA-Z0-9-_\.]/','', $file->getClientOriginalName());
            $destination = public_path('imagenes');
            $file->move($destination, $filename);
            $data['url_imagen'] = 'imagenes/' . $filename;
        }

        $producto->update($data);

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

    public function categoria($slug)
    {
        $categoria = \App\Models\Categoria::where('slug', $slug)->firstOrFail();
        $productos = Producto::where('categoria_id', $categoria->id)
                        ->where('activo', true)
                        ->with('categoria')
                        ->get();

        return view('productos', compact('productos', 'categoria'));
    }

    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);

        return view('producto', compact('producto'));
    }

    public function modal($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);

        return view('partials.producto-modal', compact('producto'));
    }
}