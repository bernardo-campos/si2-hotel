@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
    <h1 class="m-0 text-dark">Empleados</h1>
    <a href="{{ route('admin.employees.create') }}" class="ml-auto">
        <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
    </a>
@stop

@php
    $heads = [
        '',
        'Id',
        'DNI',
        'Apellido',
        'Nombre',
        'Email',
        'Puesto',
        'Turno',
        ['label' => 'Teléfono', 'width' => 10],
        ['label' => 'F. Nac.', 'width' => 10],
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