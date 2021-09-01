@extends('adminlte::page')

@section('title', 'Nuevo empleado')

@section('content_header')
    <h1 class="m-0 text-dark">Nuevo empleado</h1>
@stop

@section('content')

    <form class="form-horizontal" onsubmit="alert('submit'); return false;">
        @csrf @method('PUT')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <x-adminlte-input
                        name="dni"
                        label="DNI"
                        placeholder="Ingrese sólo números"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="birthday"
                        type="date"
                        label="Fecha nacimiento"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="apellido"
                        label="Apellido"
                        placeholder="Ingrese el apelldo"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="nombre"
                        label="Nombre"
                        placeholder="Ingrese el nombre"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="phone"
                        label="Teléfono"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="email"
                        type="email"
                        label="Email"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="puesto"
                        type="text"
                        label="Puesto"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="turno"
                        type="text"
                        label="Turno"
                        fgroup-class="col-md-6"
                    />
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