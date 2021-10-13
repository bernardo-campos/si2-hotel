@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @section('plugins.Sweetalert2', true)
    @php
        $type = session()->has('success')
                ? 'success' : (
                session()->has('info')
                ? 'info' : (
                session()->has('warning')
                ? 'warning' : (
                session()->has('error') ?
                'error' : '')));
    @endphp
    @php( $hasAnyMessage = $type != '' )
    @php( $message = session()->get( $type ) )

        @if ( $hasAnyMessage )
        <script type="text/javascript">
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: true,
            })
            $(document).ready(function () {
                Toast.fire({
                    timer: {{ max(3000, 80 * strlen($message)) }},
                    timerProgressBar: true,
                    icon: "{{ $type }}",
                    title: "{{ $message }}"
                  })
            })
        </script>
    @endif
    @stack('js')
    @yield('js')
@stop
