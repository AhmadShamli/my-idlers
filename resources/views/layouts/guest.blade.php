<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - @if (config()->has('app.name')) {{ config('app.name') }} @else My idlers @endif</title>
    <link rel="icon" type="image" href="{{asset(Session::get('favicon') ?? 'favicon.ico')}}"/>

    @if(Session::get('dark_mode'))
        <link rel="stylesheet" href="{{ asset('css/dark.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/light.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('css_links')
    @yield('style')

    <x-form-style></x-form-style>

</head>
<body>
{{ $slot }}
<script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
</body>
</html>
