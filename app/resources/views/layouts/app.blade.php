<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title' , "Shop")</title>
    <!-- Styles -->
    <link rel="stylesheet"  href="{{ mix('/css/app.css') }}" />
</head>
<body>
    <main id="app">
        @include('common.header')
        <side-bar-component></side-bar-component>
        @yield('content')
    </main>
    @include('common.footer')
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
