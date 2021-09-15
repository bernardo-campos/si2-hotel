@extends('adminlte::page')

@section('title', 'Nueva habitación')

@section('content_header')
    <h1 class="m-0 text-dark">Nueva habitación</h1>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" action="{{ route('admin.rooms.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <x-adminlte-input
                        name="number"
                        type="text"
                        label="Nº de habitación"
                        fgroup-class="col-md-6"
                        value="{{ old('number') }}"
                    />

                    <div class="col-md-6">
                        <div class="form-check">
                            <input name="has_tv" id="has_tv" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="has_tv">TV</label>
                        </div>
                        <div class="form-check">
                            <input name="has_minibar" id="has_minibar" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="has_minibar">Frigobar</label>
                        </div>
                        <div class="form-check">
                            <input name="has_ac" id="has_ac" class="form-check-input" type="checkbox">
                            <label class="form-check-label" for="has_ac">AC</label>
                        </div>
                    </div>

                    <x-adminlte-input
                        name="beds"
                        type="number"
                        min="1"
                        step="1"
                        label="Cantidad de camas"
                        fgroup-class="col-md-6"
                        value="{{ old('beds') }}"
                    />

                    <x-adminlte-input
                        name="price"
                        type="number"
                        min="1"
                        step="0.01"
                        label="Precio por noche (AR$)"
                        fgroup-class="col-md-6"
                        value="{{ old('price') }}"
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