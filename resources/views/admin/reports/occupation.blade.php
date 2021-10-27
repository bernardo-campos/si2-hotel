@extends('adminlte::page')

@section('title', 'Informe de Ocupación')

@section('content_header')
    <h1 class="m-0 text-dark">Informe de Ocupación</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Ocupación actual del hotel ({{ today()->format('d/m/Y') }})</div>
        <div class="card-body">
            @foreach ($reservations as $reservation)
                <div class="row justify-content-between">
                    <div class="col-12">
                        <h5>Reserva Nº {{ $reservation->id }}</h5>
                        <h5>
                            Reservado el {{ $reservation->created_at->format('d/m/Y') }}
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <span class="text-muted">A nombre de:</span>
                        <br>
                        {{ $reservation->user->name }}
                    </div>
                    <div class="col-3">
                        <span class="text-muted">
                            Reserva de {{ $reservation->rooms->count() }} habitacion(es):
                        </span>
                        <br>
                        <ul class="dashed pl-0">
                            @foreach ($reservation->rooms as $room)
                                <li>
                                    <span>{{ $room->renderBeds() }}</span>
                                    <span class="services">{{ $room->renderServices() }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-3">
                        <span class="text-muted">Fecha ingreso:</span>
                        <span>{{ $reservation->checkin->format('d/m/Y') }}</span>
                        <br>
                        <span class="text-muted">Fecha egreso:</span>
                        <span>{{ $reservation->checkout->format('d/m/Y') }}</span>
                        <br>
                        <span class="text-muted">Duración: </span>
                        <span>{{ $reservation->total_days }} noches</span>
                    </div>
                    <div class="col-3">
                        <span class="text-muted">Pagos realizados</span>
                        <div class="d-flex flex-column">
                            @foreach ($reservation->payments as $payment)
                                <div class="d-flex">
                                    <span class="text-sm">{{ $payment->concept }}:</span>
                                    <span class="text-sm ml-auto price">{{ $payment->ammount }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 text-right">
                       <b>Ocupantes por habitación:</b>
                    </div>
                    <div class="col-6 table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th width="10px">Habitacion</th>
                                    <th>Personas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservation->reservation_rooms as $res_room)
                                    <td>Nº {{ $res_room->room_id }}</td>
                                    <td>
                                        @foreach ($res_room->reservation_room_people as $person)
                                            <div>{{ $person->dni }} - {{ $person->full_name }}</div>
                                        @endforeach
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @if(!$loop->last) <hr> @endif

            @endforeach
        </div>
        <div class="card-footer">
            <x-adminlte-button id="print" label="Imprimir" theme="primary" icon="fas fa-print" class="no-print" />
        </div>
    </div>
@stop

@push('js')
<script type="text/javascript">
    $('#print').click(function () {
        window.print();
    })
</script>
@endpush

@push('css')
<style type="text/css">
    .services:not(:empty)::before {
        content: ' | ';
    }
    .price::before {
        content: ' $ ';
    }
    ul.dashed {
        list-style-type: none;
    }
    ul.dashed > li:before {
        content: "-";
    }
</style>
@endpush