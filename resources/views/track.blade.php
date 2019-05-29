@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestion de pistas</div>

                <h1>CLUB</h1>
                <form action="{{ route('track.create') }}" method="">
                    <button type='submit'>Add</button>
                </form>
                
                <div class="card-body">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Nombre pista</th>
                                <th>Tipo de pista</th>
                                <th>Cerramiento</th>
                                <th>Tipo de pared</th>
                                <th>Tamaño</th>
                                <th colspan="3">Gestión</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tracks as $item)
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>
                                        @foreach ($types as $value)
                                            {{ ($value->id === $item->track_type_id ) ? $value->name : "" }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($enclosures as $value)
                                            {{ ($value->id === $item->enclosure_type_id ) ? $value->name : "" }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($walls as $value)
                                            {{ ($value->id === $item->wall_id ) ? $value->name : "" }}
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($sizes as $value)
                                            {{ ($value->id === $item->size_id ) ? $value->name : "" }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('track.show', $item->id) }}" method="">
                                            <button type='submit' value='{{ $item->id }}'>show</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('track.edit', $item->id) }}" method="">
                                            <button type='submit' value='{{ $item->id }}'>edit</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('track.update', $item->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type='submit' value='{{ $item->id }}'>eliminar</button>
                                        </form>
                                    </td>                                     
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
