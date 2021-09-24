@extends('adminlte::page')

@section('title', 'Servicios')

@section('plugins.qrCode', true)

@section('content_header')
    <h1 class="m-0 text-dark">Servicios ofrecidos</h1>
    <x-adminlte-button class="bg-teal"
        icon="fas fa-qrcode mr-2"
        label="Ver código QR"
        data-toggle="modal"
        data-target="#modalQr"
    />
@stop

@php
    $heads = [
        ['label' => '', 'orderable' => false],
        'N° Serv.',
        'Nombre',
        'Descripción',
        ['label' => 'Costo', 'width' => 10],
        ['label' => 'Horario apertura', 'width' => 10],
        ['label' => 'Horario cierre', 'width' => 10],
    ];
    $rows = [
        [
            '',
            '1',
            'Lavandería',
            'Servicio de Lavandería de 8 a 22hs',
            '$1000',
            '8hs', '22hs',
        ],
        [
            '',
            '2',
            'Depósio de equipajes',
            'Servicio de depósito de equipajes todo el día',
            '$500',
            '-', '-',
        ],
        [
            '',
            '3',
            'Servicio a la habitación',
            'Puede solicitar el menú de nuestro restaurante de 9 a 23hs',
            '-',
            '9hs', '23hs',
        ],
    ]
@endphp

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">

                <x-adminlte-datatable id="table1" :heads="$heads">
                    @foreach($rows as $row)
                        <tr>
                            @foreach($row as $cell)
                                <td>{!! $cell !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </x-adminlte-datatable>

            </div>
        </div>
    </div>

    <x-adminlte-modal id="modalQr" title="Código QR" size="md" theme="teal" icon="fas fa-qrcode" with-footer="false" v-centered >
        <p>Utiliza este código QR para acceder al menú desde tu celular</p>
        <div id="qrcode"></div>
        <x-slot name="footerSlot"></x-slot>
    </x-adminlte-modal>

@stop

@push('js')
<script type="text/javascript">
    new QRCode(document.getElementById("qrcode"), window.location.href);
</script>
@endpush

@push('css')
<style type="text/css">
    .modal-body img {
        margin: auto;
    }
</style>
@endpush