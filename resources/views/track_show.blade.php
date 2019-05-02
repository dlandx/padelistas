@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Pista') }}</div>

                <div class="card-body">
                    <h2>Nombre: {{ $show->name }}</h2>
                    <h2>Descripción: {{ $show->description }}</h2>
                    <h2>Precio 60 min: {{ $show->price_1 }}</h2>
                    <h2>Precio 90 min: {{ $show->price_2 }}</h2>
                    <h2>Precio 120 min: {{ $show->price_3 }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
