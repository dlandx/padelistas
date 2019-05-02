@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestion de pistas</div>

                <h1>CLUB</h1>
                <form action="{{ route('track.create') }}" method="">
                    <button type='submit' name='btn' value=''>Add</button>
                </form>
                
                <div class="card-body">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio 1</th>
                                <th>Precio 2</th>
                                <th>Precio 3</th>
                                <th colspan="3">Gestión</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($tracks as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->price_1 }}</td>
                                    <td>{{ $item->price_2 }}</td>
                                    <td>{{ $item->price_3 }}</td>

                                    <td>
                                        <form action="{{ route('track.show', $item->id) }}" method="">
                                            <button type='submit' name='btn' value='{{ $item->id }}'>show</button>
                                        </form>
                                    </td>   
                                    <td>
                                        <form action="{{ route('track.update', $item->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type='submit' name='btn' value='{{ $item->id }}'>eliminar</button>
                                        </form>
                                    </td>   


                                    <td>
                                        <form action="{{ route('track.edit', $item->id) }}" method="">
                                            <button type='submit' name='btn' value='{{ $item->id }}'>edit</button>
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
