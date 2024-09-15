@extends('adminlte::page')

@section('title', 'Lista de Fotos')

@section('content_header')
    <h1>Lista de Fotos</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('fotos.create') }}" class="btn btn-primary mb-3">Subir Nueva Foto</a>

    <div class="row">
        @foreach($fotos as $foto)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $foto->ruta }}" class="card-img-top" alt="{{ $foto->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $foto->nombre }}</h5>
                        <form action="{{ route('fotos.destroy', $foto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta foto?')">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('css')
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
@stop
