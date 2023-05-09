<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Waluty - zaloguj się</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="m-5">
        <h1>Zaloguj się</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> 
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('login') }}" method="POST">
        @csrf
           <div class="mb-1">
                <label for="email" class="d-block">Email</label>
                <input type="text" name="email" id="email" class="d-block"/>
           </div>
           <div class="mb-1">
                <label for="password" class="d-block">Hasło</label>
                <input type="password" name="password" id="password" class="d-block"/>
           </div>
           <div>
                <button class="rounded btn btn-primary" type="sumbit">Zaloguj się</button>
           </div>   
        </form>
    </body>
</html>
