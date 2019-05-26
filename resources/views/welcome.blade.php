@extends('layouts.app')

@section('content')
<section>
    <div class="content-info info-home">
        <h1>Reserva pista de pádel, tenis y campo de fútbol al instante, nunca fue tan fácil...</h1>
        <p>¡Reserva tu pista o campo en los clubes disponibles según tu ciudad!</p>
    </div>
</section>

<section>
    <div class="content-info main-step">
        <div class="steps">
            <h2>Con padelistas juega en 3 pasos sencillos</h2>
            
            <div class="content-step">
                <div class="step">
                    <input type="checkbox" id="check-club">
                    <label for="check-club">ELIGE TU CLUB</label>                        
                    <div class="step-hidden">Elige tu club preferido, o deja que la aplicación te sugiera en base a tu ubicación...</div>
                </div>

                <div class="step">
                    <input type="checkbox" id="check-reserve">
                    <label for="check-reserve">RESERVA</label>                        
                    <div class="step-hidden">Elige la pistas, el tiempo que deseas jugar</div>
                </div>

                <div class="step">
                    <input type="checkbox" id="check-play">
                    <label for="check-play">JUEGA</label>                        
                    <div class="step-hidden">Diviértete y disfruta del deporte. ¡Disfruta al máximo del partido y dalo todo en la pista!</div>
                </div>
            </div>
        </div>

        <div class="content-img">
        </div>

    </div>
</section>
@endsection