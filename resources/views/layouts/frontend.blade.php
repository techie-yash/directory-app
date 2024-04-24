<!DOCTYPE html>
<html lang="en">
    <head>
    @include('include.ui-style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <header>
        @include('include.ui-header')
        </header>
        @yield('content')
        <footer>
        @include('include.ui-footer')
        </footer>
        @include('include.ui-script')
    </body>
</html>