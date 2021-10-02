@extends('adminlte::page')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

@section('adminlte_css')
    <style type="text/css">
        .content-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .content-wrapper {
            background-image: url('/img/bg-hotel-min.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position-y: center;
            background-blend-mode: screen;
            background-color: darkslategrey;
        }
        :is(.{{ $auth_type ?? 'login' }}-box) .card > :is( [class^="card-"] ) {
            background-color: #ffffffaa;
        }
        :is(.{{ $auth_type ?? 'login' }}-box) .card {
            background-color: #ffffff00;
        }
        .{{ $auth_type ?? 'login' }}-box :is(.form-control, .input-group-text) {
            border-color: darkgray!important;
        }
    </style>
    @stack('css')
    @yield('css')
@stop

@section('content')
    <div class="{{ $auth_type ?? 'login' }}-box">

        {{-- Card Box --}}
        <div class="card {{ config('adminlte.classes_auth_card', 'card-outline card-primary') }}">

            {{-- Card Header --}}
            @hasSection('auth_header')
                <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none text-center">
                        @yield('auth_header')
                    </h3>
                </div>
            @endif

            {{-- Card Body --}}
            <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                @yield('auth_body')
            </div>

            {{-- Card Footer --}}
            @hasSection('auth_footer')
                <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                    @yield('auth_footer')
                </div>
            @endif

        </div>

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
