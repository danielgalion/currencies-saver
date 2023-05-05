<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Currencies - log in</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="m-5">
        <form action="{{ url('/login') }}">
           <div class="mb-1">
                <label for="email" class="d-block">Email</label>
                <input type="text" class="d-block"/>
           </div>
           <div class="mb-1">
                <label for="password" class="d-block">Password</label>
                <input type="password" class="d-block"/>
           </div>
           <div>
                <button class="rounded btn btn-primary" type="sumbit">Log in</button>
           </div>   
        </form>
    </body>
</html>
