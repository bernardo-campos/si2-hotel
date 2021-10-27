@extends('adminlte::page')

@section('title', 'Reservas')

@section('content_header')
    <h1 class="m-0 text-dark">Reservas</h1>
    <a href="{{ route('admin.reservations.create') }}" class="ml-auto">
        <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
    </a>
@stop

@php
    $heads = [
        '',
        'N° Res', // = id
        'Usuario',
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

                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($reservations as $reservation)
                         <tr>
                            <td></td>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->user->name }}</td>
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
                            <td>{{ $reservation->status->description }}</td>
                            <td>
                                @can('checkin', $reservation)
                                    <a href="{{ route('attendant.reservations.checkin', $reservation) }}">
                                        <x-adminlte-button title="Check-in" class="btn-sm px-1 py-0" theme="info" icon="fas fa-sign-in-alt"/>
                                    </a>
                                @endcan
                                @can('checkout', $reservation)
                                    <a href="{{ route('attendant.reservations.checkout', $reservation) }}">
                                        <x-adminlte-button title="Check-out" class="btn-sm px-1 py-0" theme="warning" icon="fas fa-sign-out-alt"/>
                                    </a>
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