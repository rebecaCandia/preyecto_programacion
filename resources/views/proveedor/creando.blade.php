@extends('body.cuerpo')
@extends('navbar.navbar')
@section('navbar')
@section('title', 'Agregar Proveedor')

@section('cuerpo')
<div class="container mt-5">
    <h2>Agregar Proveedor</h2>
    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="form-group mt-3">
            <label for="Telefono">Teléfono</label>
            <input type="text" class="form-control" id="Telefono" name="Telefono" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Agregar Proveedor</button>
    </form>
</div>
@endsection()