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

    <!-- Styles -->
    <link href="{{-- asset('css/app.css') --}}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

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
                        <ul>
                            <!-- Authentication Links -->
                            @guest
                                <li><a href="{{ route('list.club') }}">{{ __('Club') }}</a></li>
                                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
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
                                <li><a href="{{ route('home.club') }}">{{ __('Club') }}</a></li>                                
                            @endguest
                        </ul>
                    </nav>
                @endif
                
                <div class="admin">
                    <li><a href="{{ route('admin.login') }}">{{ __('Admin') }}</a></li>
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="content">
                 @yield('content')
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    @yield('script') 
</body>
</html>
