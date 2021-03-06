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

                <form action="{{ route('track.edit', $show->id) }}" method="" class="text-center my-4">
                    <button type="submit" class="btn btn-outline-warning btn-lg"  value='{{ $show->id }}'>Actualizar pista</button>
                </form>

                <div>
                    <div class="alert alert-danger" role="alert"><b>Importante!!!</b> añada los precios que va a tener la pista por la horas usada...</div>
                    <a href="#" data-toggle="modal" data-target="#rates" class="center">
                        <button type="submit" class="btn btn-outline-success btn-lg"  value='{{ $show->id }}'>Añadir precios a la pista</button>
                    </a>
                </div>
                
                {{-- Ventana modal para el club --}}
                <div class="modal fade" id="rates" tabindex="-1" role="dialog" aria-labelledby="ratesModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ratesModalLabel">{{ __('Precio para la pista') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
            
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="track_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Precios actuales') }}</label>     
                                    <div class="col-md-6">         
                                        <select name="track_type_id" class="form-control">
                                            @foreach ($show->rates as $item)
                                                <option value="{{ $item->id }}" >{{ $item->duration }} - {{ $item->price }}€</option>
                                            @endforeach                                
                                        </select>
                                    </div>  
                                </div>

                                <form method="POST" action="{{ route('rate.store') }}">
                                    @csrf            
                                    <div class="form-group row">
                                        <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duración') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="duration" type="time" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" value="{{ old('duration') }}" required autofocus>
            
                                            @if ($errors->has('duration'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('duration') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus placeholder="Precio 00.00">
            
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
                                    <input type="hidden" name="club_track_id" value="{{ $show->id }}">

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" id="signUp" class="btn btn-outline-dark">
                                                {{ __('Registrar precio') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
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
