<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')
    @stack('css')

    <title>{{ env('APP_NAME') }}</title>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        @include('layouts.content')
        @include('layouts.footer')
    </div>

    @vite('resources/js/app.js')
    @stack('js')
</body>
</html>
