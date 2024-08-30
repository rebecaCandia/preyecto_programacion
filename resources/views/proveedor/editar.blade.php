@extends('body.cuerpo')
@extends('navbar.navbar')
@section('navbar')
@section('title', 'Editar Proveedor')
@section('cuerpo')
<div class="container mt-5">
    <h2>Editar Proveedor</h2>
    <form action="{{ route('proveedores.update', $proveedor->ProveedorID) }}" method="POST">
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
    </form>
</div>
@endsection