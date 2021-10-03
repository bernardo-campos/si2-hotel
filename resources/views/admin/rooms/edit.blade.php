@extends('adminlte::page')

@section('title', 'Editar habitación')

@section('content_header')
    <h1 class="m-0 text-dark">Editando habitación {{ $room->number }}</h1>
@stop

@section('content')

    @include('admin.rooms._form', [
        'action' => route('admin.rooms.update', $room),
        'method' => 'PUT',
        'room' => $room,
    ])

@stop

@push('js')
@endpush

@push('css')
@endpush