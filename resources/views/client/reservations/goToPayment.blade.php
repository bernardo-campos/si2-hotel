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
            Abonando reserva 10%
            <br>
            <div class="text-muted">
                {{ $reservation->rooms->count() }} habitacion(es):
                <br>
                <ul>
                @foreach ($reservation->rooms as $room)
                    <li>
                        {{ $room->renderBeds() }} | {{ $room->renderServices() }}
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="card-body">

            <div class="row">

                <div class="col-6">

                    <div class="text-right">
                        <span class="text-sm text-muted">
                            Precio de la reserva: $ {{ $reservation->price }}
                        </span>
                        <br>
                        <span class="text-sm text-muted">
                            Monto a pagar: <span class="text-success text-bold">$ {{ $reservation->advance_price}}</span>
                        </span>
                    </div>

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
                    <div class="form-check">
                        <input
                            name="remember_card"
                            id="remember_card"
                            class="form-check-input"
                            {{ old('remember_card') ? 'checked=""' : '' }}
                            type="checkbox">
                        <label class="form-check-label" for="remember_card">Recordar tarjeta</label>
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
            <button type="button" class="btn btn-warning" onclick="document.getElementById('btn-destroy').click()">Cancelar reserva</button>
            <button class="btn btn-primary">Procesar pago</button>
        </div>
    </div>

    {{-- <div class="alert alert-danger d-none" role="alert">
      Debe ingresar hasta un máximo de {{ $capacity }} persona(s)
    </div> --}}

</form>

<form id="destroy" action="{{ route('client.reservations.destroy', $reservation) }}"
    onsubmit="return confirm('¿Está seguro/a que desea cancelar la reserva que está realizando?');"
    method="post">
    @method('DELETE')
    @csrf
    <button id="btn-destroy" class="d-none"></button>
</form>

@stop

@push('js')
<script type="text/javascript">


</script>
@endpush

@push('css')
@endpush