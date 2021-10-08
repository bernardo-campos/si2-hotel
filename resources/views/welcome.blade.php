@extends('adminlte::page')

@section('title', 'Bienvenido')

@section('content_header')
@stop

@section('content')
    <div class="row flex-column align-items-center h-100 pt-2">
        <div class="display-2 font-google">Bienvenido</div>
        <div style="
            background-image: url('{{ asset('img/logo.svg')  }}');
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            align-self: stretch;
            flex-grow: 1;
            "></div>
        <div class="display-4 font-google text-white">~LUNA DANIELA~</div>
        <div class="display-4 font-google text-white">Hotel de PURMAMARCA</div>
    </div>
@stop

@push('js')
@endpush

@push('css')
<style type="text/css">
    .content-wrapper {
        position: relative;
    }
    .content {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
    }
    .container{
        height: 100%;
    }
    .font-google{
        font-family: 'Love Ya Like A Sister', cursive;
    }
    @include('_styles.background')
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">
@endpush
