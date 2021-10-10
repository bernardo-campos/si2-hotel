<form>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Buscar habitaciones</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">

                <x-adminlte-input
                    name="capacity"
                    label="Cantidad de huéspedes"
                    placeholder="0"
                    type="number"
                    igroup-size="sm"
                    fgroup-class="col-sm-4 col-md-3"
                    min=1 max=10
                    value="{{ request()->input('capacity', 1) }}"
                    required>
                </x-adminlte-input>

                <x-adminlte-input
                    name="rooms_qty"
                    label="Cantidad de habitaciones"
                    placeholder="0"
                    type="number"
                    igroup-size="sm"
                    fgroup-class="col-sm-4 col-md-3"
                    min=1 max=3
                    value="{{ request()->input('rooms_qty', 1) }}"
                    required>
                </x-adminlte-input>

                @php
                    $dataRangeConfig = [
                        "startDate" => request()->has('range')
                                        ? substr(request()->range, 0, 10)
                                        : "js:moment().format('DD/MM/YYYY')",
                        "endDate" => request()->has('range')
                                        ? substr(request()->range, -10)
                                        : "js:moment().format('DD/MM/YYYY')",
                        "minDate" => "js:moment().format('DD/MM/YYYY')",
                    ];
                @endphp

                <x-adminlte-date-range
                    label="Entre fechas"
                    name="range"
                    :config="$dataRangeConfig"
                    igroup-size="sm"
                    fgroup-class="col-sm-4 col-md-3"
                    required>
                </x-adminlte-date-range>


            </div>

            <div class="row">
                <x-adminlte-button class="ml-auto"
                    label="Buscar"
                    theme="primary"
                    icon="fas fa-search"
                    type="submit"
                />
            </div>
        </div>
        <!-- .card-body -->
    </div>
</form>