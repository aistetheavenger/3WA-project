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

        <!-- Styles -->
        <style>
            html, body {
                background: #cc99ff;
                background: -webkit-linear-gradient(left top, #9966ff, #66ffff);
                background: -o-linear-gradient(bottom right, #9966ff, #66ffff);
                background: -moz-linear-gradient(bottom right, #9966ff, #66ffff);
                background: linear-gradient(to bottom right, #9966ff, #66ffff);
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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

            }

            .orangeBtn {

                background: black;

            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   Apple Forest
                </div>

                <div class="links">
                    <a href="/shopNow" class="btn btn-default">SHOP NOW</a>
                    <a href="/reservation" class="btn btn-lg orangeBtn">BOOK A TABLE</a>
                    <a href="/contacts" class="btn btn-default">CONTACTS</a>
                </div>
            </div>
        </div>
    </body>
</html>


