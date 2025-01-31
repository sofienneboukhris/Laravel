<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/registre.css') }}" rel="stylesheet">
</head>
<body class="form-v9">


        <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ asset('dist/img/scrapi2.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
              </a>
        <main class="py-4">
                @yield('content')
            </main>

</body>
