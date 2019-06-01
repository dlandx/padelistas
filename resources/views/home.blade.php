@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="main-admin">
        <div class="title-admin p-4 text-uppercase">
            <h2>Mis reservas</h2>
        </div>
        
        <!-- Lista de espera -->
        <div class="list-admin">
            <div class="title-sticky">
                <h2>Historial de reservas</h2>
            </div>       

            <div class="list-scroll">
                @empty($past)
                    <div class="alert alert-danger sin-datos text-center w-50" role="alert"><b>No puede ser :(</b> no has realizado ninguna reserva.</div>
                @endempty

                @foreach ($past as $value)
                    <div class="reservation-content">
                        <h3>
                            {{-- Nombre del club que tiene la pista - pivot --}}
                            @foreach ($club_tracks as $item)
                                <a href="{{ route('reserve.show', $value->id) }}">{{ ($value->club_track_id == $item->id) ? $item->club->name : ''}}</a>
                            @endforeach
                        </h3>
                        <h4>
                            {{-- Nombre de la pista --}}
                            @foreach ($club_tracks as $item)
                                {{ ($value->club_track_id == $item->id ) ? $item->title : ''}}
                            @endforeach
                        </h4>
                        <div class="reservation-time">
                            <span>{{ $value->start }}</span>
                            <span class="reservation-right">{{ $value->duration }}</span>
                        </div>
                        
                        <div class="reservation-data">
                            <span>{{ ($value->pivot->status == 2) ? 'Pendiente' : (($value->pivot->status == 1) ? 'Confirmado' : 'Cancelado') }}</span>
                            <span>
                                {{-- Tipo de pista - pivot --}}
                                @foreach ($club_tracks as $item)
                                    {{ ($value->club_track_id == $item->id ) ? $item->track_type->name : ''}}
                                @endforeach
                            </span>
                            <span class="reservation-right">
                                {{-- Nº de usuario que han realizado la reserva --}}
                                {{ count($value->users) }}
                            </span>
                        </div>            
                    </div>
                @endforeach                
            </div>
        </div>

        <!-- Gestión -->                    
        <div class="subtitle-admin title-sticky">
            <h2>Reservas actuales</h2>
        </div>

        <div class="content-admin">
            <div class="managment-admin p-3">
                <h4 class="c-green">Bienvenido {{ Auth::user()->name }}!!!</h4>
                <p>Aquí tiene un pequeño listado de las reservas actuales o pendientes que tiene a día de hoy.</p>
                <p>Si gustas puedes ver más información o cancelar una reserva puslando en ella.</p>
                
                <div class="main-step">
                    <p class="pt-2 font-italic text-info">No dudes en realizar una reserva</p>
                    <a class="btn-club" href="{{ route('home.club') }}"><button class="btn-club btn btn-light">Realizar reserva</button></a>
                </div>
            </div>
            
            @empty($current)
                <div class="alert alert-danger sin-datos" role="alert"><b>Vaya!!!</b> no tienes niguna reserva actual...</div>
            @endempty

            <div class="current-reservations">
                {{-- Reservas actuales --}}
                @foreach ($current as $value)
                    <a href="{{ route('reserve.show', $value->id) }}" class="link-reserve">
                        <div class="content-reserve">
                            <img class="img-reserve" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
                
                            <div class="info-reserve">
                                <h3>
                                    {{-- Nombre del club que tiene la pista - pivot --}}
                                    @foreach ($club_tracks as $item)                                        
                                        {{ ($value->club_track_id == $item->id) ? $item->club->name : ''}}
                                    @endforeach
                                </h3>
                                <h4>
                                    {{-- Nombre de la pista --}}
                                    @foreach ($club_tracks as $item)
                                        {{ ($value->club_track_id == $item->id ) ? $item->title : ''}}
                                    @endforeach
                                </h4>
                                <span>{{ $value->start }}</span>
                                <span class="reservation-right">{{ $value->duration }}</span>
                
                                <div class="reservation-data">
                                    <span>{{ ($value->pivot->status == 2) ? 'Pendiente' : (($value->pivot->status == 1) ? 'Confirmado' : 'Cancelado') }}</span>
                                    <span>
                                        {{-- Tipo de pista - pivot --}}
                                        @foreach ($club_tracks as $item)
                                            {{ ($value->club_track_id == $item->id ) ? $item->track_type->name : ''}}
                                        @endforeach
                                    </span>
                                    <span class="reservation-right">
                                        {{-- Nº de usuario que han realizado la reserva --}}
                                        {{ count($value->users) }}
                                    </span>
                                </div>  
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
