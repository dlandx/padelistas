@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="text-justify">
    <div class="title">
        <h2 class="blue text-uppercase font-title">Información de la pista - {{ $show->title }}</h2>
    </div>

    <div class="col-sm-12 col-md-11 m-auto">
        <div class="row">
            <div class="col-sm-12 col-md-8 mb-4">
                <h2 class="font-title">{{ $show->title }}</h2>

                <div class="my-4">
                    @if ($show->description == '')
                        <div class="alert alert-warning" role="alert">Vaya la pista no tiene descripción, actualice la información para que los usuario puedan saber más de la misma, que ventajas tiene, que servicios ofrece, las caracteristicas de la instalación...</div>
                    @else
                        {{ $show->description }}
                    @endif
                </div>

                <div><h2 class="font-title">Hay pistas y pistas</h2>
                    <p>Hemos pensado en todo, y te ofrecemos las mejores pistas de pádel.</p>
                    <p>Dimensiones, materiales y características de pistas profesionales.</p>
                    <p>Perfectamente orientadas para eliminar cualquier molestia&nbsp;de deslumbramiento&nbsp;por el sol en cualquier época del año. El césped de 12 mm es una de las claves de las pistas del Club Nudos, sobre esta superficie notarás la diferencia en tu juego.&nbsp;Pistas panorámicas de cristal de 12 mm para rebotes más eficaces y mayor seguridad. 9 pistas, incluida la central, con un sistema de cubiertas desmontables de material textil perfectamente orientadas para una mayor luminosidad en pista, sin reflejos y una mejor acústica. Adiós al molesto sonido metálico.</p>
                    <p>Si tu preferencia es el muro, disponemos de 3 pistas especialmente diseñadas sin juntas y perfectamente lisas.</p>
                    <p>Además, nuestra pista central, presenta un graderio con un aforo de aproximadamente 500 personas, donde podras disfrutar de torneos y exhibiciones, mas excitantes de este deporte.</p>
                    <p>¿Necesitas jugar por la noche?, nuestras pistas disponen de una ilumiación increible muy por encima del mínimo exigido por la reglamentación actual, preparada tanto para nuestras competiciones locales, como para las federativas, profesionales y retransmisiones televisivas.</p>
                    <a href="/precios/#precios2" target="_self" style="font-size: 24px;" class="button vamtam-button accent1  button-filled-small hover-accent1  alignleft"><span class="btext">Ver Precios</span><span class="icon shortcode  " style="color:#ffffff;"></span></a>
                </div>

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://i.pinimg.com/originals/35/a7/4a/35a74a52434d1cd8be1b954176948e99.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://www.elcampanariodelparaiso.com/blog/wp-content/uploads/2016/06/Alojamiento-para-el-Torneo-de-la-Federaci%C3%B3n-Espa%C3%B1ola-de-Padel-en-Nueva-Alcantara-2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.marbellauniqueproperties.com/blog/wp-content/uploads/2016/02/Marbella-ciudad-de-padel-Marbella-Unique-Properties-1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="http://patrociniodeportivo.com/img/uploads/img_proyectos/padel_club_monterrey_2018-06-10-171132_Real-Club-de-Padel-Marbella-10.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="jumbotron jumbotron-fluid p-2">
                    <div class="container pt-2">
                        <div class="d-flex">
                            <h5 class="pr-2">HORARIO DE LA PISTA</h5>
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#666666"><path d="M80.64,7.68v11.52h7.68v4.215c-40.89479,3.87756 -72.96,38.36608 -72.96,80.265c0,44.49076 36.14924,80.64 80.64,80.64c44.49076,0 80.64,-36.14924 80.64,-80.64c0,-41.89892 -32.06521,-76.38744 -72.96,-80.265v-4.215h7.68v-11.52zM154.5075,19.7625l-7.7025,7.7025l17.7225,17.7225l7.7025,-7.7025zM96,30.72c40.34018,0 72.96,32.61982 72.96,72.96c0,40.34018 -32.61982,72.96 -72.96,72.96c-40.34018,0 -72.96,-32.61982 -72.96,-72.96c0,-40.34018 32.61982,-72.96 72.96,-72.96zM57.5625,61.4025c-1.56258,0.00041 -2.96912,0.94754 -3.55711,2.39528c-0.58799,1.44774 -0.24018,3.10738 0.87961,4.19722l33.705,33.705c-0.17585,0.64542 -0.26661,1.31106 -0.27,1.98c0,4.24155 3.43845,7.68 7.68,7.68c0.67112,-0.00028 1.33931,-0.08854 1.9875,-0.2625l6.8175,6.8175c0.96314,1.00316 2.39335,1.40727 3.73904,1.05646c1.3457,-0.35081 2.3966,-1.40171 2.74741,-2.74741c0.35081,-1.3457 -0.05329,-2.77591 -1.05646,-3.73904l-6.825,-6.825c0.17585,-0.64542 0.26661,-1.31106 0.27,-1.98c0,-4.24155 -3.43845,-7.68 -7.68,-7.68c-0.67112,0.00028 -1.33931,0.08854 -1.9875,0.2625l-33.6975,-33.6975c-0.72296,-0.74317 -1.71569,-1.16244 -2.7525,-1.1625z"></path></g></g></svg>
                        </div>
                        @foreach (json_decode($show->businessHours) as $key => $item)
                            <p>
                                @if ($key == 'startTime')
                                    <b class="text-muted font-weight-normal">Comienza:</b> {{ $item }}                                        
                                @else
                                    <b class="text-muted font-weight-normal">Finaliza:</b> {{ $item }}
                                @endif
                            </p>
                        @endforeach
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid p-2">
                    <div class="container pt-2">
                        <h5 class="text-uppercase">Tipo de pista</h5>
                        <p>{{ $show->track_type->name }}</p>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid p-2">
                    <div class="container pt-2">
                        <h5 class="text-uppercase">Tipo de superficie</h5>
                        <p>{{ $show->type_surface->name }}</p>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid p-2">
                    <div class="container pt-2">
                        <h5 class="text-uppercase">Tipo de recinto</h5>
                        <p>{{ $show->enclosure_type->name }}</p>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid p-2">
                    <div class="container pt-2">
                        <h5 class="text-uppercase">Tipo de pared</h5>
                        <p>{{ $show->wall->name }}</p>
                    </div>
                </div>

                <div class="jumbotron jumbotron-fluid p-2">
                    <div class="container pt-2">
                        <h5 class="text-uppercase">Tamaño de la pista</h5>
                        <p>{{ $show->size->name }}</p>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>
@endsection
