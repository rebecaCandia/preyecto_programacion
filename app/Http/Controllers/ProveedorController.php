<?php

namespace App\Http\Controllers;
use App\Models\Proveedor;
use Spatie\FiareClient\Views;
use Illuminate\Http\Request;
class ProveedorController extends Controller
{
   // Listar todos los proveedores
   public function index()
   {
       $proveedores = Proveedor::all();
       return view('proveedor.proveedor', ['proveedores' => $proveedores]);
   }

   // Mostrar el formulario para crear un nuevo proveedor
   public function create()
   {
       return view('proveedor.creando');
   }

   // Guardar un nuevo proveedor en la base de datos
   public function store(Request $request)
   {
       $validatedData = $request->validate([
           'Nombre' => 'required|string|max:255|unique:proveedors,Nombre',
           'Telefono' => 'required|string|max:20',
       ]);

       Proveedor::create($validatedData);

       return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
   }

   // Mostrar el formulario para editar un proveedor
   public function edit($id)
   {
       $proveedor = Proveedor::findOrFail($id);
       return view('proveedor.editar', ['proveedor' => $proveedor]);
   }

   // Actualizar un proveedor en la base de datos
   public function update(Request $request, $id)
   {
       $validatedData = $request->validate([
           'Nombre' => 'required|string|max:255|unique:proveedors,Nombre,' . $id . ',ProveedorID',
           'Telefono' => 'required|string|max:20',
       ]);

       $proveedor = Proveedor::findOrFail($id);
       $proveedor->update($validatedData);

       return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
   }

   // Eliminar un proveedor de la base de datos
   public function destroy($id)
   {
       $proveedor = Proveedor::findOrFail($id);
       $proveedor->delete();

       return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
   }
}