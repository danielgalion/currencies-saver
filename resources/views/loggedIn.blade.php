<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Waluty - zalogowany</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="m-5">
        <h1>Użytkownik jest zalogowany.</h1>

        @can('api')
            <p>Może korzystać z API.</p>
        @endcan
    </body>
</html>
