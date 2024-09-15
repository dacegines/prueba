@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel <span class="text-danger">ESTO ES UNA PRUEBA Parece que el proyecto va bien.</span></p>
    <br>
    <p class="text-primary">La programacion es bonita pero te tiene que gustar</p>
    <br>
    <p class="text-success">Ahora esto es un texto Verde</p>
    <br>
    <p class="text-warning">Ahora este es un texto amarillo</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
