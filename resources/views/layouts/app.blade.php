<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div>
        <nav class='navbar navbar-expand-md navbar-light'>
            <div class='container'>
            <a class='navbar-brand'>Pizzeria</a>
            </div>
        </nav>

        @yield('content')
    </div>
    @yield('scripts')
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
