<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
{{--@vite(['resources/css/app.css', 'resources/js/app.js'])--}}
<!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('../plugins/fontawesome-free/css/all.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('../dist/css/adminlte.min.css') }}">



    @livewireStyles

</head>
<body>
<div class="min-h-screen bg-gray-100">
{{--@include('layouts.navigation')--}}


<!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{--{{ $header }}--}}
        </div>
    </header>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

<!-- jQuery -->
<script src="{{ asset('../plugins/jquery/jquery.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('../dist/js/adminlte.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

@livewireScripts
</body>
</html>
