@extends('layouts.app')

@section('head')
    {{-- Log Out --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="content-info info-home">
        <div class="main-step">
            <div><img src="" alt=""></div>
            <div class="details">
                {{-- Nombre del club que tiene la pista --}}
                <h2>{{ $club_tracks->club->name }}</h2>
                <h4>{{ $club_tracks->club->address }}</h4>
                <p>{{ $club_tracks->club->phone_number }}</p>

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Pista</th>
                            <td>{{ $club_tracks->title }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tipo</th>
                            <td>{{ $club_tracks->track_type->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tamaño</th>
                            <td>{{ $club_tracks->size->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Estado</th>
                            <td>
                                @foreach ($show->users as $item)
                                    @if ($item->pivot->user_id == Auth::user()->id)
                                        {{ ($item->pivot->status == 2) ? 'Pendiente' : (($item->pivot->status == 1) ? 'Confirmado' : 'Cancelado') }}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Día</th>
                            <td>{{ $show->start }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Duración</th>
                            <td>{{ $show->duration }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Precio</th>
                            <td>{{ $show->price }} €</td>
                        </tr>
                        <tr>
                            <th scope="row">Nº de jugadores</th>
                            <td>{{ count($show->users) }}</td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>
                                {{-- Fecha actual... --}}
                                <form action="{{ route('reserve.update', $show->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type='submit' {{ $disabled }}>Cancelar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

                
                <div>
                    <h4>Jugadores:</h4>
                    <ul>
                        @foreach ($show->users as $item)
                            <li>{{ $item->username }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
