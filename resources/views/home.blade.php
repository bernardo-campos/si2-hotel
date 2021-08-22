@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1 class="m-0 text-dark">Inicio</h1>
@stop

@section('content')
    <div class="row justify-content-center pt-2">
        <div class="col-12 text-center">
            <h1>Bienvenido/a, {{ auth()->user()->name }}</h1>

        </div>
    </div>
@stop

@push('js')
@endpush

@push('css')
@endpush