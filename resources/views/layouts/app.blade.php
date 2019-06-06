<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts - PROBLEM WITH FULLCALENDAR...
    <script src="{{ asset('js/app.js') }}" defer></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{-- asset('css/app.css') --}}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- SECTION LINK/SCRIPT -->
    @yield('head')
</head>

<body>
    <div id="app">
        <div class="main">
            {{-- MENU --}}
            <div class="menu">
                <div class="logo"><a href="{{ route('welcome') }}">Padelistas</a></div>

                @if (Route::has('login'))
                    <nav>                        
                        <div class="close-menu">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#c23b2c"><path d="M34.56,15.36c-10.55814,0 -19.2,8.64186 -19.2,19.2v122.88c0,10.55814 8.64186,19.2 19.2,19.2h122.88c10.55814,0 19.2,-8.64186 19.2,-19.2v-122.88c0,-10.55814 -8.64186,-19.2 -19.2,-19.2zM34.56,23.04h122.88c6.40698,0 11.52,5.11302 11.52,11.52v122.88c0,6.40698 -5.11302,11.52 -11.52,11.52h-122.88c-6.40698,0 -11.52,-5.11302 -11.52,-11.52v-122.88c0,-6.40698 5.11302,-11.52 11.52,-11.52zM64.155,58.725l-5.43,5.43l31.845,31.845l-31.845,31.845l5.43,5.43l31.845,-31.845l31.845,31.845l5.43,-5.43l-31.845,-31.845l31.845,-31.845l-5.43,-5.43l-31.845,31.845z"></path></g></g></svg>
                        </div>
                    
                        <ul>
                            <!-- Authentication Links -->
                            @guest
                                <li>
                                    <a href="{{ route('list.club') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                        {{ __('Club') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('login') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                        {{ __('Login') }}
                                    </a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                            {{ __('Register') }}
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li>
                                    <a href="{{ route('home.club') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                        {{ __('Club') }}
                                    </a>
                                </li>                                
                            @endguest
                        </ul>
                    </nav>
                @endif
                
                <div class="admin">
                    <li><a href="{{ route('admin.login') }}">{{ __('Admin') }}</a></li>
                </div>
            </div>

            {{-- Header - LogOut --}}
            <div class="actions">
                <div class="icon-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style="fill:#e4eaeb; padding-top: 11px;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e4eaeb"><g id="surface1"><path d="M96,7.68c-48.735,0 -88.32,39.585 -88.32,88.32c0,48.735 39.585,88.32 88.32,88.32c48.735,0 88.32,-39.585 88.32,-88.32c0,-48.735 -39.585,-88.32 -88.32,-88.32zM96,15.36c44.58,0 80.64,36.06 80.64,80.64c0,44.58 -36.06,80.64 -80.64,80.64c-44.58,0 -80.64,-36.06 -80.64,-80.64c0,-44.58 36.06,-80.64 80.64,-80.64zM56.88,69.12c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0zM56.88,92.16c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0zM56.88,115.2c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0z"></path></g></g></g></svg>
                </div>

                <div class="logo-responsive">Padelistas</div>
                @guest
                @else
                <li class="nav-item dropleft">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </div>

            {{-- CONTENT --}}
            <div class="content">
                 @yield('content')
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    @yield('script') 

    <script>
        $(document).ready(function(){
            // Pulsa en el icono del menu - mostramos
            $('.icon-menu').on('click', function() {
                $('.menu').addClass('active');
            });

            // ocultamos menu
            $('.close-menu').on('click', function() {
                $('.menu').removeClass('active');
            });
        });

        /*
        const menuIconEl = $('.icon-menu');
        const sidenavEl = $('.menu');
        const sidenavCloseEl = $('.close-menu');

        // Add and remove provided class names
        function toggleClassName(el, className) {
            if (el.hasClass(className)) {
                el.removeClass(className);
            } else {
                el.addClass(className);
            }
        }

        // Open the side nav on click
        menuIconEl.on('click', function() {
            toggleClassName(sidenavEl, 'active');
        });

        // Close the side nav on click
        sidenavCloseEl.on('click', function() {
            toggleClassName(sidenavEl, 'active');
        });*/
    </script>
</body>
</html>
