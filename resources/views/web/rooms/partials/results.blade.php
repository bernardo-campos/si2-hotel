@php
    $heads = [
        '',
        ['label' => 'Seleccionar', 'width' => 10],
        'Habitaciones',
        ['label' => 'Total', 'width' => 10],
    ];
@endphp

<div class="card">
    <div class="card-header">
        &#x1F447; Resultados para <b>{{ $capacity }} huésped(es)</b> en <b>{{ $rooms }} habitacion(es)</b> entre el &#x1F4C5;<b>{{ $from }}</b>  y el &#x1F4C5;<b>{{ $to }}</b>
    </div>
    <div class="card-body">
        <div class="row">

            <x-adminlte-datatable id="table1" :heads="$heads">
                @foreach($results as $roomGroup)
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            @foreach ($roomGroup->rooms as $room)
                                Habitación #{{ $loop->iteration }} (Nº {{ $room->number }})
                                <br>
                                ({{ $room->double_beds }} cama doble y {{ $room->single_beds }} cama simple)
                                @if(!$loop->last)<hr>@endif
                            @endforeach
                        </td>
                        <td>
                            ${{ $roomGroup->total_price }}/noche
                        </td>
                    </tr>
                    {{-- <tr>
                        <td></td>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->number }}</td>
                        <td>{{ $room->has_tv }}</td>
                        <td>{{ $room->has_minibar }}</td>
                        <td>{{ $room->has_ac }}</td>
                        <td class="text-sm">
                            Simples: {{ $room->single_beds }}
                            <br>
                            Dobles: {{ $room->double_beds }}
                            <br> Total: {{ $room->people }} personas
                        </td>
                        <td>$ {{ $room->price }}</td>
                    </tr> --}}
                @endforeach
            </x-adminlte-datatable>

        </div>
    </div>
</div>