@extends('body.cuerpo')
@extends('navbar.navbar')
@section('navbar')
@section('title', 'Proveedores')
@section('cuerpo')
<div class="container mt-5">
    <h1 class="text-center mb-4">Proveedores</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-lg">
            <i class="bi bi-plus-lg"></i> Agregar Proveedor
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedores as $index => $proveedor)
                    <tr>
                        <th scope="row" class="text-center">{{ $index + 1 }}</th>
                        <td>{{ $proveedor->Nombre }}</td>
                        <td>{{ $proveedor->Telefono }}</td>
                        <td class="text-center">
                            <a href="{{ route('proveedores.edit', $proveedor->ProveedorID) }}" class="btn btn-primary btn-sm mx-1">
                                <i class="bi bi-pencil"></i> Editar
                            </a>
                            <form action="{{ route('proveedores.destroy', $proveedor->ProveedorID) }}" method="POST" class="d-inline-block">
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