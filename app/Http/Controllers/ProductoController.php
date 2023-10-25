<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::where('vendedor_id', auth()->user()->id) // Filtra los productos del VENDEDOR LOGUEADO
        ->latest() // Ordena de manera DESC por el campo "created_at"
        ->get(); // Convierte los datos extraidos de la BD en un Array
        // Retornamos una vista y enviamos la variable "productos"
        return view('panel.vendedor.lista_productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        // Creamos un Producto nuevo para cargarle datos
        $producto = new Producto();
        // Recuperamos todas las categorias de la BD
        $categorias = Categoria::all(); // Recordar importar el modelo Categoria!!

        // Retornamos la vista de creacion de productos, enviamos el producto y las categorias
        return view('panel.vendedor.lista_productos.create', compact('producto', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $producto = new Producto();

        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->categoria_id = $request->get('categoria_id');
        $producto->vendedor_id = auth()->user()->id;

        if ($request->hasFile('imagen')) {
            // Subida de imagen al servidor (public > storage)
            $image_url = $request->file('imagen')->store('public/producto');
            $producto->imagen = asset(str_replace('public','storage', $image_url));
        } else {
            $producto->imagen = '';
        }
        // Almacena la info del producto en la BD
        $producto->save();

        return redirect()
            ->route('producto.index')
            ->with('alert', 'Producto "' . $producto->nombre . '" agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto){
        return view('panel.vendedor.lista_productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto){
        $categorias = Categoria::all();
    return view('panel.vendedor.lista_productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto){
        $producto->nombre = $request->get('nombre');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio = $request->get('precio');
        $producto->categoria_id = $request->get('categoria_id');

        if ($request->hasFile('imagen')) {
            // Subida de la imagen nueva al servidor
            $image_url = $request->file('imagen')->store('public/producto');
            $producto->imagen = asset(str_replace('public', 'storage', $image_url));
        }
        // Actualiza la info del producto en la BD
        $producto->update();

        return redirect()
            ->route('producto.index')
            ->with('alert', 'Producto "' .$producto->nombre. '" actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto){
        $producto->delete();
        return redirect()
            ->route('producto.index')
            ->with('alert', 'Producto eliminado exitosamente.');
    }
}
