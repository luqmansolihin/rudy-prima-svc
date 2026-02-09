@extends('layouts.skeleton')

@push('styles')
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('coreui/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('coreui/css/vendors/simplebar.css') }}">

    <link rel="stylesheet" href="{{ asset('coreui/css/datatable.css') }}">

    <!-- Main styles for this application-->
    <link href="{{ asset('coreui/css/style.css') }}" rel="stylesheet">

    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <script src="{{ asset('coreui/js/config.js') }}"></script>
    <script src="{{ asset('coreui/js/color-modes.js') }}"></script>

    @stack('additonal-styles')
@endpush

@section('app')
    @include('layouts.partials.sidebar')

    <div class="wrapper d-flex flex-column min-vh-100">
        @include('layouts.partials.header')

        <div class="body flex-grow-1">
            <div class="container-lg px-4">
                @yield('contents')
            </div>
        </div>

        @include('layouts.partials.footer')
    </div>
@endsection

@push('scripts')
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script>
        const header = document.querySelector('header.header');

        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset('coreui/js/main.js') }}"></script>

    @stack('additional-scripts')
@endpush
