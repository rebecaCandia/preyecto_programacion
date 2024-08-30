@extends('body.cuerpo')
@extends('navbar.navbar')
@section('title', 'creando')

@section('cuerpo')
<div class="container mt-5">
    <h2>Agregar Categoría</h2>
    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Nombre">Nombre</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Categoría</button>
    </form>
</div>
@endsection()