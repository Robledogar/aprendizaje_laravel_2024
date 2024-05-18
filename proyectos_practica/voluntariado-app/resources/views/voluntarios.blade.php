@extends('layouts.app') 
@section('title') Voluntarios
@endsection
<script src="https://cdn.tailwindcss.com"></script>


@section('content') 
<div class="imagenFondo p-10">

    <h1 class="text-center text-3xl">Nuestros voluntarios</h1>

    @foreach ($inscritos as $inscrito)
        <div class="m-4">
            <h2 class="text-center text-xl">{{ $inscrito->nombre }}</h2>
            <p class="text-center">{{ $inscrito->email}}</p>
        </div>

    
    @endforeach


</div>  


@endsection