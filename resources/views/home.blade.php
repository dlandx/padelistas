@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="text-justify">
    <div class="title">
        <h2 class="blue text-uppercase">Elige el club deportivo más cercano</h2>
    </div>

    <div class="dashboard col-12 px-5">
        <div class="dashboard-content">
            <div class="mb-5">
                <h4 class="text-primary pb-3">Bienvenido {{ Auth::user()->name }}!!!</h4>
                <p>Aquí tiene un pequeño listado de las reservas actuales o pendientes que tiene a día de hoy.</p>
                <p>Si gustas puedes ver más información o cancelar una reserva puslando en ella.</p>
                
                <div class="dos-grid text-center p-3 info">
                    <p class="pt-2 font-italic text-primary">No dudes en realizar una reserva</p>
                    <a href="{{ route('home.club') }}"><button class="btn-club btn btn-outline-primary">Realizar reserva</button></a>
                </div>
            </div>

            @empty($current)
                <div class="alert alert-warning w-75 m-auto" role="alert"><b>Vaya!!!</b> no tienes niguna reserva actual...</div>
            @endempty

            <div class="dos-grid">
                {{-- Reservas actuales --}}
                @foreach ($current as $value)
                    <a href="{{ route('reserve.show', $value->id) }}" class="px-3">
                        <div class="reservation-content {{ ($value->pivot->status == 2) ? 'pending-reserve pending' : (($value->pivot->status == 1) ? 'reserved success' : 'cancelled-reserve cancelled') }}">
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
                            <div class="dos-grid">
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
                    </a>
                @endforeach
            </div>
            
        </div>

        <div class="dashboard-list">
            <h3 class="text-center">Historial de reservas</h3> 
            
            <div class="list-scroll">
                @empty($past)
                    <div class="alert alert-danger text-center my-4" role="alert"><b>No puede ser :(</b> no has realizado ninguna reserva.</div>
                @endempty

                @foreach ($past as $value)
                    <div class="reservation-content {{ ($value->pivot->status == 2) ? 'pending-reservation' : (($value->pivot->status == 1) ? 'success-reservation' : 'cancelled-reservation') }}">
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
                        <div class="dos-grid">
                            <span>{{ $value->start }}</span>
                            <span class="reservation-right">{{ $value->duration }}</span>
                        </div>
                        
                        <div class="reservation-data">
                            <span class="{{ ($value->pivot->status == 2) ? 'pending' : (($value->pivot->status == 1) ? 'success' : 'cancelled') }}">{{ ($value->pivot->status == 2) ? 'Pendiente' : (($value->pivot->status == 1) ? 'Confirmado' : 'Cancelado') }}</span>
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
    </div>
</section>
@endsection
