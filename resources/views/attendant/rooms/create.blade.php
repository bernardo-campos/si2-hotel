@extends('adminlte::page')

@section('title', 'Nueva habitación')

@section('content_header')
    <h1 class="m-0 text-dark">Nueva habitación</h1>
@stop

@section('content')

    <form class="form-horizontal" onsubmit="alert('submit'); return false;">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <x-adminlte-input
                        name="number"
                        type="number"
                        min="1"
                        label="Nº de habitación"
                        fgroup-class="col-md-6"
                    />

                    <div class="col-md-6">
                        <div class="form-check">
                            <input id="tv" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="tv">TV</label>
                        </div>
                        <div class="form-check">
                            <input id="frigobar" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="frigobar">Frigobar</label>
                        </div>
                        <div class="form-check">
                            <input id="ac" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="ac">AC</label>
                        </div>
                    </div>

                    <x-adminlte-input
                        name="camas"
                        type="number"
                        min="1"
                        label="Cantidad de camas"
                        fgroup-class="col-md-6"
                    />

                    <x-adminlte-input
                        name="precio"
                        type="number"
                        min="1"
                        label="Precio por noche (AR$)"
                        fgroup-class="col-md-6"
                    />

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