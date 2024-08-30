<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Categoria;
use Spatie\FiareClient\Views;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('producto.productos', ['productos' => $productos]);
    }

    public function crear()
    {
        $proveedores = Proveedor::all();
        $categorias = Categoria::all();
        return view('producto.creando', compact('proveedores', 'categorias'));
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        $categorias = Categoria::all();
        $proveedores = Proveedor::all();
        return view('producto.editar', compact('producto', 'categorias', 'proveedores'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nombre' => 'required|string|max:255|unique:productos,Nombre',
            'stock' => 'required|integer|min:0',
            'PrecioUnitario' => 'required|numeric|min:0',
            'Descripcion' => 'nullable|string|max:1000',
            'CategoriaID' => 'required|exists:categorias,CategoriaID',
            'ProveedorID' => 'required|exists:proveedors,ProveedorID',
        ]);

        Producto::create($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    public function destroy($ProductoID)
    {
        $producto = Producto::findOrFail($ProductoID);
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nombre' => 'required|string|max:255|unique:productos,Nombre,' . $id . ',ProductoID',
            'stock' => 'required|integer|min:0',
            'PrecioUnitario' => 'required|numeric|min:0',
            'Descripcion' => 'nullable|string|max:1000',
            'CategoriaID' => 'required|exists:categorias,CategoriaID',
            'ProveedorID' => 'required|exists:proveedors,ProveedorID',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($validatedData);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }
}