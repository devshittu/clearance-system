<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <style class="">
        @import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);

        .uploader {
            display: block;
            clear: both;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
        }

        .uploader label {
            float: left;
            clear: both;
            width: 100%;
            padding: 2rem 1.5rem;
            text-align: center;
            background: #fff;
            border-radius: 7px;
            border: 3px solid #eee;
            transition: all .2s ease;
            user-select: none;
        }

        .uploader label:hover {
            border-color: #454cad;
        }

        .uploader label.hover {
            border: 3px solid #454cad;
            box-shadow: inset 0 0 0 6px #eee;
        }

        .uploader label.hover #start i.fa {
            transform: scale(0.8);
            opacity: 0.3;
        }

        .uploader #start {
            float: left;
            clear: both;
            width: 100%;
        }

        .uploader #start.hidden {
            display: none;
        }

        .uploader #start i.fa {
            font-size: 50px;
            margin-bottom: 1rem;
            transition: all .2s ease-in-out;
        }

        .uploader #response {
            float: left;
            clear: both;
            width: 100%;
        }

        .uploader #response.hidden {
            display: none;
        }

        .uploader #response #messages {
            margin-bottom: .5rem;
        }

        .uploader #file-image {
            display: inline;
            margin: 0 auto .5rem auto;
            width: auto;
            height: auto;
            max-width: 180px;
        }

        .uploader #file-image.hidden {
            display: none;
        }

        .uploader #notimage {
            display: block;
            float: left;
            clear: both;
            width: 100%;
        }

        .uploader #notimage.hidden {
            display: none;
        }

        .uploader progress,
        .uploader .progress {
            display: inline;
            clear: both;
            margin: 0 auto;
            width: 100%;
            max-width: 180px;
            height: 8px;
            border: 0;
            border-radius: 4px;
            background-color: #eee;
            overflow: hidden;
        }

        .uploader .progress[value]::-webkit-progress-bar {
            border-radius: 4px;
            background-color: #eee;
        }

        .uploader .progress[value]::-webkit-progress-value {
            background: linear-gradient(to right, #393f90 0%, #454cad 50%);
            border-radius: 4px;
        }

        .uploader .progress[value]::-moz-progress-bar {
            background: linear-gradient(to right, #393f90 0%, #454cad 50%);
            border-radius: 4px;
        }

        .uploader input[type="file"] {
            display: none;
        }

        .uploader div {
            margin: 0 0 .5rem 0;
            color: #5f6982;
        }

        .uploader .btn {
            display: inline-block;
            margin: .5rem .5rem 1rem .5rem;
            clear: both;
            font-family: inherit;
            font-weight: 700;
            font-size: 14px;
            text-decoration: none;
            text-transform: initial;
            border: none;
            border-radius: .2rem;
            outline: none;
            padding: 0 1rem;
            height: 36px;
            line-height: 36px;
            color: #fff;
            transition: all 0.2s ease-in-out;
            box-sizing: border-box;
            background: #454cad;
            border-color: #454cad;
            cursor: pointer;
        }
    </style>
    <script>
        function checkScore(input, id) {
            let offerAdmissionButton = document.getElementById('saveAndOfferAdmission' + id );
            let itsAdmissionStatus = document.getElementById('is_admitted' + id );

            if (input.value >= 50) {
                offerAdmissionButton.style.display = "block";
                itsAdmissionStatus.value = 1;

            } else {
                offerAdmissionButton.style.display = "none";
                itsAdmissionStatus.value = 0;
            }

        }
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ $settings->system_name ?? 'System Stub Title' }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <span class="nav-link">Session: <strong>{{ __($settings->academic_session->title ) }}</strong></span>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Hi, {{ Auth::user()->full_name }}
                                ({{ ucfirst(Auth::user()->type) }}) <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->type === 'admin')
                                    <a class="dropdown-item" href="{{ route('settings') }}">
                                        {{ __('System Settings') }}
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    @if(session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif
                    @if(session()->has('failure_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('failure_message') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @yield('content')
    </main>
</div>
</body>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
<script src="{{ asset('js/jquery.min.js') }}" defer></script>
<script src="{{ asset('js/popper.min.js') }}" defer></script>
<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/blink.js') }}" defer></script>
<script src="{{ asset('js/script.js') }}" defer></script>
<script>
    function readURL(input, id) {
        id = id || '#file-image';
        if (input.files &amp;&amp; input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
            $('#file-image').removeClass('hidden');
            $('#start').hide();
        }
    }


</script>
</html>
