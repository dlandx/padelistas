<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        
        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
        <style>/*
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }*/
        </style>
    </head>
    <body>
        <div class="main_nav">
            <div class="logo">
                Padelistas
            </div>
            
            @if (Route::has('login'))
                <nav>
                    <a href="#site-nav" class="nav-toggle js-nav-toggle js-no-hijack"><span class="sr-only">Menu</span><span></span></a>
                    
                    <ul class="menu">
                    @auth
                        <li class="menu_item">
                            <a href="{{ url('/home') }}" class="menu_link"><span>{{ __('Home') }}</span></a>
                        </li>
                    @else
                        <li class="menu_item">
                            <a href="/clubs" class="menu_link"><span>{{ __('Clubes') }}</span></a>
                        </li>
                        <li class="menu_item">
                            <a href="{{ route('login') }}" class="menu_link"><span>{{ __('Identificarse') }}</span></a>
                        </li>
                        @if (Route::has('register'))
                            <li class="menu_item">
                                <a href="{{ route('register') }}" class="menu_link"><span>{{ __('Registrarse') }}</span></a>
                            </li>
                        @endif
                    @endauth
                    </ul>
                </nav>
            @endif
        </div>
        
        <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>


        </div>
        
    </body>
</html>
