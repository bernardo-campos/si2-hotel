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
        'N°', // = id
        'Usuario',
        'F. Ingreso',
        'F. Egreso',
        'Habitaciones',
        'Personas',
        'Serv. Adic.', // (camas y cunas adicionales, estacionamiento)
        'Valor',
        'Pagado',
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
                                <div class="text-sm nowrap">
                                    Reserva para: {{ $reservation->people_qty }}
                                </div>
                                <hr class="my-0">
                                <div class="text-sm nowrap">
                                    Personas registradas: {{ $reservation->people->count() }}
                                </div>
                            </td>
                            <td></td>
                            <td class="price text-sm text-muted">{{ $reservation->price }}</td>
                            <td class="price text-sm text-muted">{{ $reservation->payed }}</td>
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
<style type="text/css">
    .price::before {
        content: '$ ';
        font-size: smaller;
    }
    .nowrap {
        white-space: nowrap;
    }
</style>
@endpush