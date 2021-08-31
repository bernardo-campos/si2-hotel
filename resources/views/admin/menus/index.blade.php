@extends('adminlte::page')

@section('title', 'Menús')

@section('content_header')
    <div class="d-flex">
        <h1 class="m-0 text-dark">Menús</h1>
        <a href="javascript:void(0)" class="ml-auto">
            <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
        </a>
    </div>
@stop
@php
    $heads = [
        ['label' => 'Id', 'width' => 8],
        'Plato',
        'Precio (AR$)',
        'Ingredientes',
        'Estado', // Disponible / No disponible
    ];
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">

                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach([] as $row)
                        <tr>
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