<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'Apple Forest') }}</title>

    
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">


    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>


    <!-- TinyMCE -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>


    <style>
        .navbar {
            background: #cc99ff;
            background: -webkit-linear-gradient(left top, #9966ff, #66ffff);
            background: -o-linear-gradient(bottom right, #9966ff, #66ffff);
            background: -moz-linear-gradient(bottom right, #9966ff, #66ffff);
            background: linear-gradient(to bottom right, #9966ff, #66ffff);
        }

        .navbar-brand img {
            max-height: 90px;
            max-width: 90px;
            margin-top: -5px;
            margin-left: -15px;
        }

        .navbar-default .navbar-brand {
            color: white;
        }

    @media 
    only screen and (max-width: 760px),
    (min-device-width: 768px) and (max-device-width: 1024px)  {

        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr { 
            display: block; 
        }
        
        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr { 
            position: absolute;
            top: -9999px;
            left: -9999px;
        }
        
        tr { border: 1px solid #ccc; }
        
        td { 
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee; 
            position: relative;
            padding-left: 50% !important; 
        }
        
        td:before { 
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 6px;
            left: 6px;
            width: 45%; 
            padding-right: 10px; 
            white-space: nowrap;
        }

        thead, th {
            display: none;
        }
        
        td:nth-of-type(1) {
            padding: 0 !important;

        }
        td:nth-of-type(1)  img {
          width: 100%;
          height: auto;
        }
        td:nth-of-type(2):before { content: "Name"; }
        td:nth-of-type(3):before { content: "Quantity"; }
        td:nth-of-type(4):before { content: "Price"; }
        td:nth-of-type(5):before { content: "Total price"; }
        td:nth-of-type(6):before { content: "Total price (with tax)"; }

        .table-orders td:nth-of-type(1) { 
            background: black;
            color: white;
            padding-left: 5px !important;
        }
        .table-orders td:nth-of-type(2):before { content: "Date"; }
        .table-orders td:nth-of-type(3):before { content: "Order ID"; }
        .table-orders td:nth-of-type(4):before { content: "Total price"; }
        .table-orders td:nth-of-type(5):before { content: "Products"; }
        
        .visible-xs, .visible-sm i {
            color: white;
            padding-top: 5px;
        }
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('', 'Apple Forest') }}
                    </a>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{$url = asset('/images/apple.png') }}"></a>
                    <a class="visible-xs visible-sm" href="{{route('cart.index') }}"> <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> <span class="badge">{{$cartCount}}</span></a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                        <li><a class="" href="/shopNow">SHOP NOW</a></li>
                        <li><a class="" href="{{route('reservation.create')}}">BOOK A TABLE</a></li>
                        <li><a class="btn btn-primary hidden-xs hidden-sm" href="{{route('cart.index') }}"> <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> <span class="badge">{{$cartCount}}</span> item(s)</a></li>

                        @if (Auth::check())
                            <li><a class="" href="{{route('orders.index')}}">ORDERS</a></li>
                        @endif

                        <li><a class="" href="/contacts">CONTACTS</a></li>

                        @if(Auth::guest())
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/register') }}">Register</a></li>
                        @endif

                        @if (Auth::check() && Auth::user()->isAdmin())
                          <!--   <li class="btn btn-small btn-danger">Admin mode</li> -->
                            <li><a href="{{ URL::to('dishes') }}">View All Dishes</a></li>
                            <li><a href="{{ URL::to('dishes/create') }}">Create Dish</a>
                            <li><a href="{{ route('reservation.index') }}">Bookings</a>
                            <li><a href="{{route('users.index')}}">Users</a>
                            <li><a href="{{ route('users.create') }}">Create Users</a>
                        @endif
                    


                        @if(Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('users.profile', Auth::user()->id) }}">User profile</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            >
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif

                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/site.js"></script>

</body>

</html>
