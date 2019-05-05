@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ADMIN Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <b>Admin</b>
                    
                    <div>
                        <a href="{{ route('track.index') }}">Gestionar Pistas</a>
                    </div>
                    <div>
                        <a href="{{ route('user.index') }}">Gestionar Usuarios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
