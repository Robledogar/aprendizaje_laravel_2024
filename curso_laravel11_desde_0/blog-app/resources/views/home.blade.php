@extends('layouts.app');


{{-- @section('tittle')
   Titulo yield
@endsection --}}

@section('tittle', 'Titulo Yield')

@push('css')
    <style>
        body {
            background-color: yellow;
        }
    </style>
    
@endpush

@section('content')
    <div class="max-w-4xl mx-auto px-4">
        {{-- <h1>Bienvenido a la página principal</h1> --}}
   
        <x-alert2 type="danger" class="mb-4">
            <x-slot name="otraVariable">
                Alertaaaaa!
            </x-slot>
            Contenido de la alerta
        </x-alert2>
        <p>Hola mundo</p>



        {{-- Esto no pertenece al curso (añadí el componente card para practicar) --}}
        <x-card>
            Este es el primer titulo

            <x-slot name="miVariable">
                Este sería el subtítulo
            </x-slot>

            <x-slot name="otraVariableMas">
                Este sería el segundo título
            </x-slot>
        </x-card>
     </div>




@endsection


  
  

