@extends('adminlte::page')

@section('title', 'Pagos')

@section('content_header')
    <h1 class="m-0 text-dark">Pagos</h1>
    {{-- <a href="{{ route('attendant.payments.create') }}" class="ml-auto">
        <x-adminlte-button label="Agregar" theme="success" icon="fas fa-plus"/>
    </a> --}}
@stop

@php
    $heads = [
        '',
        'Id',
        // 'Factura Nº'
        // 'Fecha Factura',
        'Fecha',
        'Hora',
        'Cliente',
        'Concepto',
        'Reserva',
        'Total (AR$)', // servicio, frigobar, servicio habitación,
        // 'Estado',
    ];
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">

                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($payments as $payment)
                        <tr>
                            <td></td>
                            <td>{{ $payment->id }}</td>
                            <td>{{ $payment->created_at->format('d/m/Y') }}</td>
                            <td>{{ $payment->created_at->format('H:i:s') }}</td>
                            <td>{{ $payment->user->name }}</td>
                            <td>{{ $payment->concept }}</td>
                            <td>{{ $payment->reservation_id }}</td>
                            <td>$ {{ $payment->ammount }}</td>
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