@extends('layouts.app')

@section('head')
    {{-- Log Out --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="content-info info-home">
        <div class="title-admin p-4 text-uppercase">
            <h2>Datos del usuario {{ $show->username }}</h2>
        </div>

        <div class="main-step">
            <div class="details">
                <div class="alert alert-info" role="alert">El siguiente listado describe la información del usuario</div>
                
                <h3>Detalles</h3>
                <table class="table table-striped my-4">
                    <tbody>
                        <tr>
                            <th scope="row">Nombre del usuario</th>
                            <td>{{ $show->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $show->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Documento de identidad</th>
                            <td>{{ $show->identity_card }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nº de teléfono</th>
                            <td>{{ $show->phone_number }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Fecha de nacimiento</th>
                            <td>{{ $show->birthdate }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Género</th>
                            <td>{{ $show->gender }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nivel</th>
                            <td>{{ $show->level }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Dirección</th>
                            <td>{{ $show->address }}</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                {{-- Fecha actual... --}}
                                <form action="{{ route('reserve.update', $show->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type='submit'>Cancelar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div>
                <h3>Reservas en nuestro club</h3>
                {{-- Auth::user()->club->users --}}
                {{-- Obtenemos las pistas del club --}}
                @foreach (Auth::user()->club->tracks as $item)
                    {{-- Reservas del usuario --}}
                    @foreach ($show->reservations as $reserve)
                        {{-- Muestrame las reservas que ha realizado en el club --}}
                        @if ($reserve->club_track_id == $item->id)
                            <li><a href="{{ route('reserve.show', $reserve->id) }}">{{ $reserve->start }}</a></li>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>

{{--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Información del usuario') }}</div>

                <div class="card-body">
                    <p><b>Usuario</b>: {{ $show->username }}</p>
                    <p><b>Email</b>: {{ $show->email }}</p>
                    <p><b>Nombre Apellido</b>: {{ $show->name }}</p>
                    <p><b>Documento de identidad</b>: {{ $show->identity_card }}</p>
                    <p><b>Número movil</b>: {{ $show->phone_number }}</p>
                    <p><b>Fecha de nacimiento</b>: {{ $show->birthdate }}</p>
                    <p><b>Género</b>: {{ $show->gender }}</p>
                    <p><b>Nivel</b>: {{ $show->level }}</p>
                    <p><b>Dirección</b>: {{ $show->address }}</p>                    
                </div>
            </div>
        </div>
    </div>
</div>{{--}}
@endsection
