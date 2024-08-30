@extends('body.cuerpo')
@extends('navbar.navbar')
@section('title', 'Categoria')

@section('cuerpo')
<div class="container mt-5">
    <h1 class="text-center mb-4">Categorías</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-lg"></i> Agregar Categoría
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $index => $categoria)
                    <tr>
                        <th scope="row" class="text-center">{{ $index + 1 }}</th>
                        <td>{{ $categoria->Nombre }}</td>
                        <td class="text-center">
                            <a href="{{ route('categorias.edit', $categoria->CategoriaID) }}" class="btn btn-primary btn-sm mx-1">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->CategoriaID) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mx-1">
                                    <i class="bi bi-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection()