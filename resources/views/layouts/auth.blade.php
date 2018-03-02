<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> {{-- Styles --}} 
        @yield('styles') {{-- Yield styles --}}
        <script src="{{ asset('js/admin.js') }}"></script> {{-- Script --}}
    </head>
    <body>

        @include('partials.auth._navbar') 
            
        <div class="uk-container uk-container-expand uk-margin-medium">
            @yield('content')
        </div>

        @include('partials.auth._message') 
        
        @yield('scripts')
    </body>
</html>