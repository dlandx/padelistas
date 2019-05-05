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
        
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <!-- Styles -->
        <link href="{{-- asset('css/style.css') --}}" rel="stylesheet">
    
        <style>
            body {
                margin: 0;
                color: #616161;
                background: #f7f7f7;
            }
            .main {
                width: 15%;
                float: left;
                position: fixed;
                display: grid;
                grid-template-rows: 1fr 1fr 1fr;
                height: 100%;
            }
            .content {
                float: right;
                width: 85%;
                position: relative;
            }
            a {
                color: #546e7a;
            }
            
            /* ---------- MENU ---------- */
            .logo {
                margin: auto;
                font-size: 2rem;
                text-transform: uppercase;
                writing-mode: vertical-rl;
                transform: rotate(180deg);
            }
            
            .main>nav {
                margin: auto;
            }
            .menu {
                list-style: none;
                text-align: right;
                line-height: 3rem;
            }
            .menu>li a {
                text-decoration: none;
            }
            .menu>li a.active {
                border-right: 2px solid red;
                padding-right: 6px;
            }
            .admin {
                margin: auto;
                margin-bottom: 1rem;
            }
            
            /* ---------- CONTENT ---------- */
            .content>section {
                height: 100vh;
                display: grid;
            }
            
            .info_home {
                background: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(https://4.bp.blogspot.com/-oQ89uVGKBxM/WSqO1ncRCDI/AAAAAAAAAz0/Byto9jIhSMEeCpq5SRaY-ht-fLvRm4_kwCK4B/s1600/SimplePolyStadiumKit_screenshot01.png) no-repeat;
                background-size: 100%;
                background-position: center;
                background-color: #868b8e; /* #878c90;*/                
                color: #fff;
            }
            .info_home>div {
                margin: auto;
                width: 80%;
                text-align: center;
            }
            
            .info_app {
                grid-template-columns: 1fr 1fr;
            }
            .text_app {
                margin: auto;
            }
            .text_app>h2 {
                font-size: 3rem;
                color: #2c2c2c;
                margin: 2rem;
            }
            .info {
                text-align: right;
                margin: 2rem;
            }
            .info_img {
                /*background: #166732;*/
                margin: auto;
            }
        </style>
    </head>
    <body>
        {{-- MENU --}}
        <div class="main">
            <div class="logo">Padelistas</div>

            @if (Route::has('login'))
                <nav>
                    <a href="#site-nav" class="nav-toggle js-nav-toggle js-no-hijack"><span class="sr-only">Menu</span><span></span></a>

                    <ul class="menu">
                    @auth
                        <li>
                            <a href="#"><span>{{ __('Home') }}</span></a>
                        </li>
                    @else
                        <li>
                            <a href="#" class="active"><span>{{ __('Clubes') }}</span></a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}"><span>{{ __('Identificarse') }}</span></a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}"><span>{{ __('Registrarse') }}</span></a>
                            </li>
                        @endif
                    @endauth
                    </ul>
                </nav>
            @endif

            <div class="admin">
                <p>Administrador</p>
                @if (Route::has('login'))

                    @auth

                    @else
                        <p><a href="{{ route('admin.login') }}"><span>{{ __('Identificarse') }}</span></a></p>
                        <p><a href="{{ route('admin.register') }}"><span>{{ __('Registrarse') }}</span></a></p>
                    @endauth
                @endif
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="content">
            <section class="info_home">
                <div>
                    <h2>Reservar pista de pádel al instante, nunca fue tan fácil...</h2>
                    <p>¡Reserva tu pista o campo en los clubes disponibles segun tu ciudad!</p>
                </div>                
            </section>
            
            <section class="info_app">
                <div class="text_app">
                    <h2>Con padelistas juega en 3 pasos sencillos</h2>
                    
                    <div class="info">
                        <h4>Elige tu club</h4>
                        <p>...</p>
                    </div>
                    
                    <div class="info">
                        <h4>Reserva</h4>
                        <p>...</p>
                    </div>
                    
                    <div class="info">
                        <h4>Juega</h4>
                        <p>...</p>
                    </div>                    
                </div>
                
                <div class="info_img">
                    <button type="button" class="btn btn-outline-secondary">Ver clubes</button>              
                </div>
            </section>
            
        </div>

    </body>
</html>
