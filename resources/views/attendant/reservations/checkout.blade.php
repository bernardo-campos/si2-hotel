@extends('adminlte::page')

@section('plugins.CreditCard', true)

@section('title', 'Realizando reserva')

@section('content_header')
    <h1 class="m-0 text-dark">Haciendo checkout para la reserva #{{ $reservation->id }}</h1>
@stop


@section('content')

<form action="{{ route('attendant.reservations.checkout', $reservation) }}" method="post" onsubmit="return true" class="mb-5">
    @csrf

    <div class="card">
        <div class="card-header">
            Abonando saldo para reserva # {{ $reservation->id }}
            <br>
            A nombre de: {{ $reservation->user->name }}
            <br>
            <div class="text-muted ml-3">
                {{ $reservation->rooms->count() }} habitacion(es):
                <br>
                <ul>
                @foreach ($reservation->rooms as $room)
                    <li>
                        <span>{{ $room->renderBeds() }}</span>
                        <span class="services">{{ $room->renderServices() }}</span>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">

            <div class="row justify-content-center mb-3">
                <div class="col-12 col-sm-6 col-md-4">

                    <div class="d-flex flex-column text-sm text-muted">
                        <div class="d-flex">
                            <span>Precio de la reserva:</span>
                            <div class="separator"></div>
                            <span class="price">{{ $reservation->price }}</span>
                        </div>
                        @foreach ($reservation->payments as $payment)
                            <div class="d-flex">
                                <span>{{ $payment->concept }}:</span>
                                <div class="separator"></div>
                                <span class="price-minus">{{ $payment->ammount }}</span>
                            </div>
                        @endforeach
                        <div class="d-flex">
                            <span>Total a pagar:</span>
                            <div class="separator"></div>
                            <span class="text-success text-bold price">{{ $reservation->to_pay_float }}</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-6">

                    @include('_partials.credit-card-fields')

                </div>

                <div class="col-6">
                    <div class="container preload">
                        @include('_partials.credit-card')
                    </div>
                </div>

            </div>

        </div>
        <div class="card-footer text-right">
            <button class="btn btn-primary">Procesar pago</button>
        </div>
    </div>

</form>

@stop

@push('js')
<script type="text/javascript">


</script>
@endpush

@push('css')
<style type="text/css">
    .services:not(:empty)::before {
        content: ' | ';
    }
    .text-underline {
        text-decoration: underline;
    }
    .price::before {
        content: ' $ ';
    }
    .price-minus::before {
        content: ' -$ ';
    }
    .separator {
        flex-grow: 1;
        border-bottom: dotted 1px grey;
    }
</style>
@endpush