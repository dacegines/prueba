@extends('adminlte::page')

@section('title', 'Crear Registro')

@section('content_header')
    <h1>Crear Nuevo Registro</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos problemas con tus entradas.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('crud.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre*</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('crud.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
