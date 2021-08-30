@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
    <h1 class="m-0 text-dark">Servicios ofrecidos</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-body">
            <div class="row">
                @php
                    $heads = [
                        'N° Serv.',
                        'Nombre',
                        'Descripción',
                        ['label' => 'Costo', 'width' => 10],
                        ['label' => 'Horario apertura', 'width' => 10],
                        ['label' => 'Horario cierre', 'width' => 10],
                    ];
                    $rows = [
                        [
                            '1',
                            'Lavandería',
                            'Servicio de Lavandería de 8 a 22hs',
                            '$1000',
                            '8hs', '22hs',
                        ],
                        [
                            '2',
                            'Depósio de equipajes',
                            'Servicio de depósito de equipajes todo el día',
                            '$500',
                            '-', '-',
                        ],
                        [
                            '3',
                            'Servicio a la habitación',
                            'Puede solicitar el menú de nuestro restaurante de 9 a 23hs',
                            '-',
                            '9hs', '23hs',
                        ],
                    ]
                @endphp

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

@stop

@push('js')
@endpush

@push('css')
@endpush