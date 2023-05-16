<template>
  <div id="container-header">
    <img id="logoHeader" src="../img/logo_ieti.png" alt="Logo de la pagina">
    <h1 id="tituloHeader"></h1>
    <a href="/perfil">
      <img id="logoUsuario" src="../img/user-logo.jpg" alt="Foto del usuario">
    </a>

  </div>
</template>
  

<script setup>
 
 $(document).ready(function(){
  $('#tituloHeader').text(pagina)
 })

</script>
<style>
*{
  margin: 0;
  padding: 0;
}
#container-header{
  display: grid;
  grid-template-columns: 200px 1fr 200px;
  grid-template-rows: 100px;
  background-color: #1C8E8A;
  text-align: center;
}
#tituloHeader{
  grid-row: 1/2;
  grid-column: 2/3;
  justify-self: center;
  align-self: center;
}
#logoHeader{
  grid-row: 1/2;
  grid-column: 1/2;
  height: 100%;
  justify-self: center;
  margin-top: -7px;
}

#logoUsuario{
  grid-row: 1/2;
  grid-column: 3/4;
  height: 100%;
  border-radius: 100%;
  padding: 10px;
  box-sizing: border-box;
}

#tituloHeader{
  grid-row: 1/2;
  grid-column: 2/3;
  font-size: 28px;
}

</style>