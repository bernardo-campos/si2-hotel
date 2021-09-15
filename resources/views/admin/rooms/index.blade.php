@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <div class="d-flex">
        <h1 class="m-0 text-dark">Habitaciones</h1>
        <a href="{{ route('admin.rooms.create') }}" class="ml-auto">
            <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop

@php
    $heads = [
        'Id',
        'Nº hab.',
        'TV',
        'Frigobar',
        'AC',
        '#camas',
        'AR$/noche',
    ];
@endphp

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">

                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($rooms as $room)
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->number }}</td>
                            <td>{{ $room->has_tv }}</td>
                            <td>{{ $room->has_minibar }}</td>
                            <td>{{ $room->has_ac }}</td>
                            <td>{{ $room->beds }}</td>
                            <td>{{ $room->price }}</td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>

            </div>
        </div>
    </div>

@stop

@push('js')
@endpush

@push('css')
@endpush