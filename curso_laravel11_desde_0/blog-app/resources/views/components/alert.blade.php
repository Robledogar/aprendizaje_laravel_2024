@props(['type' => 'info']) 

{{-- Se pueden pasar atributos desde la vista a través de {{ $attributes }} --}}

@php
  switch ($type) {
    case 'info':
      $class = 'text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
      break;

    case 'danger':
      $class = 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400';
      break;

    case 'success':
      $class = 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400';
      break;

    case 'warning':
      $class = 'text-yellow-800 bg-yellow-50 dark:bg-gray-800 dark:text-yellow-400';
      break;

    case 'dark':
      $class = 'text-gray-800 bg-gray-50 dark:bg-gray-800 dark:text-gray-400'; // Clases de color corregidas
      break;

    default:
      $class = 'text-gray-700 bg-gray-200'; // Establece una clase predeterminada para tipos inesperados
      // Alternativamente, puedes mostrar un mensaje de error aquí
      // $class = ''; // Elimina la clase o muestra un mensaje de error
      break;
  }
@endphp

<div  {{ $attributes -> merge(['class' => 'p-4 text-sm rounded-lg' . $class]) }} role="alert">
  <span class="font-medium">{{ $otraVariable ?? 'Alerta Informativa' }}</span> {{ $slot }}
</div>
