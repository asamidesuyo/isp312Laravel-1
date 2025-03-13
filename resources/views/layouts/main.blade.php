<!doctype html>
<html lang="{{ config("app.locale") }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', config("app.name")) - {{ config("app.name") }}</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body class="bg-body-tertiary">

@include('partials.header')

<main class="my-5">
    <div class="container">
        @yield('body')
    </div>
</main>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
