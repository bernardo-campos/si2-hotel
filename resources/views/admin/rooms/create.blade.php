@extends('adminlte::page')

@section('title', 'Nueva habitación')

@section('content_header')
    <h1 class="m-0 text-dark">Nueva habitación</h1>
@stop

@section('content')

    @include('admin.rooms._form', [
        'action' => route('admin.rooms.store'),
        'method' => false,
        'room' => new App\Models\Room(),
    ])

@stop

@push('js')
@endpush

@push('css')
@endpush