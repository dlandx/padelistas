@extends('layouts.app')

@section('head')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="main-admin">
        <div class="title-admin">
            <h2>Home admin</h2>
        </div>
        
        <!-- Lista de espera -->
        <div class="list-admin">
            <div class="title-sticky">
                <h2>Lista de espera</h2>
            </div>                        
            
            <div class="list-scroll">
                <div class="reservation-content">
                    <h3>Club</h3>
                    <h4>Pista x</h4>
                    <div class="reservation-time">
                        <span>2000-05-19 8:40 AM</span>
                        <span class="reservation-right"><b>Duración</b> 2h</span>
                    </div>
                    
                    <div class="reservation-data">
                        <span>Stado</span>
                        <span>Tipo</span>
                        <span class="reservation-right">user</span>
                    </div>            
                </div>
        
                <div class="reservation-content">
                    <h3>Club</h3>
                    <h4>Pista x</h4>
                    <div class="reservation-time">
                        <span>2000-05-19 8:40 AM</span>
                        <span class="reservation-right"><b>Duración</b> 2h</span>
                    </div>
                    
                    <div class="reservation-data">
                        <span>Stado</span>
                        <span>Tipo</span>
                        <span class="reservation-right">user</span>
                    </div>            
                </div>
    
                <div class="reservation-content">
                    <h3>Club</h3>
                    <h4>Pista x</h4>
                    <div class="reservation-time">
                        <span>2000-05-19 8:40 AM</span>
                        <span class="reservation-right"><b>Duración</b> 2h</span>
                    </div>
                    
                    <div class="reservation-data">
                        <span>Stado</span>
                        <span>Tipo</span>
                        <span class="reservation-right">user</span>
                    </div>            
                </div>
        
                <div class="reservation-content">
                    <h3>Club</h3>
                    <h4>Pista x</h4>
                    <div class="reservation-time">
                        <span>2000-05-19 8:40 AM</span>
                        <span class="reservation-right"><b>Duración</b> 2h</span>
                    </div>
                    
                    <div class="reservation-data">
                        <span>Stado</span>
                        <span>Tipo</span>
                        <span class="reservation-right">user</span>
                    </div>            
                </div>
            </div>
        </div>

        <!-- Gestión -->                    
        <div class="subtitle-admin title-sticky">
            <h2>Gestión...</h2>
        </div>

        <div class="content-admin">
            <div class="head-club">
                <div class="head-club-img">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
                </div>
                <div class="head-club-info">
                    <h3>TEXT</h3>
                    <p>Realiza una reserva en las pistas del club</p>
                    <div class="main-step">
                        <p>GPS</p>
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