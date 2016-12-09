<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap-flex.css">

        <title>Apple Forest</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Bungee+Shade|Finger+Paint|Fugaz+One|Knewave|Monoton|Montserrat+Subrayada|Open+Sans" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body,{
                color: white;
                font-family: 'Open Sans' sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;

            }

/*            font-family: 'Open Sans', sans-serif;
            font-family: 'Fugaz One', cursive;*/

            header {
                background-color: rgba(0, 0, 0, 0.4);
                z-index: -100;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color: white;
            }

            .links > a {
                color: white;
                padding: 10px 10px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                font-family: 'Finger Paint';

            }

            .orangeBtn {

                background: black;

            }

            .bgvid { 
                position: fixed;
                top: 50%;
                left: 50%;
                min-width: 100%;
                min-height: 100%;
                width: auto;
                height: auto;
                z-index: -200;
                -ms-transform: translateX(-50%) translateY(-50%);
                -moz-transform: translateX(-50%) translateY(-50%);
                -webkit-transform: translateX(-50%) translateY(-50%);
                transform: translateX(-50%) translateY(-50%);
                background-size: cover; 
            }
        </style>
    </head>
    <body>
        <header>
        <video playsinline autoplay muted loop class="bgvid" >
            <source src="{{$url = asset('/images/video2.mp4') }}" type="video/mp4">
        </video>

            <div class="flex-center position-ref full-height">

                @if (Auth::check())
                        @if (Auth::user()->isAdmin())
                            @include('partials.admin_navbar')
                        @endif 
                    @else
                        @if (Route::has('login'))
                            <div class="top-right links">
                                <a href="{{ url('/login') }}">Login</a>
                                <a href="{{ url('/register') }}">Register</a>
                            </div>
                    @endif
                @endif

                <div class="content">
                    <div class="title m-b-md">
                       Apple Forest
                    </div>

                    <div class="links">
                        <a href="/shopNow" class="btn btn-default">SHOP NOW</a>
                        <a href="{{route('reservation.create')}}" class="btn btn-lg orangeBtn">BOOK A TABLE</a>
                        <a href="/contacts" class="btn btn-default">CONTACTS</a>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>


