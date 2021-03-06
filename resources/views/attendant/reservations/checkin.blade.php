@extends('adminlte::page')

@section('title', 'Realizando reserva')

@section('plugins.validatejs', true)

@section('content_header')
    <div>
        <h1 class="m-0 text-dark">Realizando checkin...</h1>
        {{-- <div class="text-muted text-sm">Este paso es opcional, pero al momento de hacer CHECK-IN, deberá informar todos los huéspedes</div> --}}
    </div>
    @if(app()->environment('local'))
        <button title="Este botón es visible porque la app está en modo LOCAL" type="button" onclick="randomize()" class="btn btn-info">Randomize()</button>
    @endif
@stop


@section('content')

<form action="{{ route('attendant.reservations.checkin', $reservation) }}" method="post" onsubmit="return validateForm()" class="mb-5">
    @csrf
    @php($p = 1)
    @foreach ($reservation->reservation_rooms as $i => $reservation_room)

        @php( $room = $reservation_room->room )

        <div class="card">
            <div class="card-header">
                Registrar las personas para la habitación {{ $room->number }}
                <br>
                <span class="text-sm text-muted">
                    ({{ $room->renderBeds() }})
                </span>
            </div>
            <div class="card-body">
                @for ($j = 0; $j < $room->people; $j++, $p++)
                    <div class="row">

                        <div class="col-sm-1 d-flex align-items-center">
                            <label>Persona {{ $p }}</label>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <input
                                name="room[{{ $reservation_room->id }}][{{ $p }}][dni]"
                                type="text"
                                class="form-control"
                                {{ $j == 0 ? 'required' : '' }}
                                placeholder="DNI  (sólo números)">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input
                                name="room[{{ $reservation_room->id }}][{{ $p }}][surname]"
                                type="text"
                                class="form-control"
                                {{ $j == 0 ? 'required' : '' }}
                                placeholder="Apellido">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input
                                name="room[{{ $reservation_room->id }}][{{ $p }}][name]"
                                type="text"
                                class="form-control"
                                {{ $j == 0 ? 'required' : '' }}
                                placeholder="Nombre">
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    @endforeach

    <div class="alert alert-danger d-none" role="alert">
      Debe ingresar hasta un máximo de {{ $reservation->people_qty }} persona(s)
    </div>

    <div class="container d-flex justify-content-end">
        <button class="btn btn-primary">Enviar</button>
    </div>

</form>
@stop

@push('js')
<script type="text/javascript">
    function randomize() {
        let names = ["Alicia", "Berenice", "Carlos", "Damaris", "Estela"];
        let surnames = ["Alvarez", "Brito", "Castro", "Distacio", "Estevanez"];

        $('[name*="dni"').each(function () {
            $(this).val( Math.floor(Math.random() * 89999999) +10000000 );
        })
        $('[name*="name"').each(function () {
            let thisInput = $(this);
            setTimeout(function () {
                thisInput.val( names[ Math.floor( Math.random() * names.length ) ] );
            }, 100)
        })
        $('[name*="surname"').each(function () {
            let thisInput = $(this);
            setTimeout(function () {
                thisInput.val( surnames[ Math.floor( Math.random() * surnames.length ) ] );
            }, 100)
        })
    }
</script>
<script type="text/javascript">

    const capacity = {{ $reservation->people_qty }};

    function count(arr) {
        return  arr.filter( x => x != '').length;
    }

    function validateForm() {
        let dnis = $('[name*="[dni]"]').map( function(){ return $(this).val() } ).get();
        let names = $('[name*="[name]"]').map( function(){ return $(this).val() } ).get();
        let surnames = $('[name*="[surname]"]').map( function(){ return $(this).val() } ).get();

        if (count(dnis) > capacity ||
            count(names) > capacity ||
            count(surnames) > capacity)
        {
            $('.alert').toggleClass('d-none', false);
            return false;
        }
        $('.alert').toggleClass('d-none', true);
        return true;
    }

    $('[name*="[dni]"],[name*="[name]"],[name*="[surname]"]').on('change keyup', function () {
        validateForm();
    })

</script>
@endpush

@push('css')
@endpush