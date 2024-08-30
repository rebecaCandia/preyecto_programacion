<?php
namespace App\Http\Controllers;
use App\Models\Categoria;
use Spatie\FiareClient\Views;
use Illuminate\Http\Request;

class CategoriaController extends Controller

{
     // Listar todas las categorías
     public function index()
     {
         $categorias = Categoria::all();
         return view('categoria.categoria', ['categorias' => $categorias]);
     }
 
     // Mostrar el formulario para crear una nueva categoría
     public function create()
     {
         return view('categoria.creando');
     }
 
   
     // Guardar una nueva categoría en la base de datos
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'Nombre' => 'required|string|max:255|unique:categorias,Nombre',
         ]);
 
         Categoria::create($validatedData);
 
         return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
     }
 
     // Mostrar el formulario para editar una categoría existente
     public function edit($id)
     {
         $categoria = Categoria::findOrFail($id);
         return view('categoria.verCategoria', ["datos"=>$categoria]);
     }
 
     // Actualizar una categoría existente en la base de datos
     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'Nombre' => 'required|string|max:255|unique:categorias,Nombre,' . $id . ',CategoriaID',
         ]);
 
         $categoria = Categoria::findOrFail($id);
         $categoria->update($validatedData);
 
         return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
     }
 
     // Eliminar una categoría de la base de datos
     public function destroy($id)
     {
         $categoria = Categoria::findOrFail($id);
         $categoria->delete();
 
         return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
     }
 }