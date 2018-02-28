<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        <link href="{{ asset('css/app.css') }}" rel="stylesheet"> {{-- Styles --}}
        @yield('styles') {{-- Yield styles --}}
        <script src="{{ asset('js/app.js') }}"></script> {{-- Script --}}
    </head>
    <body>
        @include('partials.app._navbar') 
        
        @yield('content') 
        
        @include('partials.app._footer')     

        @include('partials.app._message') 
        
        @yield('scripts')
    </body>
</html>