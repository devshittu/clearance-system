<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clearance System</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    {{--<link href="{{ asset('z/bootstrap.css') }}" rel="stylesheet" >--}}

    {{--<script src="{{ asset('z/jquery-1.11.3.min.js') }}"></script>--}}
    {{--<script src="{{ asset('z/bootstrap.js') }}" ></script>--}}


    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- css files -->
    <link href="{{ asset('z/css/bootstrap.css') }}" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="{{ asset('z/css/style.css') }}" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="{{ asset('z/css/font-awesome.min.css') }}" rel="stylesheet"><!-- fontawesome css -->
    <!-- //css files -->

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <!-- //google fonts -->


</head>
<body>

<!-- header -->
<header>
    <nav class="navbar">
        <div class="container">
            <h1 class="wthree-logo">
                <a href="index.html" id="logoLink">{{--<i class="fa fa-adjust"></i>--}} <span>Clearance</span> System</a>
            </h1>

            <!-- menu -->
            <ul id="menu">

                @if (Route::has('login'))

                <li>
                    <input id="check02" type="checkbox" name="menu" />
                    <label for="check02"><span class="fa fa-bars" aria-hidden="true"></span></label>
                    <ul class="submenu">

                        @auth
                            <li><a href="{{ url('/home') }}"> Home</a>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}">Login</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @endauth
                    </ul>
                </li>

                @endif
            </ul>
            <!-- //menu -->

        </div>
    </nav>
</header>
<!-- //header -->

<!-- banner -->
<div id="home" class="banner-w3pvt d-flex">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 bnr-txt-w3pvt">
                <div class="bnr-w3pvt-txt mt-sm-5">
                    <h6>Welcome to my Online Clearance System</h6>
                    <h2>Hello <span>I'm Afolabi Abdullahi</span></h2>
                    <h4>CST/14/COM/00753</h4>
                    <p class="mt-4"> The aim is to design and implement an online clearance system.
                        Clearance system taking Bayero University, Kano as case-study.</p>

                    @if (Route::has('login'))

                            @auth
                            <a href="{{ url('/home') }}" class="scroll bnr-btn mr-2">Home </a>
                            @else
                            <a href="{{ route('login') }}" class="scroll bnr-btn mr-2">Login </a>
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="scroll bnr-btn1">Register </a>

                                @endif
                            @endauth
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->

<!-- copyright -->
<div class="copyright py-3 text-center">
    <div class="container">
        <p class="my-2">© 2019 Clearance system. All rights reserved
        </p>
    </div>
</div>
<!-- copyright -->

<!-- move top -->
<div class="move-top text-right">
    <a href="#home" class="move-top">
        <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
    </a>
</div>
<!-- move top -->

</body>
</html>
