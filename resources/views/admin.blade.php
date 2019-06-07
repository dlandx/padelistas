@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="text-justify">
    <div class="title">
        <h2 class="blue text-uppercase">Gestionar el club deportivo</h2>
    </div>

    <div class="dashboard col-sm-12 col-md-11 m-auto">
        <div class="dashboard-content pb-5">
            <div class="mb-5">
                <h4 class="text-primary pb-3">Hola {{ Auth::user()->name }}!!!</h4>
                <p>Bienvenido a la zona de gestion para tu centro deportivo <b>{{ Auth::user()->club->name }}</b>. Desde aquí podrás realizar tus actividades como gestionar los usuarios que esten dados de alta en el club "<b>usuarios que nos siguen</b>", gestionar las pistas que dispone tu centro deportivo, gestionar la lista de espera "<b>reservas que hayan sido canceladas</b>"...</p>
            </div>

            <div class="cancelled-reserve p-3 rounded text-danger">
                <h2 class="font-title">{{ Auth::user()->club->name }}</h2>
                <div class="dos-grid">
                    <div class="d-flex mt-3">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#a40505"><g id="surface1"><path d="M96,0.24c-29.505,0 -53.52,24.015 -53.52,53.52c0,24.45 12.825,52.485 25.44,74.76c12.615,22.275 25.2,38.76 25.2,38.76c0.675,0.915 1.74,1.47 2.88,1.47c1.14,0 2.205,-0.555 2.88,-1.47c0,0 12.6,-16.71 25.2,-39.12c12.6,-22.41 25.44,-50.46 25.44,-74.4c0,-29.505 -24.015,-53.52 -53.52,-53.52zM96,7.44c25.65,0 46.32,20.67 46.32,46.32c0,21.33 -12.12,48.96 -24.48,70.92c-10.095,17.955 -18.495,29.73 -21.84,34.32c-3.36,-4.53 -11.76,-16.155 -21.84,-33.96c-12.345,-21.81 -24.48,-49.38 -24.48,-71.28c0,-25.65 20.67,-46.32 46.32,-46.32zM96,30.84c-14.73,0 -26.76,12.03 -26.76,26.76c0,14.73 12.03,26.76 26.76,26.76c14.73,0 26.76,-12.03 26.76,-26.76c0,-14.73 -12.03,-26.76 -26.76,-26.76zM96,38.28c10.725,0 19.32,8.595 19.32,19.32c0,10.725 -8.595,19.32 -19.32,19.32c-10.725,0 -19.32,-8.595 -19.32,-19.32c0,-10.725 8.595,-19.32 19.32,-19.32zM58.2,131.16c-15.36,2.25 -28.35,5.805 -37.92,10.44c-4.785,2.31 -8.745,4.89 -11.64,7.92c-2.895,3.03 -4.8,6.795 -4.8,10.8c0,5.49 3.51,10.185 8.52,13.92c5.01,3.735 11.775,6.75 20.04,9.36c16.515,5.22 38.88,8.4 63.6,8.4c24.72,0 47.085,-3.18 63.6,-8.4c8.265,-2.61 15.03,-5.625 20.04,-9.36c5.01,-3.735 8.52,-8.43 8.52,-13.92c0,-3.99 -1.905,-7.77 -4.8,-10.8c-2.895,-3.03 -6.855,-5.61 -11.64,-7.92c-9.57,-4.635 -22.56,-8.19 -37.92,-10.44c-2.115,-0.33 -4.11,1.125 -4.44,3.24c-0.33,2.115 1.125,4.11 3.24,4.44c14.82,2.175 27.3,5.625 35.76,9.72c4.23,2.055 7.5,4.29 9.48,6.36c1.98,2.07 2.64,3.795 2.64,5.4c0,2.205 -1.47,4.74 -5.4,7.68c-3.93,2.94 -10.035,5.835 -17.76,8.28c-15.45,4.875 -37.26,8.04 -61.32,8.04c-24.06,0 -45.87,-3.165 -61.32,-8.04c-7.725,-2.445 -13.83,-5.34 -17.76,-8.28c-3.93,-2.94 -5.4,-5.475 -5.4,-7.68c0,-1.605 0.66,-3.33 2.64,-5.4c1.98,-2.07 5.25,-4.305 9.48,-6.36c8.46,-4.095 20.94,-7.545 35.76,-9.72c2.115,-0.33 3.57,-2.325 3.24,-4.44c-0.33,-2.115 -2.325,-3.57 -4.44,-3.24z"></path></g></g></g></svg> 
                        <p class="pl-2">{{ Auth::user()->club->address }}</p>
                    </div><button id="reserve" class="btn btn-outline-danger w-50 m-auto">Ver club</button>
                </div>
            </div>

            <div class="alert alert-success mt-5" role="alert">No esperes más y comience a gestionar el club deportivo</div>

            <ul class="list-group">
                <a href="{{ route('track.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center my-2">Pistas disponibles en el club <span class="badge badge-secondary badge-pill">{{ count(Auth::user()->club->tracks) }}</span></a>
                <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center my-2">Usuarios registrados <span class="badge badge-secondary badge-pill">{{ count(Auth::user()->club->users) }}</span></a>
            </ul>   
        </div>

        <div class="dashboard-list">
            <h3 class="text-center">Lista de espera</h3>
            <div class="list-scroll">   
                @php
                    $list = 0;
                @endphp    

                @foreach ($current as $item)
                    {{-- Si en la pivot esta en la lista de espera (es decir, que a cancelado la reserva...) --}}
                    @if ($item->pivot->waiting_list == 1)
                        <div class="reservation-content {{ ($item->pivot->status == 2) ? 'pending-reservation' : (($item->pivot->status == 1) ? 'success-reservation' : 'cancelled-reservation') }}">
                            <h3><a href="{{ route('admin.list', $item->id) }}">{{ Auth::user()->club->name }}</a></h3>
                            {{-- Nombre de la pista --}}
                            <h4>
                                @foreach (Auth::user()->club->tracks as $value)
                                    {{ ($item->club_track_id == $value->id) ? $value->title : '' }}
                                @endforeach
                            </h4>
                            <div class="dos-grid">
                                <span>{{ $item->start }}</span>
                                <span class="reservation-right">{{ $item->duration }}</span>
                            </div>

                            <div class="reservation-data">
                                <span class="{{ ($item->pivot->status == 2) ? 'pending' : (($item->pivot->status == 1) ? 'success' : 'cancelled') }}">{{ ($item->pivot->status == 2) ? 'Pendiente' : (($item->pivot->status == 1) ? 'Confirmado' : 'Cancelado') }}</span>
                                <span>
                                    {{-- Tipo de pista - pivot --}}
                                </span>
                                <span class="reservation-right">
                                    {{-- Nº de usuario que han realizado la reserva --}}
                                    Judadores: {{ count($item->users) }}
                                </span>
                            </div>            
                        </div>
                    @else 
                        @php
                            $list++;
                        @endphp
                    @endif
                @endforeach

                {{-- No hay lista de espera --}}
                @if ($list == count($current))
                    <div class="alert alert-warning" role="alert"><b>Milagro!!!</b> no hay reservas en la lista de espera, por el momento.</div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
