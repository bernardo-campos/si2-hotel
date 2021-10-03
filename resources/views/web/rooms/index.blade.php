@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('plugins.DateRangePicker', true)

@section('content_header')
    <h1 class="m-0 text-dark">Habitaciones</h1>
@stop

@section('content')

    @include('web.rooms.partials.search-form')

    @isset ($results)
        @include('web.rooms.partials.results', [
            'rooms' => request()->rooms,
            'capacity' => request()->capacity,
            'from' => substr(request()->range, 0, 10),
            'to' => substr(request()->range, -10),
        ])
    @endisset

@stop

@push('js')
@endpush

@push('css')
<style type="text/css">
    @include('_styles.background')
</style>
@endpush