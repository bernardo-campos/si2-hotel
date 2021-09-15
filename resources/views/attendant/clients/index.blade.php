@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <div class="d-flex">
        <h1 class="m-0 text-dark">Clientes</h1>
        <a href="{{ route('attendant.clients.create') }}" class="ml-auto">
            <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop

@php
    // TODO: registrar "Nº de tarjeta"?

    $heads = [
        '',
        'Id',
        'DNI',
        'Apellido',
        'Nombre',
        'F. Nac.',
        'Correo electrónico',
        'Celular',
        'Dirección',
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