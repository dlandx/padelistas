@extends('layouts.app')

@section('head')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="main-admin">
        <div class="title-admin">
            <h2>Mis reservas</h2>
        </div>
        
        <!-- Lista de espera -->
        <div class="list-admin">
            <div class="title-sticky">
                <h2>Historial de reservas</h2>
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
            
            <div class="current-reservations">
                <a href="" class="link-reserve">
                    <div class="content-reserve">
                        <img class="img-reserve" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
            
                        <div class="info-reserve">
                            <h3>Club</h3>
                            <h4>Pista x</h4>
                            <span>2000-05-19 8:40 AM</span>
                            <span class="reservation-right">2h</span>
            
                            <div class="reservation-data">
                                <span>Stado</span>
                                <span>Tipo</span>
                                <span class="reservation-right">user</span>
                            </div>  
                        </div>
                    </div>
                </a>

                <a href="" class="link-reserve">
                    <div class="content-reserve">
                        <img class="img-reserve" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
            
                        <div class="info-reserve">
                            <h3>Club</h3>
                            <h4>Pista x</h4>
                            <span>2000-05-19 8:40 AM</span>
                            <span class="reservation-right">2h</span>
            
                            <div class="reservation-data">
                                <span>Stado</span>
                                <span>Tipo</span>
                                <span class="reservation-right">user</span>
                            </div>  
                        </div>
                    </div>
                </a>

                <a href="" class="link-reserve">
                    <div class="content-reserve">
                        <img class="img-reserve" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
            
                        <div class="info-reserve">
                            <h3>Club</h3>
                            <h4>Pista x</h4>
                            <span>2000-05-19 8:40 AM</span>
                            <span class="reservation-right">2h</span>
            
                            <div class="reservation-data">
                                <span>Stado</span>
                                <span>Tipo</span>
                                <span class="reservation-right">user</span>
                            </div>  
                        </div>
                    </div>
                </a>

                <a href="" class="link-reserve">
                    <div class="content-reserve">
                        <img class="img-reserve" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
            
                        <div class="info-reserve">
                            <h3>Club</h3>
                            <h4>Pista x</h4>
                            <span>2000-05-19 8:40 AM</span>
                            <span class="reservation-right">2h</span>
            
                            <div class="reservation-data">
                                <span>Stado</span>
                                <span>Tipo</span>
                                <span class="reservation-right">user</span>
                            </div>  
                        </div>
                    </div>
                </a>

                <a href="" class="link-reserve">
                    <div class="content-reserve">
                        <img class="img-reserve" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
            
                        <div class="info-reserve">
                            <h3>Club</h3>
                            <h4>Pista x</h4>
                            <span>2000-05-19 8:40 AM</span>
                            <span class="reservation-right">2h</span>
            
                            <div class="reservation-data">
                                <span>Stado</span>
                                <span>Tipo</span>
                                <span class="reservation-right">user</span>
                            </div>  
                        </div>
                    </div>
                </a>

                <a href="" class="link-reserve">
                    <div class="content-reserve">
                        <img class="img-reserve" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/228448/stranger-things.jpg" alt="">
            
                        <div class="info-reserve">
                            <h3>Club</h3>
                            <h4>Pista x</h4>
                            <span>2000-05-19 8:40 AM</span>
                            <span class="reservation-right">2h</span>
            
                            <div class="reservation-data">
                                <span>Stado</span>
                                <span>Tipo</span>
                                <span class="reservation-right">user</span>
                            </div>  
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
