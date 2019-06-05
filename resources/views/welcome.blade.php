@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="text-center">
        <h1>Reserva pista de pádel, tenis y campo de fútbol al instante, nunca fue tan fácil...</h1>
        <p>¡Reserva tu pista o campo en los clubes disponibles según tu ciudad!</p>
    </div>
</section>

<section>
    <div class="dos-grid w-75 h-75">
        <div class="steps align-self-center">
            <h2>Con padelistas juega en 3 pasos sencillos</h2>
            
            <div class="accordion text-right" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">ELIGE TU CLUB</button>
                        </h2>
                    </div>                
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            Elige tu club preferido, o deja que la aplicación te sugiera en base a tu ubicación...
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">RESERVA</button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            Elige la pistas, el tiempo que deseas jugar
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">JUEGA</button>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            Diviértete y disfruta del deporte. ¡Disfruta al máximo del partido y dalo todo en la pista!
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="step-img">
        </div>
    </div>
</section>
@endsection