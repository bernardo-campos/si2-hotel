@extends('adminlte::page')

@section('title', 'Mis Reservas')

@section('content_header')
    <h1 class="m-0 text-dark">Mis Reservas</h1>
@stop

@php
    $heads = [
        '',
        'N° Res', // = id
        'F. Ingreso',
        'F. Egreso',
        'Habitaciones',
        'Personas',
        'Serv. Adic.', // (camas y cunas adicionales, estacionamiento)
        'Estado', // (vigente, cancelada, expirada)
        ''
    ];
@endphp

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">

                <x-adminlte-datatable id="reservations" :heads="$heads">
                    @foreach($reservations as $reservation)
                        <tr>
                            <td></td>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->checkin->format('d/m/Y') }}</td>
                            <td>{{ $reservation->checkout->format('d/m/Y') }}</td>
                            <td>
                                @foreach ($reservation->rooms as $room)
                                    <div class="text-muted text-sm">#{{ $room->number }}</div>
                                @endforeach
                                Total: {{ $reservation->rooms->count() }} hab.
                            </td>
                            <td>
                                @foreach ($reservation->people as $person)
                                    <div class="text-muted text-sm">{{ $person->full_name }}</div>
                                @endforeach
                                Total: {{ $reservation->people->count() }} pers.
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <x-adminlte-button class="btn-xs px-1 py-0" theme="warning" icon="fas fa-ellipsis-h"/>
                            </td>
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