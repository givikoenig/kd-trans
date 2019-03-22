<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('meta::manager', [
        'title' => $title,
    ])
    <title>{{ $title ?? config('app.name') }}</title>

    @include('styles')
    </head>
    <body>
    <div id="app">
        <div id="container">
            @yield('header')
            @yield('content')
            @yield('footer')
        </div>
    </div>
    @include('scripts')
    </body>
</html>