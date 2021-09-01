@extends('adminlte::page')

@section('title', 'Nuevo pago')

@section('content_header')
    <h1 class="m-0 text-dark">Nuevo pago</h1>
@stop

@section('content')

    <form class="form-horizontal" onsubmit="alert('submit'); return false;">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <x-adminlte-select
                        name="user_id"
                        label="Cliente" label-class="text-lightblue"
                        fgroup-class="col-md-6">
                        <option value="" selected disabled style="display:none">Elegir un cliente de la lista...</option>
                        <option>Cliente 1</option>
                        <option>Cliente 2</option>
                    </x-adminlte-select>

                    <div class="col-md-6"></div>

                    <x-adminlte-input
                        name="date"
                        type="date"
                        label="Fecha"
                        fgroup-class="col-md-4"
                    />

                    <x-adminlte-input
                        name="date_factura"
                        type="date"
                        label="Fecha Factura"
                        fgroup-class="col-md-4"
                    />

                    <x-adminlte-input
                        name="hora"
                        type="time"
                        label="Hora"
                        fgroup-class="col-md-4"
                    />

                    <x-adminlte-input
                        name="concepto"
                        type="text"
                        label="Concepto"
                        fgroup-class="col-md-4"
                    />

                    <x-adminlte-input
                        name="total"
                        type="number"
                        min="1"
                        label="Total (AR$)"
                        fgroup-class="col-md-4"
                    />

                    <x-adminlte-select
                        name="estado"
                        label="Estado"
                        fgroup-class="col-md-4">
                        <option>Pagado</option>
                        <option>No pagado</option>
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