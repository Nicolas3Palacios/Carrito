<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('styles')
    <!--====== Title ======-->
    <title>Best Shoping</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png"> --}}

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!--====== Animate css ======-->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="assets/css/slick.css">


    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="assets/css/style.css">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="assets/css/responsive.css">


</head>

<body>

    <!--====== HEADER PART ENDS ======-->

    <div id="app">
        <!--====== PRELOADER PART START ======-->



        <div class="preloader">
            <div class="spin">
                <div class="cube1"></div>
                <div class="cube2"></div>
            </div>
        </div>

        <!--====== PRELOADER PART START ======-->

        <!--====== HEADER PART START ======-->

        <header class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-fixed-top navbar-expand-lg">
                            <a class="navbar-brand" href="{{('/')}}">
                                <img src="assets/images/logos.png" width="270" alt="Logo">
                            </a> <!-- Logo -->
                            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="bar-icon"></span>
                                <span class="bar-icon"></span>
                                <span class="bar-icon"></span>
                            </button> --}}

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a data-scroll-nav="0" href="{{route('index')}}">Home</a>
                                    </li>

                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Config
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" data-scroll-nav="0" href="{{route('items-view')}}">Products</a>
                                            <a class="dropdown-item" data-scroll-nav="0" href="{{route('category-view')}}">Categories</a>
                                        </div>
                                    </li>

                                    {{-- <li class="nav-item">
                                        <a data-scroll-nav="0" href="{{route('items-view')}}">Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-scroll-nav="0" href="{{route('category-view')}}">Categories</a>
                                    </li> --}}
                                    @if (Route::has('login'))
                                            @auth
                                                <cart-component></cart-component>
                                            @else
                                                <li class="nav-item">
                                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                                </li>
                                                @if (Route::has('register'))
                                                <li class="nav-item">
                                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                                </li>
                                                @endif
                                            @endauth
                                    @endif
                                </ul> <!-- navbar nav -->
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </header>

        @yield('content')



    </div>

    <script>
        window.onbeforeunload = function(){
            window.scrollTo(0,0);
        }
    </script>

     <!--====== jquery js ======-->
     <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
     <script src="{{ asset('js/app.js') }}" ></script>

     <!--====== Bootstrap js ======-->
     <script src="assets/js/bootstrap.min.js"></script>


     <!--====== Slick js ======-->
     <script src="assets/js/slick.min.js"></script>

     <!--====== Magnific Popup js ======-->
     <script src="assets/js/jquery.magnific-popup.min.js"></script>


     <!--====== nav js ======-->
     <script src="assets/js/jquery.nav.js"></script>

     <!--====== Nice Number js ======-->
     <script src="assets/js/jquery.nice-number.min.js"></script>

     <!--====== Main js ======-->
     <script src="assets/js/main.js"></script>

 </body>

 </html>
