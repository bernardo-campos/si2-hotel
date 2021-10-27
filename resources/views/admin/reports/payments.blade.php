@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Informe de Pagos')

@section('content_header')
    <h1 class="m-0 text-dark">Informe de Pagos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">Ingresos por mes del año actual ({{ date('Y') }})</div>
        <div class="card-body">
            <canvas id="myChart"></canvas>
        </div>
    </div>
@stop

@push('js')
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months) !!},
            datasets: [{
                label: "Ingresos por mes",
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: {!! json_encode($incomings) !!},
            }]
        },
        options: {}
    });
</script>
@endpush

@push('css')
@endpush