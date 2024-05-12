@extends('layouts.app') @section('title') Inscríbete
@endsection

@section('content') 

<h1>¡Únete a nuestro equipo de voluntarios!</h1>
    <p>Completa el siguiente formulario para registrarte como voluntario y recibir información sobre las oportunidades disponibles.</p>

    <form action="{{ route('inscribirse.store') }}" method="POST"> 
        @csrf

        <div class="grupo-formulario">
            <label for="nombre">Nombre completo:</label>
            <input type="text" id="nombre" name="nombre" class="control-formulario" required>
        </div>

        <div class="grupo-formulario">
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" class="control-formulario" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar formulario</button>
    </form>


    
@endsection


