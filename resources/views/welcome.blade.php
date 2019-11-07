<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>

                    @if (Route::has('login'))
                        <ul class='nav navbar-nav navbar-right'>

                            @auth
                                <li><a href="{{ url('/home') }}"> Home</a>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}">
                                        Login</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a>
                                    </li>

                                @endif
                            @endauth
                        </ul>
                    @endif
</body>
</html>
