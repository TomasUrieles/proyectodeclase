<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('layouts.navbar')

    <main class="container">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>
