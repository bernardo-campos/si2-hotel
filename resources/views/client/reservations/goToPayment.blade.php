@extends('adminlte::page')

@section('plugins.CreditCard', true)

@section('title', 'Realizando reserva')

@section('content_header')
    <h1 class="m-0 text-dark">¡Ya casi terminamos!</h1>
@stop


@section('content')

<form action="{{ route('client.reservations.makePayment', $reservation) }}" method="post" onsubmit="return true" class="mb-5">
    @csrf

    <div class="card">
        <div class="card-header">
            Abonar reserva 10%
            <br>
            <span class="text-sm text-muted">
                Precio total: $ {{ $reservation->price }}
            </span>
            <br>
            <span class="text-sm text-muted">
                Monto a pagar: $ {{ $reservation->advance_price}}
            </span>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Nombre en la tarjeta</label>
                        <input id="name" maxlength="20" type="text" class="form-control">
                    </div>
                    <div class="form-group position-relative">
                        <label for="cardnumber">Nº de tarjeta</label>
                        @if(app()->environment('local'))
                            <span id="generatecard">generate random</span>
                        @endif
                        <input id="cardnumber" type="text" pattern="[0-9 ]*" inputmode="numeric" class="form-control">
                        <svg id="ccicon" class="ccicon" width="750" height="471" viewBox="0 0 750 471" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>
                    </div>
                    <div class="form-group">
                        <label for="expirationdate">Vencimiento (mm/yy)</label>
                        <input id="expirationdate" type="text" pattern="[0-9]*/[0-9]*" inputmode="numeric" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="securitycode">Código de seguridad</label>
                        <input id="securitycode" type="text" pattern="[0-9]*" inputmode="numeric" class="form-control">
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

    {{-- <div class="alert alert-danger d-none" role="alert">
      Debe ingresar hasta un máximo de {{ $capacity }} persona(s)
    </div> --}}

</form>
@stop

@push('js')
<script type="text/javascript">


</script>
@endpush

@push('css')
@endpush