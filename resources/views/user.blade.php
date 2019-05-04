@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestion de pistas</div>

                <h1>USERS</h1>
                <form action="{{ route('user.create') }}" method="GET">
                    <button type='submit'>Add</button>
                </form>
                
                <div class="card-body">
                    <table border="1">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Nombre completo</th>
                                <th>Documento de identidad</th>
                                <th>Número movil</th>
                                <th>Fecha de nacimiento</th>
                                <th>Género</th>
                                <th>Nivel</th>
                                <th>Dirección</th>
                                <th></th>
                                <th colspan="3">Gestión</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->identity_card }}</td>
                                    <td>{{ $item->phone_number }}</td>
                                    <td>{{ $item->birthdate }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <form action="{{ route('user.show', $item->id) }}" method="GET">
                                            <button type='submit' value='{{ $item->id }}'>show</button>
                                        </form>
                                    </td>   
                                    <td>
                                        <form action="{{ route('user.update', $item->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type='submit' value='{{ $item->id }}'>eliminar</button>
                                        </form>
                                    </td>   
                                    <td>
                                        <form action="{{ route('user.edit', $item->id) }}" method="GET">
                                            <button type='submit' value='{{ $item->id }}'>edit</button>
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
