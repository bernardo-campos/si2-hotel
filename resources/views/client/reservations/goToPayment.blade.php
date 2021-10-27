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
                        <span>{{ $room->renderBeds() }}</span>
                        <span class="services">{{ $room->renderServices() }}</span>
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
                            Monto a pagar (10%): <span class="text-success text-bold">$ {{ $reservation->advance_price}}</span>
                        </span>
                    </div>

                    @include('_partials.credit-card-fields')

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
            <button type="button" class="btn btn-warning" onclick="document.getElementById('btn-destroy').click()">Cancelar</button>
            <button class="btn btn-primary">Procesar pago</button>
        </div>
    </div>

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
<style type="text/css">
    .services:not(:empty)::before {
        content: ' | ';
    }
</style>
@endpush