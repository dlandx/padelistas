@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="main-admin">
        <div class="title-admin p-4 text-uppercase">
            <h2>Dashboard - {{ Auth::user()->username }}</h2>
        </div>
        
        <!-- Lista de espera -->
        <div class="list-admin">
            <div class="title-sticky">
                <h2>Lista de espera</h2>
            </div>

            <div class="list-scroll">
                @empty($current)
                    <div class="alert alert-warning sin-datos text-center w-75" role="alert"><b>Milagro!!!</b> no hay reservas en la lista de espera, por el momento.</div>
                @endempty

                @foreach ($current as $item)
                    {{-- Si en la pivot esta en la lista de espera (es decir, que a cancelado la reserva...) --}}
                    @if ($item->pivot->waiting_list == 1)
                        <div class="reservation-content">                            
                            <h3><a href="{{ route('admin.list', $item->id) }}">{{ Auth::user()->club->name }}</a></h3>
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

        <div class="content-admin p-4">
            <div class="head-club">
                <div class="head-club-img">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
                </div>
                <div class="head-club-info">
                    <h3><a class="link text-capitalize" href="">{{ Auth::user()->club->name }}</a></h3>
                    <p>
                        @if (Auth::user()->club->description == '')
                            <div class="alert alert-danger mr-4" role="alert">El <b>{{ Auth::user()->club->name }}</b> no dispone de ninguna descripción por el momento...</div>
                        @else
                            {{ Auth::user()->club->description }}
                        @endif
                    </p>
                    <div class="main-step">
                        <p class="pt-3">{{ Auth::user()->club->address }}</p>
                        <button class="btn-club btn btn-outline-info">Ver club</button>
                    </div>                            
                </div>
            </div>
            
            <div class="pt-4 managment-admin">
                <div class="alert alert-success mr-4" role="alert">Bienvenido <b>{{ Auth::user()->name }}</b>!!! comience a gestionar el club deportivo...</div>
                <div class="main-step mt-4">
                    <a class="btn-club" href="{{ route('track.index') }}"><button class="btn btn-outline-dark">Gestionar pistas</button></a>
                    <a class="btn-club" href="{{ route('user.index') }}"><button class="btn-club btn btn-outline-secondary">Gestionar usuarios</button></a>
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