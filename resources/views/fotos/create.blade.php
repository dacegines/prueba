
@extends('adminlte::page')

@section('title', 'Subir Foto')

@section('content_header')
    <h1>Subir Nueva Foto</h1>
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

    <form action="{{ route('fotos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre*</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto*</label>
            <input type="file" name="foto" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-success">Subir</button>
        <a href="{{ route('fotos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
