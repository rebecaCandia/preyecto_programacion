@extends('body.cuerpo')
@extends('navbar.navbar')
@section('title', 'Producto')

@section('cuerpo')
    <div class="container my-5">
        <h1 class="text-center mb-4">Productos</h1>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('productos.crear') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-plus-lg"></i> Agregar producto
            </a>
        </div>
        
        <h2 class="text-center mb-4">Lista de Productos</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $index => $item)
                        <tr>
                            <th scope="row" class="text-center">{{ $index + 1 }}</th>
                            <td>{{ $item->Nombre }}</td>
                            <td>${{ number_format($item->PrecioUnitario, 2) }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->Descripcion }}</td>
                            <td class="text-center">
                                <a href="{{ route('productos.show', $item->ProductoID) }}" class="btn btn-primary btn-sm mx-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('productos.delete', $item->ProductoID) }}" method="POST" class="d-inline-block">
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
@endsection
