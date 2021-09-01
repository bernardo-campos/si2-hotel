@extends('adminlte::page')

@section('title', 'Nuevo menú')

@section('content_header')
    <h1 class="m-0 text-dark">Nuevo menú</h1>
@stop

@section('content')

    <form class="form-horizontal" onsubmit="alert('submit'); return false;">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <x-adminlte-input
                        name="plato"
                        label="Plato"
                        placeholder="Ingrese el nombre del plato"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="precio"
                        type="number"
                        label="Precio (AR$)"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="ingredientes"
                        label="Ingredientes"
                        placeholder="Ingrese los ingredientes del plato"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-select
                        name="estado"
                        label="Disponible"
                        fgroup-class="col-md-6">
                        <option>Disponible</option>
                        <option>No disponible</option>
                    </x-adminlte-select>

                </div>
                <hr>
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