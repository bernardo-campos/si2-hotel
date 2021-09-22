@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('content_header')
    <h1 class="m-0 text-dark">Habitaciones</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            Buscar habitaciones
        </div>
        <div class="card-body">
            <div class="row">

                <x-adminlte-input
                    name="double_beds"
                    label="Número de camas dobles"
                    placeholder="0"
                    type="number"
                    igroup-size="sm"
                    fgroup-class="col-sm-4 col-md-3"
                    min=1 max=10>
                </x-adminlte-input>

                <x-adminlte-input
                    name="sinble_beds"
                    label="Número de camas simples"
                    placeholder="0"
                    type="number"
                    igroup-size="sm"
                    fgroup-class="col-sm-4 col-md-3"
                    min=1 max=10>
                </x-adminlte-input>

                <x-adminlte-input
                    name="from"
                    label="Desde"
                    type="date"
                    fgroup-class="col-sm-4 col-md-3"
                    igroup-size="sm">
                </x-adminlte-input>

                <x-adminlte-input
                    name="to"
                    label="Hasta"
                    type="date"
                    fgroup-class="col-sm-4 col-md-3"
                    igroup-size="sm">
                </x-adminlte-input>

            </div>
        </div>
        <div class="card-footer d-flex">
            <x-adminlte-button class="ml-auto"
                label="Buscar"
                theme="primary"
                icon="fas fa-search"
                type="submit"
            />
        </div>
    </div>

@stop

@push('js')
@endpush

@push('css')
@endpush