<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/all.css') }}" />
        <script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/jquery-2.1.4.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') }}"></script>
    </head>
    <body>
        @include('layout.header')
        @include('layout.sidebar')
        <div class="container">
            @yield('content')
        </div>
        @include('layout.footer')
    </body>
</html>