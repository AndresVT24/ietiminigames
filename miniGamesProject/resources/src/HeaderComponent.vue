<template>
  <div class="container mx-auto flex items-center justify-between px-4">
      <div class="flex items-center">
        <a href="/home">
          <img src="../img/logo_ieti.png" alt="Logo y Redirección a Menu Principal" class="w-20 h-20">
        </a>
        <h1 class="ml-2 text-2xl font-bold" id="titulo"></h1>
      </div>
      <div class="relative">
        <div class="flex items-center cursor-pointer dropdown-container">
          <span class="ml-2 font-medium mr-3" id="nickUser"></span>
          <img src="ruta/a/la/foto-de-usuario.jpg" alt="Foto de usuario" class="w-20 h-20 rounded-full imgUser">
        </div>
        <div class="absolute right-0 mt-2 bg-white text-gray-800 rounded-lg shadow-md p-2 dropdown-menu">
          <div class="mb-2">
            <a href="/home" class="block px-4 py-2 hover:bg-blue-100 rounded">Menú Principal</a>
          </div>
          <div class="mb-2">
            <a href="/perfil" class="block px-4 py-2 hover:bg-blue-100 rounded">Perfil</a>
          </div>
          <div>
            <a href="/logout" class="block px-4 py-2 hover:bg-blue-100 rounded" id="logoutLink">Cerrar sesión</a>
          </div>
        </div>
      </div>
    </div>
</template>

<script setup>
$(document).ready(function(){
  $(".dropdown-menu").toggle()

  $('.dropdown-container').click(function (event) {
    $(".dropdown-menu").toggle()
    
  });

  $('#logoutLink').click(function(e) {
    e.preventDefault();
    axios.post('/logout').then(response => {
        window.location.href = '/';
    }).catch(error => {
        console.log(error);
    });
  });

  $(document).click(function (event) {
      if (!$(event.target).closest('.dropdown-container').length) {
        $('.dropdown-container').removeClass('open');
      }
    });
})
</script>