@extends('adminlte::page')

@section('title', 'Lista de Registros')

@section('content_header')
    <h1>Lista de Registros</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('crud.create') }}" class="btn btn-primary mb-3">Crear Nuevo Registro</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cruds as $crud)
                <tr>
                    <td>{{ $crud->id }}</td>
                    <td>{{ $crud->nombre }}</td>
                    <td>{{ $crud->descripcion }}</td>
                    <td>
                        <a href="{{ route('crud.edit', $crud->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('crud.destroy', $crud->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
