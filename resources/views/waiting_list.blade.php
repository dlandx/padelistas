@extends('layouts.app')

@section('head')
    {{-- Log Out --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="text-justify">
    <div class="title">
        <h2 class="blue text-uppercase">Información de la Reserva</h2>
    </div>

    <div class="col-sm-12 col-md-10 m-auto">
        <div class="dos-grid">
            <div>
                <table class="table table-hover table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-right">Pista</th>
                            <td>{{ $club_tracks->title }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Tipo de pista</th>
                            <td>{{ $club_tracks->track_type->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Tamaño</th>
                            <td>{{ $club_tracks->size->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Día</th>
                            <td>{{ $show->start }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Duración</th>
                            <td>{{ $show->duration }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Precio</th>
                            <td>{{ $show->price }} €</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Jugadores máximos</th>
                            <td>{{ $show->players }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Jugadores a buscar</th>
                            <td>{{ $show->search_players }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Nº de jugadores</th>
                            <td>{{ count($show->users) }}</td>
                        </tr>                        
                    </tbody>
                </table>
            </div>
            
            <div class="reserve-img center text-light text-center">      
                <div>
                    <div class="pb-5">
                        {{-- Nombre del club que tiene la pista --}}
                        <h2 class="text-uppercase"><a href="#">{{ $club_tracks->club->name }}</a></h2>
                        <p><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ecf0f1"><g id="surface1"><path d="M96,0.24c-29.505,0 -53.52,24.015 -53.52,53.52c0,24.45 12.825,52.485 25.44,74.76c12.615,22.275 25.2,38.76 25.2,38.76c0.675,0.915 1.74,1.47 2.88,1.47c1.14,0 2.205,-0.555 2.88,-1.47c0,0 12.6,-16.71 25.2,-39.12c12.6,-22.41 25.44,-50.46 25.44,-74.4c0,-29.505 -24.015,-53.52 -53.52,-53.52zM96,7.44c25.65,0 46.32,20.67 46.32,46.32c0,21.33 -12.12,48.96 -24.48,70.92c-10.095,17.955 -18.495,29.73 -21.84,34.32c-3.36,-4.53 -11.76,-16.155 -21.84,-33.96c-12.345,-21.81 -24.48,-49.38 -24.48,-71.28c0,-25.65 20.67,-46.32 46.32,-46.32zM96,30.84c-14.73,0 -26.76,12.03 -26.76,26.76c0,14.73 12.03,26.76 26.76,26.76c14.73,0 26.76,-12.03 26.76,-26.76c0,-14.73 -12.03,-26.76 -26.76,-26.76zM96,38.28c10.725,0 19.32,8.595 19.32,19.32c0,10.725 -8.595,19.32 -19.32,19.32c-10.725,0 -19.32,-8.595 -19.32,-19.32c0,-10.725 8.595,-19.32 19.32,-19.32zM58.2,131.16c-15.36,2.25 -28.35,5.805 -37.92,10.44c-4.785,2.31 -8.745,4.89 -11.64,7.92c-2.895,3.03 -4.8,6.795 -4.8,10.8c0,5.49 3.51,10.185 8.52,13.92c5.01,3.735 11.775,6.75 20.04,9.36c16.515,5.22 38.88,8.4 63.6,8.4c24.72,0 47.085,-3.18 63.6,-8.4c8.265,-2.61 15.03,-5.625 20.04,-9.36c5.01,-3.735 8.52,-8.43 8.52,-13.92c0,-3.99 -1.905,-7.77 -4.8,-10.8c-2.895,-3.03 -6.855,-5.61 -11.64,-7.92c-9.57,-4.635 -22.56,-8.19 -37.92,-10.44c-2.115,-0.33 -4.11,1.125 -4.44,3.24c-0.33,2.115 1.125,4.11 3.24,4.44c14.82,2.175 27.3,5.625 35.76,9.72c4.23,2.055 7.5,4.29 9.48,6.36c1.98,2.07 2.64,3.795 2.64,5.4c0,2.205 -1.47,4.74 -5.4,7.68c-3.93,2.94 -10.035,5.835 -17.76,8.28c-15.45,4.875 -37.26,8.04 -61.32,8.04c-24.06,0 -45.87,-3.165 -61.32,-8.04c-7.725,-2.445 -13.83,-5.34 -17.76,-8.28c-3.93,-2.94 -5.4,-5.475 -5.4,-7.68c0,-1.605 0.66,-3.33 2.64,-5.4c1.98,-2.07 5.25,-4.305 9.48,-6.36c8.46,-4.095 20.94,-7.545 35.76,-9.72c2.115,-0.33 3.57,-2.325 3.24,-4.44c-0.33,-2.115 -2.325,-3.57 -4.44,-3.24z"></path></g></g></g></svg> {{ $club_tracks->club->address }}</p>
                        <p><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"  stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#ecf0f1"><g id="surface1"><path d="M95.94,15.36c-39.585,0 -66.75,6.255 -80.82,18.66c-6.45,5.7 -2.28,29.55 -2.25,29.775c1.23,6.525 6.69,9.795 11.055,9.06c1.485,-0.24 7.395,-1.74 16.26,-4.005c4.32,-1.11 8.145,-2.085 9.39,-2.37c3.405,-0.765 6.285,-3.87 7.725,-8.265c0.63,-1.875 4.245,-10.365 6.93,-16.56c4.08,-0.975 15.39,-3.255 31.77,-3.255h0.015c16.365,0 27.675,2.28 31.755,3.24c2.685,6.21 6.3,14.7 6.915,16.56c1.47,4.485 4.38,7.575 7.8,8.295c1.26,0.27 5.385,1.35 9.93,2.52c8.445,2.175 14.1,3.615 15.705,3.87c0.375,0.045 0.735,0.075 1.125,0.075c4.095,0 8.76,-3.24 9.87,-9.135c0.045,-0.24 4.215,-24.09 -2.25,-29.805l-0.06,-0.06c-13.995,-12.345 -41.175,-18.6 -80.805,-18.6zM69.12,57.6c-2.13,0 -3.84,1.725 -3.84,3.84v9.855c-3.885,3.72 -16.545,16.065 -31.71,33.72c-11.94,13.905 -14.4,27.84 -14.37,37.08c0.03,7.185 3.735,30.33 3.9,31.305c0.285,1.875 1.89,3.24 3.78,3.24h19.2c2.13,0 3.84,-1.725 3.84,-3.84v-3.84h92.16v3.84c0,2.115 1.71,3.84 3.84,3.84h19.2c1.89,0 3.495,-1.365 3.78,-3.24c0.165,-0.975 3.885,-24.075 3.9,-31.32c0.015,-9.255 -2.46,-23.205 -14.37,-37.065c-15.165,-17.655 -27.825,-30 -31.71,-33.72v-9.855c0,-2.115 -1.71,-3.84 -3.84,-3.84h-11.52c-2.13,0 -3.84,1.725 -3.84,3.84v7.68h-23.04v-7.68c0,-2.115 -1.71,-3.84 -3.84,-3.84zM65.28,96h15.36v7.68h-15.36zM88.32,96h15.36v7.68h-15.36zM111.36,96h15.36v7.68h-15.36zM65.28,111.36h15.36v7.68h-15.36zM88.32,111.36h15.36v7.68h-15.36zM111.36,111.36h15.36v7.68h-15.36zM65.28,126.72h15.36v7.68h-15.36zM88.32,126.72h15.36v7.68h-15.36zM111.36,126.72h15.36v7.68h-15.36z"></path></g></g></g></svg> {{ $club_tracks->club->phone_number }}</p>
                    </div>

                    <div>
                        <table class="table text-light">
                            <thead>
                                <tr>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Nivel</th>
                                    <th scope="col">Asiste</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show->users as $item)
                                    <tr>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->level }}</td>
                                        <td>
                                            {{ ($item->pivot->status == 2) ? 'Duda' : (($item->pivot->status == 1) ? 'Si' : 'No') }}
                                        </td>
                                    </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{-- Fecha actual... --}}
                        <a href="{{ route('admin.cancelled', [$show->id, 0]) }}">
                            <button type='submit' class="btn btn-outline-light btn-block" disabled>Cancelar reserva</button>
                        </a>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
