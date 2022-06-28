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


    <!--====== Bootstrap css ======-->
    {{-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!--====== Animate css ======-->
    {{-- <link rel="stylesheet" href="assets/css/animate.css">

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
    <link rel="stylesheet" href="assets/css/responsive.css"> --}}


</head>

<body>

    <!--====== HEADER PART ENDS ======-->

   {{-- <div id="app">
        <!--====== PRELOADER PART START ======-->



        {{-- <div class="preloader">
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


                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a data-scroll-nav="0" href="{{route('index')}}">Home</a>
                                    </li>

                                    @auth()
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Config
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" data-scroll-nav="0" href="{{route('items-view')}}">Products</a>
                                            <a class="dropdown-item" data-scroll-nav="0" href="{{route('category-view')}}">Categories</a>
                                        </div>
                                    </li>

                                    @endauth



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



    </div> --}}


    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{('/')}}">
                <img src="images/logos.png" width="200" alt="Logo">
            </a> <!-- Logo -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="{{route('index')}}">Home</a>
                </li>

                    @auth()

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Config
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" data-scroll-nav="0" href="{{route('items.view')}}">Products</a>
                                <a class="dropdown-item" data-scroll-nav="0" href="{{route('category.view')}}">Categories</a>
                            </div>
                        </li>

                    @endauth
                    @if (Route::has('login'))
                        @auth
                            <cart-component></cart-component>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Log in</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                            @endif
                        @endauth
                    @endif


              </ul>
            </div>
          </nav>


          @yield('content')
    </div>

        {{-- <script>
            window.onbeforeunload = function(){
                window.scrollTo(0,0);
            }
        </script> --}}

     <!--====== jquery js ======-->
     {{-- <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
     <script src="assets/js/vendor/jquery-1.12.4.min.js"></script> --}}
     <script src="{{ asset('js/app.js') }}" ></script>

     <!--====== Bootstrap js ======-->
     {{-- <script src="assets/js/bootstrap.min.js"></script> --}}


     <!--====== Slick js ======-->
     {{-- <script src="assets/js/slick.min.js"></script>

     <!--====== Magnific Popup js ======-->
     <script src="assets/js/jquery.magnific-popup.min.js"></script>


     <!--====== nav js ======-->
     <script src="assets/js/jquery.nav.js"></script>

     <!--====== Nice Number js ======-->
     <script src="assets/js/jquery.nice-number.min.js"></script>

     <!--====== Main js ======-->
     <script src="assets/js/main.js"></script> --}}
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    </body>

 </html>
