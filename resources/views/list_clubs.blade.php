@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="content-info info-home">
        <div class="col-sm-12 mb-5">
            <h1 class="mb-4 c-green text-uppercase">Elige el club deportivo más cercano</h1>
            <p>Selecciona tu club preferido para poder ver las instalaciones deportivas que dispone, la calidad de la instalaciones, pistas... </p>
    
            <p> Como buen jugador sabrás que la calidad de la instalaciones es muy importante ya que puede enriquecer altamente la experiencia deportiva. También hay otros factores importantes a tener en cuenta como la flexibilidad y amplitud de los horarios y el número de ofertas, bonos y descuentos que nos ofresca el club.</p>
    
            <p class="font-weight-lighter c-green">¡Reserva tu pista ya en 3 pasos no esperese más, disfruta al máximo del partido y dalo todo en la pista!</p>
        </div> 

        <div class="main-club">
            @foreach ($clubs as $item)
                <div class="card-club">
                    <div class="card-img">
                        <img src="https://res.cloudinary.com/playtomic/image/upload/c_limit,w_1600/v1/pro/tenants/da7c8c09-43b3-11e8-8674-52540049669c/launion_0001" alt="">
                    </div>
                    <div class="main-step card-info">
                        <p class="txt-left text-capitalize"><a class="link" href="{{ route('club.track', $item['id']) }}">{{ $item['name'] }}</a></p>
                        <p class="txt-right">{{ ($item['address'] != '') ? $item['address'] : 'Sin ubicación' }}</p>
                    </div>
                    <div class="club-open">
                        L M X Y Z
                    </div>
        
                    <div class="main-step card-actions">
                        <div class="txt-left">
                            {{-- Recorremos los club al cual segimos - tabla pivot --}}
                            @foreach ($follows as $key => $value)
                                @if ($item['id'] == $key)
                                    {{-- Si nos sigue mostramos - Me gusta --}}
                                    @if ($value == 1)
                                        <a href="{{ route('home.follow', [$key, $value]) }}"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style="fill:#e4eaeb; padding-top: 11px;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#dc5151"><g id="surface1"><path d="M96,170.1l-2.445,-2.025c-3.84,-3.18 -9,-6.69 -14.955,-10.755c-23.655,-16.14 -59.4,-40.53 -59.4,-79.425c0,-23.895 19.575,-43.335 43.635,-43.335c12.87,0 24.915,5.595 33.165,15.195c8.25,-9.6 20.31,-15.195 33.165,-15.195c24.06,0 43.635,19.44 43.635,43.335c0,38.895 -35.745,63.285 -59.4,79.425c-5.97,4.065 -11.115,7.575 -14.955,10.755z"></path></g></g></g></svg></a>
                                        <p class="mt-2 badge pt-1">Me gusta</p>
                                    @else
                                        <a href="{{ route('home.follow', [$key, $value]) }}"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style="fill:#e4eaeb; padding-top: 11px;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e4eaeb"><g id="surface1"><path d="M138.24,172.8h-72.96c-19.05,0 -34.56,-15.495 -34.56,-34.56v-36.09c0,-7.455 2.175,-14.265 6.48,-20.28l43.02,-59.175c2.685,-4.485 7.215,-7.335 11.94,-7.335c6.375,0 15.36,5.475 15.36,17.67c0,3.48 -0.945,5.82 -1.875,8.085c-0.225,0.54 -0.45,1.095 -0.675,1.695c-1.44,4.035 -9.045,21.225 -13.035,30.15c11.82,0.015 38.01,0.09 47.955,0.39c10.95,0 17.55,7.41 17.55,14.58c0,2.46 -0.405,5.82 -0.75,8.19c3.375,2.01 8.43,6.33 8.43,14.085c0,5.4 -2.595,9.39 -5.085,12c2.535,2.34 5.085,6.015 5.085,11.43c0,7.71 -5.31,12.375 -9.105,14.745c0.75,2.01 1.425,4.71 1.425,7.905c0,6.9 -7.305,16.515 -19.2,16.515z"></path></g></g></g></svg></a>
                                        <p class="mt-2 badge pt-1">Síguenos</p>
                                    @endif {{-- END Follow/Unfollow ICON --}}
                                @endif
                            @endforeach
                        </div> 
                        <div class="txt-right">
                            <a href=""><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="25" height="25"
                            viewBox="0 0 192 192"
                            style="fill:#e4eaeb; padding-top: 11px;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#e4eaeb"><g id="surface1"><path d="M96,7.68c-48.735,0 -88.32,39.585 -88.32,88.32c0,48.735 39.585,88.32 88.32,88.32c48.735,0 88.32,-39.585 88.32,-88.32c0,-48.735 -39.585,-88.32 -88.32,-88.32zM96,15.36c44.58,0 80.64,36.06 80.64,80.64c0,44.58 -36.06,80.64 -80.64,80.64c-44.58,0 -80.64,-36.06 -80.64,-80.64c0,-44.58 36.06,-80.64 80.64,-80.64zM56.88,69.12c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0zM56.88,92.16c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0zM56.88,115.2c-2.115,0.195 -3.675,2.085 -3.48,4.2c0.195,2.115 2.085,3.675 4.2,3.48h76.8c1.38,0.015 2.67,-0.705 3.375,-1.905c0.69,-1.2 0.69,-2.67 0,-3.87c-0.705,-1.2 -1.995,-1.92 -3.375,-1.905h-76.8c-0.12,0 -0.24,0 -0.36,0c-0.12,0 -0.24,0 -0.36,0z"></path></g></g></g></svg></a>
                        </div>                                           
                    </div>
                </div>
            @endforeach
        </div>                    
    </div>
</section>
@endsection