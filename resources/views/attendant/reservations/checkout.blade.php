@extends('adminlte::page')

@section('plugins.CreditCard', true)

@section('title', 'Realizando reserva')

@section('content_header')
    <h1 class="m-0 text-dark">Haciendo checkout para la reserva #{{ $reservation->id }}</h1>
@stop


@section('content')

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

            <div class="row justify-content-center pb-4 mb-4 border-bottom">
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

                <!-- .col-2 -->
                <div class="nav flex-column nav-pills col-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                    <a class="nav-link active" id="v-pills-card-tab" data-toggle="pill" href="#v-pills-card" role="tab" aria-controls="v-pills-card" aria-selected="true">Pago con tarjeta</a>

                    <a class="nav-link" id="v-pills-cash-tab" data-toggle="pill" href="#v-pills-cash" role="tab" aria-controls="v-pills-cash" aria-selected="false">Pago en efectivo</a>

                </div>

                <!-- .col-10 -->
                <div class="tab-content col-10" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-card" role="tabpanel" aria-labelledby="v-pills-card-tab">
                        <form action="{{ route('attendant.reservations.checkout', $reservation) }}" method="post" class="mb-5">
                            @csrf
                            {{-- TODO: use \App\Enums\PaymentMehod::CreditCard --}}
                            <input type="hidden" name="payment_method" value="0">

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
                            <button type="submit" class="d-none">Submit</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-cash" role="tabpanel" aria-labelledby="v-pills-cash-tab">
                        <form action="{{ route('attendant.reservations.checkout', $reservation) }}" method="post" class="mb-5">
                            @csrf
                            {{-- TODO: use \App\Enums\PaymentMehod::Cash --}}
                            <input type="hidden" name="payment_method" value="1">

                            <div class="row">
                                <div class="col-6 text-right pt-2">
                                    Está recibiendo $ {{ $reservation->to_pay_float }} en efectivo.
                                    <br>
                                    Haga click en <b>procesar pago</b> para confirmar
                                </div>

                                <div class="col-2 offset-2">
                                    <img class="img-fluid" src="{{ asset('img/cash-payment.png') }}">
                                    <div class="text-xs text-muted">Icons made by <a href="https://www.flaticon.com/authors/flat-icons" title="Flat Icons">Flat Icons</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
                                </div>
                            </div>

                            <button type="submit" class="d-none">Submit</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer text-right">
            <button id="form-submit" type="button" class="btn btn-primary">Procesar pago</button>
        </div>
    </div>

@stop

@push('js')
<script type="text/javascript">

$('#form-submit').click(function () {
    $('.active form button[type=submit]').click();
})
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