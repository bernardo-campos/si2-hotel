@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1 class="m-0 text-dark">Habitaciones</h1>
    <a href="{{ route('attendant.rooms.create') }}" class="ml-auto">
        <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
    </a>
@stop

@php
    $heads = [
        '',
        'Id',
        'Nº',
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
                    @foreach([] as $row)
                        <tr>
                            <td></td>
                            @foreach($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
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