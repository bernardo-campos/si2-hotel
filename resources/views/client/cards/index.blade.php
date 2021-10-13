@extends('adminlte::page')

@section('title', 'Mis tarjetas')

@section('content_header')
    <h1 class="m-0 text-dark">Mis tarjetas</h1>
@stop
@php
    $heads = [
        '',
        'Vencimiento',
        'Titular',
        'Número',
        '',
    ];
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">

                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($cards as $card)
                        <tr>
                            <td></td>
                            <td>{{ $card->expirationdate }}</td>
                            <td>{{ $card->name }}</td>
                            <td>{{ $card->cardnumber }}</td>
                            <td>
                                <form id="destroy" action="{{ route('client.cards.destroy', $card) }}" onsubmit="return confirm('¿Está seguro/a que desea eliminar la tarjeta?');"
                                    method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
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
@endpush