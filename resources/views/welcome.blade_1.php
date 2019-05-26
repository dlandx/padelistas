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
            }
            .main {
                position: fixed;
                display: grid;
                grid-template-rows: 1fr 1fr 1fr;
                height: 100%;
            }
            
            .logo {
                margin: 2rem;
                font-size: 2rem;
                text-transform: uppercase;
                writing-mode: vertical-rl;
                transform: rotate(180deg);
            }
            
            nav {
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
            section {
                height: 100vh;
                display: grid;
                justify-content: center;
                align-items: center;
            }
            .home {
                background: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(https://4.bp.blogspot.com/-oQ89uVGKBxM/WSqO1ncRCDI/AAAAAAAAAz0/Byto9jIhSMEeCpq5SRaY-ht-fLvRm4_kwCK4B/s1600/SimplePolyStadiumKit_screenshot01.png) no-repeat;
                background-size: 87%;
                background-position: right;
                background-color: #868b8e; /* #878c90;*/
            }
            section:nth-of-type(2) {
                background: gold;
            }
            section:nth-of-type(3) {
                background: green;
            }
            
            /* ---------- MENU ---------- /
            .logo {
                position: fixed;
                font-size: 2rem;
                text-transform: uppercase;
                top: 2rem;
                left: 1rem;
                writing-mode: vertical-rl;
                transform: rotate(180deg);
            }
            nav {
                position: fixed;
                display: grid;
                align-content: center;
                height: 100%;
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
            
            /* ---------- CONTENT ---------- /
            .content {
                    scroll-snap-type: proximity;
            }
            section {
                height: 100vh;
                display: grid;
                justify-content: center;
                align-items: center;
                    scroll-snap-align: start;
            }
            .home {
                background: linear-gradient(rgba(0, 0, 0, 0.5),rgba(0, 0, 0, 0.5)), url(https://4.bp.blogspot.com/-oQ89uVGKBxM/WSqO1ncRCDI/AAAAAAAAAz0/Byto9jIhSMEeCpq5SRaY-ht-fLvRm4_kwCK4B/s1600/SimplePolyStadiumKit_screenshot01.png) no-repeat;
                background-size: 87%;
                background-position: right;
                background-color: #868b8e; /* #878c90;/
            }
            section:nth-of-type(2) {
                background: gold;
            }
            section:nth-of-type(3) {
                background: green;
            } 
            */
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
            <section class="home">
                <div>
                    <h2>Reservar pista de pádel al instante, nunca fue tan fácil...</h2>
                    <p>¡Reserva tu pista o campo en los clubes disponibles segun tu ciudad!</p>
                </div>                
            </section>
            
            <section>
                <div>
                    <h2>Section 2</h2>
                
                    <div class="card project_widget">
                        <div class="pw_img">
                            <img class="img-fluid" src="../assets/images/image4.jpg" alt="About the image">
                        </div>
                        <div class="body">
                            <div class="row pw_content">
                                <div class="col-12 pw_header">
                                    <h6>New Dashboard</h6>
                                    <small class="text-muted">sQuare  |  Last Update: 17 Dec 2017</small>
                                </div>
                                <div class="col-8 pw_meta">
                                    <span>4,210 USD</span>                                
                                    <small class="text-success">Early Dec 2017</small>
                                </div>
                                <div class="col-4">
                                    <div class="sparkline m-t-10" data-type="bar" data-width="97%" data-height="26px" data-bar-width="2" data-bar-spacing="7" data-bar-color="#60bafd"><canvas width="83" height="26" style="display: inline-block; width: 83px; height: 26px; vertical-align: top;"></canvas></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section>
                <h2>Section 3</h2>
            </section>
        </div>
    </body>
</html>
