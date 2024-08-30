
@extends('body.cuerpo')
@extends('navbar.navbar')
@section('navbar')
@section('title', 'Ver Producto' .$datos)
@section('cuerpo')
   
<div class="container mt-5">
    <h2>Editar Categoría</h2>
    <form action="{{ route('categorias.update', $datos->ProveedorID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required value="{{ $proveedor->Nombre }}">
        </div>
        <div class="form-group mt-3">
            <label for="Telefono">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" required value="{{ $proveedor->Telefono }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Actualizar Proveedor</button>
        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
    </form>
</div>
@endsection()

