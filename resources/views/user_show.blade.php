@extends('layouts.app')

@section('content')
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
</div>
@endsection
