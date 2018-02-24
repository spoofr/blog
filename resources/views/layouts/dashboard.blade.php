<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('partials.dashboard._message')        
        @include('partials.dashboard._navbar')
        <div uk-height-viewport="expand: true">
            @yield('content')
        </div>
        @include('partials.dashboard._sidebar')
        @include('partials.dashboard._footer')
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>