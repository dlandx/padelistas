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
                                @if (Auth::guard('admin')->check())
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                            {{ __('Home') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('club') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                            {{ __('Club') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.index') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                            {{ __('Usuarios') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('track.index') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                            {{ __('Pistas') }}
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                            {{ __('Home') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.club') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="15" height="15" viewBox="0 0 192 192" style=" fill:#000000; margin-right: 1rem;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#3498db"><path d="M107.52,8.45568v15.58656c34.76352,5.5488 61.44,35.65824 61.44,71.95776c0,40.23168 -32.72832,72.96 -72.96,72.96c-40.23168,0 -72.96,-32.72832 -72.96,-72.96c0,-36.25728 26.6112,-66.336 61.30944,-71.93856v-15.5904c-43.21152,5.7216 -76.66944,42.78144 -76.66944,87.52896c0,48.69888 39.61728,88.32 88.32,88.32c48.70272,0 88.32,-39.62112 88.32,-88.32c0,-44.7936 -33.52704,-81.88032 -76.8,-87.54432z"></path></g></g></svg>
                                            {{ __('Club') }}
                                        </a>
                                    </li>
                                @endif 
                            @endguest
                        </ul>
                    </nav>
                @endif
                
                @guest
                <div class="admin">
                    <li class="text-primary">{{ __('Admin') }}</li>
                    <div class="dos-grid w-50 m-auto pt-1">
                        <li>
                            <a href="{{ route('admin.register') }}"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#007bff"><g id="surface1"><path d="M76.32,1.56c-17.94,0.33 -29.4,7.575 -34.32,18.84c-4.695,10.725 -3.645,24.27 -0.24,38.28c-1.83,2.145 -3.285,5.025 -2.76,9.36c0.57,4.725 1.875,8.085 3.72,10.44c1.02,1.29 2.355,1.41 3.6,2.04c0.675,4.02 1.8,8.04 3.48,11.4c0.96,1.935 2.055,3.72 3.12,5.16c0.48,0.645 1.17,1.02 1.68,1.56c0.03,4.74 0.045,8.685 -0.36,13.68c-1.245,3.015 -4.155,5.445 -8.88,7.8c-4.875,2.43 -11.22,4.68 -17.64,7.44c-6.42,2.76 -13.02,6.12 -18.24,11.4c-5.22,5.28 -8.91,12.525 -9.48,22.08l-0.24,4.08h96.24l-2.52,-7.68h-84.84c1.08,-5.43 3.105,-9.795 6.36,-13.08c4.095,-4.14 9.675,-7.245 15.72,-9.84c6.045,-2.595 12.405,-4.65 18,-7.44c5.595,-2.79 10.77,-6.465 12.96,-12.36l0.24,-0.96c0.585,-6.435 0.36,-10.995 0.36,-16.56v-2.28l-2.04,-1.08c0.345,0.18 -0.48,-0.345 -1.2,-1.32c-0.72,-0.975 -1.605,-2.37 -2.4,-3.96c-1.59,-3.18 -2.895,-7.275 -3.24,-10.56l-0.36,-3.12l-3.24,-0.24c-0.03,0 -0.39,0.045 -1.08,-0.84c-0.69,-0.885 -1.59,-2.835 -2.04,-6.6c-0.375,-3.195 1.245,-4.305 1.08,-4.2l2.52,-1.56l-0.72,-2.76c-3.615,-13.92 -4.245,-26.565 -0.48,-35.16c3.75,-8.565 11.4,-13.95 27.36,-14.28c0.045,0 0.075,0 0.12,0c7.725,0.03 12.735,2.295 14.16,4.8l0.96,1.56l1.8,0.24c5.34,0.75 8.4,2.895 10.56,5.88c2.16,2.985 3.36,7.155 3.72,11.76c0.72,9.21 -1.935,19.935 -3.6,24.96l-0.96,3l2.64,1.56c-0.165,-0.105 1.47,1.005 1.08,4.2c-0.45,3.765 -1.35,5.715 -2.04,6.6c-0.69,0.885 -1.05,0.84 -1.08,0.84l-3.24,0.24l-0.36,3.12c-0.36,3.315 -1.695,7.38 -3.24,10.56c-0.78,1.59 -1.575,2.985 -2.28,3.96c-0.705,0.975 -1.44,1.515 -1.08,1.32l-2.04,1.08v2.28c0,5.55 -0.225,10.125 0.36,16.56v0.48l0.24,0.48c1.23,3.315 3.39,6.645 6.96,8.76l3.96,-6.6c-1.62,-0.96 -2.685,-2.61 -3.48,-4.56c-0.405,-4.995 -0.39,-8.94 -0.36,-13.68c0.495,-0.54 1.215,-0.915 1.68,-1.56c1.05,-1.455 2.055,-3.24 3,-5.16c1.635,-3.36 2.82,-7.395 3.48,-11.4c1.2,-0.63 2.49,-0.78 3.48,-2.04c1.845,-2.355 3.15,-5.715 3.72,-10.44c0.51,-4.2 -0.9,-6.975 -2.64,-9.12c1.875,-6.09 4.275,-15.93 3.48,-26.04c-0.435,-5.52 -1.845,-11.025 -5.16,-15.6c-3.03,-4.2 -7.95,-7.26 -14.16,-8.52c-4.035,-5.235 -11.295,-7.2 -19.68,-7.2zM145.92,99.84c-25.41,0 -46.08,20.67 -46.08,46.08c0,25.41 20.67,46.08 46.08,46.08c25.41,0 46.08,-20.67 46.08,-46.08c0,-25.41 -20.67,-46.08 -46.08,-46.08zM145.92,107.52c21.255,0 38.4,17.145 38.4,38.4c0,21.255 -17.145,38.4 -38.4,38.4c-21.255,0 -38.4,-17.145 -38.4,-38.4c0,-21.255 17.145,-38.4 38.4,-38.4zM142.08,122.88v19.2h-19.2v7.68h19.2v19.2h7.68v-19.2h19.2v-7.68h-19.2v-19.2z"></path></g></g></g></svg></a>
                        </li>
                        <li>
                            <a href="{{ route('admin.login') }}"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 191 191" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,191.99654v-191.99654h191.99654v191.99654z" fill="none"></path><g fill="#007bff"><g id="surface1"><path d="M75.9225,13.01188c-17.84656,0.32828 -29.24688,7.53555 -34.14125,18.74188c-4.67055,10.66914 -3.62602,24.1436 -0.23875,38.08063c-1.82047,2.13383 -3.26789,4.99883 -2.74562,9.31125c0.56703,4.70039 1.86523,8.04289 3.70062,10.38563c1.01469,1.28328 2.34273,1.40266 3.58125,2.02938c0.67148,3.99906 1.79062,7.99812 3.46187,11.34062c0.955,1.92492 2.0443,3.70063 3.10375,5.13313c0.4775,0.64164 1.16391,1.01469 1.67125,1.55187c0.02985,4.71531 0.04477,8.63977 -0.35813,13.60875c-1.23852,2.9993 -4.13336,5.41664 -8.83375,7.75938c-4.84961,2.41735 -11.16156,4.65562 -17.54813,7.40125c-6.38656,2.74562 -12.95219,6.08812 -18.145,11.34062c-5.19281,5.2525 -8.86359,12.45977 -9.43062,21.965l-0.23875,4.05875h114.83875c1.37281,0.01492 2.6561,-0.70133 3.35742,-1.89508c0.68641,-1.19375 0.68641,-2.65609 0,-3.84984c-0.70133,-1.19375 -1.98461,-1.91 -3.35742,-1.89508h-106.005c1.07437,-5.40172 3.08883,-9.74398 6.32688,-13.01188c4.07367,-4.11844 9.62461,-7.20727 15.63812,-9.78875c6.01352,-2.58148 12.34039,-4.62578 17.90625,-7.40125c5.56586,-2.77547 10.71391,-6.43133 12.8925,-12.29562l0.23875,-0.955c0.58195,-6.40148 0.35813,-10.93773 0.35813,-16.47375v-2.26813l-2.02938,-1.07437c0.3432,0.17906 -0.4775,-0.3432 -1.19375,-1.31312c-0.71625,-0.96992 -1.59664,-2.35765 -2.3875,-3.93938c-1.58172,-3.16344 -2.87992,-7.23711 -3.22313,-10.505l-0.35813,-3.10375l-3.22312,-0.23875c-0.02984,0 -0.38797,0.04477 -1.07438,-0.83562c-0.6864,-0.88039 -1.58172,-2.82023 -2.02937,-6.56562c-0.37305,-3.17836 1.23852,-4.28258 1.07437,-4.17813l2.50688,-1.55187l-0.71625,-2.74563c-3.59617,-13.8475 -4.22289,-26.42664 -0.4775,-34.97687c3.73047,-8.52039 11.34063,-13.87734 27.2175,-14.20563c0.04477,0 0.07461,0 0.11938,0c7.68477,0.02985 12.66867,2.28305 14.08625,4.775l0.955,1.55187l1.79062,0.23875c5.31219,0.73117 8.35625,2.87992 10.505,5.84937c2.14875,2.96945 3.3425,7.11773 3.70062,11.69875c0.71625,9.16203 -1.92492,19.83117 -3.58125,24.83l-0.955,2.98438l2.62625,1.55187c-0.16414,-0.10445 1.46235,0.99977 1.07438,4.17813c-0.44765,3.74539 -1.34297,5.68523 -2.02938,6.56562c-0.6864,0.88039 -1.04453,0.83562 -1.07438,0.83562l-3.22312,0.23875l-0.35813,3.10375c-0.35813,3.29773 -1.68617,7.34156 -3.22312,10.505c-0.77594,1.58172 -1.5668,2.96945 -2.26812,3.93938c-0.70133,0.96992 -1.4325,1.50711 -1.07438,1.31312l-2.02938,1.07437v2.26813c0,5.53602 -0.22383,10.07227 0.35813,16.47375v0.4775l0.23875,0.4775c2.89485,7.75937 10.51992,11.53461 18.38375,14.8025c7.86383,3.26789 16.45883,6.08812 23.03938,10.62438c1.10422,0.92516 2.62625,1.14898 3.93937,0.58195c1.32805,-0.56703 2.22336,-1.82047 2.31289,-3.25297c0.10445,-1.4325 -0.6118,-2.79039 -1.83539,-3.53648c-7.8489,-5.40172 -17.13031,-8.35625 -24.59125,-11.46c-7.28187,-3.02914 -12.17625,-6.13289 -13.8475,-10.14687c-0.40289,-4.96898 -0.38797,-8.89344 -0.35813,-13.60875c0.50735,-0.55211 1.19375,-0.91023 1.67125,-1.55187c1.04453,-1.44742 2.0443,-3.22312 2.98438,-5.13313c1.62648,-3.3425 2.80531,-7.35648 3.46187,-11.34062c1.19375,-0.62672 2.47703,-0.77594 3.46188,-2.02938c1.83539,-2.34273 3.1336,-5.68523 3.70063,-10.38563c0.50735,-4.17812 -0.89531,-6.93867 -2.62625,-9.0725c1.86523,-6.05828 4.25273,-15.84703 3.46187,-25.90437c-0.43273,-5.49125 -1.83539,-10.96758 -5.13312,-15.51875c-3.01422,-4.17812 -7.90859,-7.22219 -14.08625,-8.47563c-4.01398,-5.20773 -11.23617,-7.1625 -19.5775,-7.1625zM179.54,122.24c-2.92469,0 -5.77477,1.11914 -7.99812,3.3425l-1.91,1.91l-42.37812,42.25875c-0.4775,0.49242 -0.80578,1.11914 -0.955,1.79063l-3.93937,14.68312c-0.3432,1.31312 0.04477,2.70086 0.99977,3.65586c0.955,0.955 2.34273,1.34297 3.65586,0.99977l14.68313,-3.93937c0.67148,-0.14922 1.2982,-0.4775 1.79062,-0.955l42.25875,-42.37812c0,0 0.41781,-0.29844 0.71625,-0.59688v-0.11937c0.56703,-0.56703 1.19375,-1.19375 1.19375,-1.19375c4.44672,-4.44672 4.44672,-11.6689 0,-16.11563c-2.22336,-2.22336 -5.19281,-3.3425 -8.1175,-3.3425zM175.00375,132.86438l5.37187,5.37187l-41.5425,41.5425h-0.11937l-5.2525,-5.2525v-0.11938z"></path></g></g></g></svg></a>
                        </li>
                    </div>
                </div>
                @endguest

            </div>

            {{-- Header - LogOut --}}
            <div class="actions">
                <div class="icon-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 192 192" style="fill:#e4eaeb; padding-top: 11px;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e4eaeb"><g id="surface1"><path d="M96,7.68c-48.735,0 -88.32,39.585 -88.32,88.32c0,48.735 39.585,88.32 88.32,88.32c48.735,0 88.32,-39.585 88.32,-88.32c0,-48.735 -39.585,-88.32 -88.32,-88.32zM96,15.36c44.58,0 80.64,36.06 80.64,80.64c0,44.58 -36.06,80.64 -80.64,80.64c-44.58,0 -80.64,-36.06 -80.64,-80.64c0,-44.58 36.06,-80.64 80.64,-80.64zM56.88,69.12c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0zM56.88,92.16c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0zM56.88,115.2c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0z"></path></g></g></g></svg>
                </div>

                <div class="logo-responsive pt-3 pl-2">Padelistas</div>
                @guest
                @else
                <li class="nav-item dropleft pt-2">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }} <span class="caret"></span>
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
