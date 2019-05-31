@extends('layouts.app')

@section('head')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="main-admin">
        <div class="title-admin">
            <h2>Dashboard - {{ Auth::user()->name }}</h2>
        </div>
        
        <!-- Lista de espera -->
        <div class="list-admin">
            <div class="title-sticky">
                <h2>Lista de espera</h2>
            </div>                        
           
            <div class="list-scroll">
                @foreach ($current as $item)
                    {{-- Si en la pivot esta en la lista de espera (es decir, que a cancelado la reserva...) --}}
                    @if ($item->pivot->waiting_list == 1)
                        <div class="reservation-content">
                            <h3>{{ Auth::user()->club->name }}</h3>
                            <h4>
                                @foreach (Auth::user()->club->tracks as $value)
                                    {{ ($item->club_track_id == $value->id) ? $value->title : '' }}
                                @endforeach
                            </h4>
                            <div class="reservation-time">
                                <span>{{ $item->start }}</span>
                                <span class="reservation-right">{{ $item->duration }}</span>
                            </div>
                            
                            <div class="reservation-data">
                                <span>{{ ($item->pivot->status == 2) ? 'Pendiente' : (($item->pivot->status == 1) ? 'Confirmado' : 'Cancelado') }}</span>
                                <span>
                                    {{-- Tipo de pista - pivot --}}
                                </span>
                                <span class="reservation-right">{{ count($item->users) }}</span>
                            </div>            
                        </div>                        
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Gestión -->                    
        <div class="subtitle-admin title-sticky">
            <h2>Gestionar el club deportivo</h2>
        </div>

        <div class="content-admin">
            <div class="head-club">
                <div class="head-club-img">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
                </div>
                <div class="head-club-info">
                    <h3>{{ Auth::user()->club->name }}</h3>
                    <p>{{ Auth::user()->club->description }}</p>
                    <div class="main-step">
                        <p>{{ Auth::user()->club->address }}</p>
                        <button class="btn-club">Ver club</button>
                    </div>                            
                </div>
            </div>
            
            <div class="managment-admin">
                <h4>Bienvenido!!! comience a gestionar el club deportivo...</h4>
                <div class="main-step">
                    <a class="btn-club" href="{{ route('track.index') }}"><button >Gestionar pistas</button></a>
                    <a class="btn-club" href="{{ route('user.index') }}"><button class="btn-club">Gestionar usuarios</button></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

{{-- }}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <b>Admin</b>
                    
                    <div>
                        <a href="{{ route('track.index') }}">Gestionar Pistas</a>
                    </div>
                    <div>
                        <a href="{{ route('user.index') }}">Gestionar Usuarios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{ --}}