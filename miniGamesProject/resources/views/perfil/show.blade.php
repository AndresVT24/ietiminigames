@extends('base')
@section('title', 'Perfil')

@section('content')

@if ($isPremium)
<style>
  .glowing-border {
    box-shadow: 0 0 10px 4px yellow;
  }
  body{
    background-image: url('/img/premium.jpg') !important;
    background-size: cover;
    background-position: center;
  }
</style>
<body class="bg-gray-800">
  <div class="container mx-auto p-8">
    <div class="flex justify-center">
      <div class="max-w-md w-full bg-white shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
          <div class="flex justify-center">
            <img alt="Foto de perfil" class="w-32 h-32 rounded-full glowing-border" src="https://wallpapers.com/images/high/80s-retro-arcade-geometric-ctans8jmfmi8p0p9.webp">
          </div>
          <center>
              <div class="mt-4">
                <label class="block text-black-700 font-bold mb-2" for="nombre">{{ $user->nick_name }}</label>
              </div>
          </center>
          <div class="mt-4">
            <label class="block text-gray-700 font-bold mb-2" for="nombre">Nombre:</label>
            <span id="nombre" class="text-blue-800">{{ $user->name }}</span>
          </div>
          <div class="mt-4">
            <label class="block text-gray-700 font-bold mb-2" for="apellido">Apellido:</label>
            <span id="apellido" class="text-blue-800">{{ $user->last_name }}</span>
          </div>
          <div class="mt-4">
            <label class="block text-gray-700 font-bold mb-2" for="email">Email:</label>
            <span id="email" class="text-blue-800">{{ $user->email }}</span>
          </div>
          <div class="mt-4">
            <label class="block text-gray-700 font-bold mb-2" for="fecha-creacion">Fecha de Creación:</label>
            <span id="fecha-creacion" class="text-blue-800">{{ $user->created_at }}</span>
          </div>
          <div class="mt-6 bg-yellow-200 rounded-lg p-4">
            <span class="text-yellow-700 font-bold">Usuario Premium</span>
            <p class="text-yellow-800 mt-2">¡Disfruta de beneficios exclusivos!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@else
<!-- Plantilla para usuarios no premium -->
<body class="bg-blue-300">
  <div class="container mx-auto p-8">
    <div class="flex justify-center">
      <div class="max-w-md w-full bg-blue-200 shadow-md rounded-lg overflow-hidden">
        <div class="p-4">
          <div class="flex justify-center">
            <img src="https://img.freepik.com/premium-vector/flat-instagram-icons-notifications_619991-50.jpg" alt="Foto de perfil" class="w-32 h-32 rounded-full">
          </div>
          <center>
            <div class="mt-4">
               <label class="block text-black-700 font-bold mb-2" for="nombre">{{ $user->nick_name }}</label>
            </div>
         </center>
          <div class="mt-4">
            <label class="block text-black-700 font-bold mb-2" for="nombre">Nombre:</label>
            <span id="nombre" class="text-blue-800">{{ $user->name }}</span>
          </div>
          <div class="mt-4">
            <label class="block text-black-700 font-bold mb-2" for="apellido">Apellido:</label>
            <span id="apellido" class="text-blue-800">{{ $user->last_name }}</span>
          </div>
          <div class="mt-4">
            <label class="block text-black-700 font-bold mb-2" for="email">Email:</label>
            <span id="email" class="text-blue-800">{{ $user->email }}</span>
          </div>
          <div class="mt-4">
            <label class="block text-black-700 font-bold mb-2" for="fecha-creacion">Fecha de Creación:</label>
            <span id="fecha-creacion" class="text-blue-800">{{ $user->created_at }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@endif
<script>
    $(document).ready(function () {
      $("#titulo").text("PERFIL")
    });
  </script>
  @endsection
