@extends('body.cuerpo')
@extends('navbar.navbar')
@section('navbar')
@section('title', 'Creando')

@section('cuerpo')
<div class="container mt-5">
    <h2>Agregar Producto</h2>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <div class="form-group mt-3">
            <label for="PrecioUnitario">Precio Unitario</label>
            <input type="number" class="form-control" id="PrecioUnitario" name="PrecioUnitario" step="0.01" required>
        </div>
        <div class="form-group mt-3">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group mt-3">
            <label for="Descripcion">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="4"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="CategoriaID">Categoría</label>
            <select class="form-control" id="CategoriaID" name="CategoriaID" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->CategoriaID }}">{{ $categoria->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="ProveedorID">Proveedor</label>
            <select class="form-control" id="ProveedorID" name="ProveedorID" required>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->ProveedorID }}">{{ $proveedor->Nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Agregar Producto</button>
    </form>
</div>

@endsection()