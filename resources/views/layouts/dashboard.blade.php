<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        {{--  Styles  --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @yield('styles')

        {{--  Script  --}}
        <script src="{{ asset('js/app.js') }}"></script>        
    </head>
    <body>    
        @include('partials.dashboard._navbar')

        <div class="uk-container uk-container-expand uk-margin-medium">
            <div uk-grid>
                <div class="uk-width-1-5@m">
                    @include('partials.dashboard._sidebar')
                </div>
                <div class="uk-width-expand@m">
                    @yield('content')
                </div>
            </div>
        </div>
        
        @include('partials.dashboard._footer')

        @include('partials.dashboard._message')

        @yield('scripts')
    </body>
</html>