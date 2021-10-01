@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1 class="m-0 text-dark">Pagos</h1>
    <a href="{{ route('attendant.payments.create') }}" class="ml-auto">
        <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
    </a>
@stop

@php
    $heads = [
        '',
        'Id',
        // 'Factura Nº'
        'Fecha Factura',
        'Fecha',
        'Hora',
        'Cliente',
        'Concepto',
        'Total (AR$)', // servicio, frigobar, servicio habitación,
        'Estado',
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