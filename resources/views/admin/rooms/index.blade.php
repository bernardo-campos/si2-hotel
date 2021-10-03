@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1 class="m-0 text-dark">Habitaciones</h1>
    <a href="{{ route('admin.rooms.create') }}" class="ml-auto">
        <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
    </a>
@stop

@php
    $heads = [
        '',
        'Id',
        'Nº hab.',
        'TV / Frigobar / AC',
        '#camas',
        'AR$/noche',
        '',
    ];
    $config = [
        'columns' => [null,null,null,null,null,null, ['orderable' => false]],
    ];
@endphp

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">

                <x-adminlte-datatable id="table1" :heads="$heads" :config="$config">
                    @foreach($rooms as $room)
                        <tr>
                            <td></td>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->number }}</td>
                            <td>
                                <div class="d-flex flex-column text-sm">
                                    <span class="{{ $room->has_tv ? 'available' : 'unavailable'}}">TV</span>
                                    <span class="{{ $room->has_minibar ? 'available' : 'unavailable'}}">Frigobar</span>
                                    <span class="{{ $room->has_ac ? 'available' : 'unavailable'}}">A.Ac</span>
                                </div>
                            </td>
                            <td class="text-sm">
                                Simples: {{ $room->single_beds }}
                                <br>
                                Dobles: {{ $room->double_beds }}
                                <br> Total: {{ $room->people }} personas
                            </td>
                            <td>$ {{ $room->price }}</td>
                            <td>
                                <a href="{{ route('admin.rooms.edit', $room) }}" class="btn btn-sm btn-warning py-0 px-1"><i class="fa fa-edit"></i></a>
                            </td>
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
<style type="text/css">
    .available {

    }
    .unavailable {
        text-decoration: line-through;
        color: gray;
    }
</style>
@endpush