<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">



        <title>Jovem+
        </title>


        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: linear-gradient(to right top, #ffffff, #ededf0, #dbdce1, #c9cbd3, #b6bac5, #adb9cb, #a1b8d1, #91b8d5, #7bcae9, #5adcf6, #2eeef8, #07ffef);
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                color: #fcfffe;
            }


        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Entrar</a>
                    @else
                        <a href="{{ route('login') }}">Entrar</a>
                       <!-- <a href="{{ route('register') }}">Registrar</a> -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Jovem+
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </body>
</html>
