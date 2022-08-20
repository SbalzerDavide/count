<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My app</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
    </head>
    <body>
        {{-- pagina iniziale --}}
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <h1>Benvenuto</h1>
                    {{-- in eusto caso sono già loggato!
                        Ho l apossibilità di passare direttamente alla pagina gesitta da Vue o non ha senso quella gestita di Vue e prevedo questa come dashboard se sono già loggato? --}}
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <h1>Esegui l'accesso</h1>
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
            @endif
        </div>
    </body>
</html>
