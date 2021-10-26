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
                                <div class="text-sm">Reserva para {{ $reservation->people_qty }}</div>
                                <hr class="my-1">
                                <div class="text-sm">({{ $reservation->people->count() }} personas registradas)</div>
                                @foreach ($reservation->people as $person)
                                    <div class="text-muted text-sm">{{ $person->full_name }}</div>
                                @endforeach
                            </td>
                            <td></td>
                            <td>{{ $reservation->status->description }}</td>
                            <td class="d-flex flex-column">
                                {{-- <x-adminlte-button class="btn-xs px-1 py-0" theme="warning" icon="fas fa-ellipsis-h"/> --}}
                                @can('cancel', $reservation)
                                    <a href="{{ route('client.reservations.cancel', $reservation) }}">Cancelar</a>
                                @endcan
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