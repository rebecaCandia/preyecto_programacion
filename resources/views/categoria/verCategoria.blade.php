@extends('body.cuerpo')
@extends('navbar.navbar')
@section('navbar')
@section('title', 'Ver Categoria' .$datos)
@section('cuerpo')
<div class="container mt-5">
    <h2>Editar Categoría</h2>
    <form action="{{ route('categorias.update', $datos->CategoriaID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required value="{{$datos->Nombre}}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
    </form>
</div>
@endsection()