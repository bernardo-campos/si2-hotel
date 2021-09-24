@extends('adminlte::page')

@section('title', 'Habitaciones')

@section('plugins.DateRangePicker', true)

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
                    name="capacity"
                    label="Cantidad de huéspedes"
                    placeholder="0"
                    type="number"
                    igroup-size="sm"
                    fgroup-class="col-sm-4 col-md-3"
                    min=1 max=10>
                </x-adminlte-input>

                <x-adminlte-input
                    name="rooms"
                    label="Cantidad de habitaciones"
                    placeholder="0"
                    type="number"
                    igroup-size="sm"
                    fgroup-class="col-sm-4 col-md-3"
                    min=1 max=3>
                </x-adminlte-input>

                @php
                    $dataRangeConfig = [
                        "startDate" => "js:moment().format('DD/MM/YYYY')",
                        "minDate" => "js:moment().format('DD/MM/YYYY')",

                    ];
                @endphp

                <x-adminlte-date-range
                    label="Entre fechas"
                    name="drBasic"
                    :config="$dataRangeConfig"
                    igroup-size="sm"
                    fgroup-class="col-sm-4 col-md-3">
                </x-adminlte-date-range>

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


    @php
        $heads = [
            '',
            ['label' => 'Seleccionar', 'width' => 10],
            'Habitaciones',
            ['label' => 'Total', 'width' => 10],
        ];
    @endphp

    <div class="card">
        <div class="card-header">
            Resultados
        </div>
        <div class="card-body">
            <div class="row">

                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($rooms as $room)
                        <tr>
                            <td></td>
                            <td>{{ $room->id }}</td>
                            <td>{{ $room->number }}</td>
                            <td>{{ $room->has_tv }}</td>
                            <td>{{ $room->has_minibar }}</td>
                            <td>{{ $room->has_ac }}</td>
                            <td class="text-sm">
                                Simples: {{ $room->single_beds }}
                                <br>
                                Dobles: {{ $room->double_beds }}
                                <br> Total: {{ $room->people }} personas
                            </td>
                            <td>$ {{ $room->price }}</td>
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