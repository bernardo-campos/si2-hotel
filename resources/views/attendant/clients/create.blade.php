@extends('adminlte::page')

@section('title', 'Nuevo cliente')

@section('content_header')
    <h1 class="m-0 text-dark">Nuevo cliente</h1>
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
                        label="Celular"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="address"
                        label="Dirección"
                        fgroup-class="col-md-6"
                    />
                </div>
                <hr>
                <div class="row">
                    <x-adminlte-input
                        name="email"
                        label="Correo electrónico"
                        type="email"
                        placeholder="email@ejemplo.com"
                        fgroup-class="col-md-6"
                    />
                    <x-adminlte-input
                        name="password"
                        label="Contraseña"
                        type="password"
                        placeholder="Cambiar contraseña"
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