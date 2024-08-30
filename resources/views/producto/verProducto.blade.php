@extends('body.cuerpo')
@extends('navbar.navbar')
@section('navbar')
@section('title', 'Ver Producto' .$productos)
@section('cuerpo')
   
<div class="container mt-5">
    <h2>Editar Producto</h2>
    <form action="{{ route('productos.show', $datos->ProductoID) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required value="{{ $datos->Nombre }}">
        </div>
        
        <div class="form-group">
            <label for="PrecioUnitario">Precio Unitario</label>
            <input type="number" class="form-control" id="PrecioUnitario" name="PrecioUnitario" step="0.01" required value="{{ $datos->PrecioUnitario }}">
        </div>
        
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required value="{{ $datos->stock }}">
        </div>
        
        <div class="form-group">
            <label for="Descripcion">Descripción</label>
            <input type="text" class="form-control" id="Descripcion" name="Descripcion" rows="4" required value="{{ $datos->Descripcion }}">
        </div>

        <div class="form-group">
            <label for="CategoriaID">Categoría</label>
            <select class="form-control" id="CategoriaID" name="CategoriaID" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->CategoriaID }}" {{ $categoria->CategoriaID == $producto->CategoriaID ? 'selected' : '' }}>
                        {{ $categoria->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="ProveedorID">Proveedor</label>
            <select class="form-control" id="ProveedorID" name="ProveedorID" required>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->ProveedorID }}" {{ $proveedor->ProveedorID == $producto->ProveedorID ? 'selected' : '' }}>
                        {{ $proveedor->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>
</div>

@endsection()



