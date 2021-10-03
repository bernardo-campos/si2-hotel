@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-horizontal" action="{{ $action }}" method="post">
    @csrf
    @if($method)
        @method($method)
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">

                <x-adminlte-input
                    name="number"
                    type="text"
                    label="Nº de habitación"
                    fgroup-class="col-md-6"
                    value="{{ old('number', $room->number) }}"
                />

                <div class="col-md-6">
                    <div class="form-check">
                        <input
                            name="has_tv"
                            id="has_tv"
                            class="form-check-input"
                            {{ old('has_tv', $room->has_tv) ? 'checked=""' : '' }}
                            type="checkbox">
                        <label class="form-check-label" for="has_tv">TV</label>
                    </div>
                    <div class="form-check">
                        <input
                            name="has_minibar"
                            id="has_minibar"
                            class="form-check-input"
                            {{ old('has_minibar', $room->has_minibar) ? 'checked=""' : '' }}
                            type="checkbox">
                        <label class="form-check-label" for="has_minibar">Frigobar</label>
                    </div>
                    <div class="form-check">
                        <input
                            name="has_ac"
                            id="has_ac"
                            class="form-check-input"
                            {{ old('has_ac', $room->has_ac) ? 'checked=""' : '' }}
                            type="checkbox">
                        <label class="form-check-label" for="has_ac">AC</label>
                    </div>
                </div>

                <x-adminlte-input
                    name="single_beds"
                    type="number"
                    min="0"
                    step="1"
                    label="Cantidad de camas simples"
                    fgroup-class="col-md-6"
                    value="{{ old('single_beds', $room->single_beds) }}"
                />

                <x-adminlte-input
                    name="double_beds"
                    type="number"
                    min="0"
                    step="1"
                    label="Cantidad de camas dobles"
                    fgroup-class="col-md-6"
                    value="{{ old('double_beds', $room->double_beds) }}"
                />


                <x-adminlte-input
                    name="price"
                    type="number"
                    min="1"
                    step="0.01"
                    label="Precio por noche (AR$)"
                    fgroup-class="col-md-6"
                    value="{{ old('price', $room->price) }}"
                />

            </div>
        </div>
        <div class="card-footer d-flex">
            <x-adminlte-button class="ml-auto"
                label="Guardar"
                theme="primary"
                icon="fas fa-save"
                type="submit"
            />
        </div>
    </div>
</form>
