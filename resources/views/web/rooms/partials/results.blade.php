@php
    $heads = [
        '',
        ['label' => 'Seleccionar', 'width' => 10],
        'Habitaciones',
        ['label' => 'Total', 'width' => 20],
    ];
    $config = [
        'searching' => false,
        'paging' => false,
        'info' => false,
        'select' => true,
        'columns' => [
            ['orderable' => false],
            ['orderable' => false],
            ['orderable' => false],
            ['orderable' => true],
        ],
    ];
@endphp

<div class="card">
    <div class="card-header">
        &#x1F447; Resultados para <b>{{ $capacity }} huésped(es)</b> en <b>{{ $rooms }} habitacion(es)</b> entre el &#x1F4C5;<b>{{ $from }}</b>  y el &#x1F4C5;<b>{{ $to }}</b>
    </div>
    <div class="card-body pt-0">
        <div class="row">
            @if($results->count())
            <x-adminlte-datatable id="results" :heads="$heads" :config="$config">
                @foreach($results as $roomGroup)
                    <tr data-rooms="{{ $roomGroup->rooms->pluck('id')->join(',') }}">
                        <td></td>
                        <td class="select"></td>
                        <td>
                            @foreach ($roomGroup->rooms as $room)
                                <div class="d-flex">
                                    <div class="ml-2" style="width:120px; max-width: 120px;">
                                        Opción #{{ $loop->parent->iteration }}
                                        <br>
                                        <span class="text-muted text-sm">({{ $room->renderBeds() }})</span>
                                    </div>
                                    <div class="ml-4 text-sm text-muted">
                                        <div class="{{ !$room->has_tv ? 'd-none' : ''}}">TV</div>
                                        <div class="{{ !$room->has_minibar ? 'd-none' : ''}}">Frigobar</div>
                                        <div class="{{ !$room->has_ac ? 'd-none' : ''}}">A.Ac</div>
                                    </div>
                                    <div class="ml-auto text-sm text-muted d-flex align-items-end">
                                        $<span class="price">{{ $room->price }}</span>/noche
                                    </div>
                                </div>
                                @if(!$loop->last)<hr>@endif
                            @endforeach
                        </td>
                        <td class="align-bottom">
                            <div class="text-right">
                                <div>
                                    $<span class="price">{{ $roomGroup->total_price }}</span><sup class="text-xs">/noche</sup>
                                </div>
                                <div class="text-sm">
                                    x {{ $total_days }} noches
                                </div>
                                <div class="text-bold text-success text-lg">
                                    <span class="text-sm">$</span><span class="price">{{ $roomGroup->total_price * $total_days }}</span><sup class="text-underline text-xs">00</sup>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
            <form class="d-flex col-12 my-3" action="{{ route('client.reservations.store') }}" method="post">
                @csrf
                <input type="hidden" name="rooms" value="">
                <input type="hidden" name="from" value="{{ Str::of($from)->explode('/')->reverse()->join('-') }}">
                <input type="hidden" name="to" value="{{ Str::of($to)->explode('/')->reverse()->join('-') }}">
                <input type="hidden" name="capacity" value="{{ $capacity }}">
                <button id="btnReservation" class="btn btn-primary ml-auto" disabled="">
                    Continuar
                </button>
            </form>
            @else
                <div class="text-center m-auto pt-4">
                        <p>No encontramos resultados</p>
                        <div class="display-3 mb-2">&#x1F614;</div>
                        <p>Intenta con otra búsqueda, por favor</p>
                </div>
            @endif
        </div>
    </div>
</div>

@push('css')
<style type="text/css">
    #table1 {
        margin-top: 0!important;
    }
    tr.selected td.select:before {
        content: 'Habitaciones seleccionadas:';
        color: #28a783;
        font-weight: bold;
    }
    tr:not(.selected) td.select:before {
        content: 'Click para seleccionar';
        font-size: small;
        color: gray;
    }
    tr.selected {
        background-color: #dcfff3!important;
    }
</style>
@endpush

@push('js')
<script type="text/javascript">
$(document).ready(function () {

    // style number dot separator of thousand
    $('.price').each(function(i, value) {
        $(this).text( ($(this).text().replace(/\B(?=(\d{3})+(?!\d))/g, ".") ) )
    })

    $.fn.DataTable.Api('#results').on( 'select', function ( e, dt, type, indexes ) {
        let dataRooms = $(`#results tbody tr:nth-child(${indexes[0]+1})`).attr('data-rooms');
        $('input[name="rooms"]').val(dataRooms)
        $('#btnReservation').prop('disabled', false);
    } );

    $.fn.DataTable.Api('#results').on( 'deselect', function ( e, dt, type, indexes ) {
        $('input[name="rooms"]').val('')
        $('#btnReservation').prop('disabled', true);
    } );
});
</script>
@endpush