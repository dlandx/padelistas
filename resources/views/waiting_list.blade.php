@extends('layouts.app')

@section('head')
    {{-- Log Out --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="content-info info-home">
        <div class="main-step">
            <div class="details">
                {{-- Datos del club --}}
                <h2>{{ $club_tracks->club->name }}</h2>
                <h4>{{ $club_tracks->title }}</h4>
                <p>{{ $club_tracks->club->phone_number }}</p>
                {{-- Datos de la reserva --}}
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Tipo</th>
                            <td>{{ $club_tracks->track_type->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tamaño</th>
                            <td>{{ $club_tracks->size->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Empieza</th>
                            <td>{{ $show_list->start }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Finaliza</th>
                            <td>{{ $show_list->end }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Duración</th>
                            <td>{{ $show_list->duration }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Precio</th>
                            <td>{{ $show_list->price }} €</td>
                        </tr>
                        <tr>
                            <th scope="row">Jugadores máximos</th>
                            <td>{{ $show_list->players }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Jugadores a buscar</th>
                            <td>{{ $show_list->search_players }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nº de Jugadores</th>
                            <td>{{ count($show_list->users) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="user-list">
                <h4>Jugadores:</h4>
                <div>
                    @foreach ($show_list->users as $item)
                        <img src="" alt="">
                        <p>{{ $item->username }}</p>
                        <p>{{$item->pivot->status}}</p>
                    @endforeach
                </div>                       
            </div>
        </div>
    </div>
</section>
@endsection
