@extends('adminlte::page')

@section('title', 'Nueva reserva')

@section('content_header')
    <h1 class="m-0 text-dark">Nueva reserva</h1>
@stop

@section('content')

    <form class="form-horizontal" onsubmit="alert('submit'); return false;">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <x-adminlte-select
                        name="user_id"
                        label="Huésped" label-class="text-lightblue"
                        fgroup-class="col-md-6">
                        <option value="" selected disabled style="display:none">Elegir un Huésped de la lista...</option>
                        <option>Huésped 1</option>
                        <option>Huésped 2</option>
                    </x-adminlte-select>

                    <x-adminlte-input
                        name="cantidad"
                        type="number"
                        min="1"
                        label="Cantidad de personas"
                        fgroup-class="col-md-6"
                    />

                    <x-adminlte-input
                        name="ingreso"
                        type="date"
                        label="Fecha ingreso"
                        fgroup-class="col-md-6"
                    />

                    <x-adminlte-input
                        name="egreso"
                        type="date"
                        label="Fecha egreso"
                        fgroup-class="col-md-6"
                    />

                    <x-adminlte-select
                        name="services"
                        label="Servicios adicionales"
                        multiple
                        fgroup-class="col-md-6">
                        <option>Cunas</option>
                        <option>Camas</option>
                        <option>Estacionamiento</option>
                        <option></option>
                    </x-adminlte-select>

                    <x-adminlte-select
                        name="estado"
                        label="Estado"
                        fgroup-class="col-md-6">
                        <option>Vigente</option>
                        <option>Cancelada</option>
                        <option>Expirada</option>
                    </x-adminlte-select>

                </div>
            </div>
            <div class="card-footer d-flex">
                <x-adminlte-button class="ml-auto"
                    label="Guardar"
                    theme="primary"
                    icon="fas fa-save"
                    type="submit"
                />
            </div>
        </div>
    </form>

@stop

@push('js')
@endpush

@push('css')
@endpush