@extends('adminlte::page')

@section('title', 'Realizando reserva')

@section('content_header')
    <h1 class="m-0 text-dark">Realizando reserva</h1>
@stop


@section('content')

<form action="{{ route('client.reservations.store') }}" method="post">
    @csrf

    @php($p = 1)
    @foreach ($rooms as $i => $room)
        <div class="card">
            <div class="card-header">
                Registrar las personas para la habitación {{ $room->number }}
                <br>
                <span class="text-sm text-muted">
                    ({{ $room->renderBeds() }})
                </span>
            </div>
            <div class="card-body">
                @for ($j = 0; $j < $room->people; $j++)
                    <div class="row">

                        <div class="col-sm-1 d-flex align-items-center">
                            <label>Persona {{ $p++ }}</label>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>DNI</label>
                                <input name="room[{{ $room->id }}][dni]" type="text" class="form-control" placeholder="Ingrese sólo números">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Apellido</label>
                                <input name="room[{{ $room->id }}][surname]" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input name="room[{{ $room->id }}][name]" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    @endforeach

    <button class="btn btn-primary">Enviar</button>

</form>
@stop

@push('js')
@endpush

@push('css')
@endpush