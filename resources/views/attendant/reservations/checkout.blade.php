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

            <div class="row mb-3">
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

                    <div class="form-group">
                        <label for="name">Nombre en la tarjeta</label>
                        <input name="name" id="name" maxlength="20" type="text" class="form-control">
                    </div>
                    <div class="form-group position-relative">
                        <label for="cardnumber">Nº de tarjeta</label>
                        @if(app()->environment('local'))
                            <span id="generatecard">generate random</span>
                        @endif
                        <input name="cardnumber" id="cardnumber" type="text" pattern="[0-9 ]*" inputmode="numeric" class="form-control">
                        <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>
                    </div>
                    <div class="form-group">
                        <label for="expirationdate">Vencimiento (mm/yy)</label>
                        <input name="expirationdate" id="expirationdate" type="text" pattern="[0-9]*/[0-9]*" inputmode="numeric" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="securitycode">Código de seguridad</label>
                        <input name="securitycode" id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric" class="form-control">
                    </div>
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