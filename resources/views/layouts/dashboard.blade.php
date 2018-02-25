<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>        
    </head>
    <body>
        @include('partials.dashboard._message')        
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
        <script>
            @if(Session::has('success'))
            UIkit.notification({
                message: '<span uk-icon="icon: check"></span> <span class="uk-text-bold">{{ Session::get("success") }}</span>',
                status: 'success',
                pos: 'top-right',
                timeout: 7000
            });
            @endif
        </script>
    </body>
</html>