@extends('adminlte::page')

@section('title', 'Mis Reservas')

@section('content_header')
    <div class="d-flex">
        <h1 class="m-0 text-dark">Mis Reservas</h1>
    </div>
@stop

@php
    $heads = [
        '',
        'Id',
        'N° Res',
        'Nº Tarjeta',
        'F. Ingreso',
        'F. Egreso',
        // 'Huésped',
        '#personas',
        'Serv. Adic.', // (camas y cunas adicionales, estacionamiento)
        'Estado', // (vigente, cancelada, expirada)
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