<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/oneui.min.css') }}">
    @stack('css')
    @livewireStyles
</head>
<body>

<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">

    @include('partials.sidebar')
    @include('partials.header')

    <main id="main-container">

        @yield('content')

    </main>

    @include('partials.footer')

</div>

<script src="{{ asset('assets/js/oneui.core.min.js') }}"></script>
<script src="{{ asset('assets/js/oneui.app.min.js') }}"></script>
@stack('js')
@livewireScripts
<script>
    window.addEventListener('closeCreateWeightModal', event => {
        $("#modal-create-weight").modal('hide');
    });
    window.addEventListener('closeCreateHeightModal', event => {
        $("#modal-create-height").modal('hide');
    });
    window.addEventListener('closeCreateHeadCircumferenceModal', event => {
        $("#modal-create-head-circumference").modal('hide');
    });
</script>
</body>
</html>
