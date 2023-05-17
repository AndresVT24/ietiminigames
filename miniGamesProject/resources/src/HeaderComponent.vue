<template>
  <div id="container-header">
    <!-- <a href="/perfil">
      <img id="logoUsuario" src="../img/user-logo.jpg" alt="Foto del usuario">
    </a> -->

    <a href="/home"><img id="logoHeader" src="../img/logo_ieti.png" alt=""></a>
    <h1 id="tituloHeader"></h1>
    <div id="userInfo">
      <img id="logoUsuario" src="../img/user-logo.jpg" alt="">
      <h2 id="userName"></h2>
    </div>
    <div id="lastRow">
      <a id="profileLink" class="navHeader" style="display: none;" href="/perfil">Perfil</a>
      <a id="adminLink" class="navHeader" style="display: none;" href="/admin">Admin</a>
      <a id="logoutLink" class="navHeader" style="display: none;">Salir</a>
    </div>
  </div>
</template>
  

<script setup>
$(document).ready(function(){
  var navItems = document.querySelectorAll(".navHeader");
    userInfo.addEventListener("click", function() {
    navItems.forEach(element => {
      if(element.style.display == "grid"){
        element.style.display = "none";
      }else{
        element.style.display = "grid";
      }
    });
    if(rol != '2'){
      $('#logoutLink').css('grid-row','2')
      console.log(rol)
      $('#adminLink').css('display','none')
    }
  });

  $('#logoutLink').click(function(e) {
    e.preventDefault();
    axios.post('/logout').then(response => {
        window.location.href = '/';
    }).catch(error => {
        console.log(error);
    });
  });

  $('#tituloHeader').text(pagina);
  var usuario = localStorage.getItem("usuario");
  var rol = localStorage.getItem("rol");
  $('#userName').text(usuario);
  
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
  grid-template-rows: 100px 120px;
  background-color: #1C8E8A;
  text-align: center;
  z-index: 1;
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

#lastRow{
  background-color: #6CC4F5;
  grid-column: 1/4;
  display: grid;
  grid-template-columns: 1fr 200px;
  grid-template-rows: 40px 40px 40px;
}

#userInfo{
  grid-row: 1/2;
  grid-column: 3/4;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  height: 100%;
  width: 100%;
  text-align: start;
  box-sizing: border-box;
  text-align: center;
  cursor: pointer;
}

#logoUsuario{
  grid-row: 1;
  grid-column: 1;
  height: 72px;
  border-radius: 100%;
  padding: 10px;
  box-sizing: border-box;
}

#userName{
  grid-row: 2;
  grid-column: 1;
  width: 200px;
}

#tituloHeader{
  grid-row: 1/2;
  grid-column: 2/3;
  font-size: 28px;
}
#profileLink{
  display: none;
  justify-self: center;
  width: 68%;
  height: 17px;
  grid-column: 2;
  grid-row: 1;
}
.navHeader{
  text-decoration: none;
  display: none;
  padding: 10px;
  background-color: #ffffff3a;
  border: 2px solid rgba(255, 255, 255, 0.301);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.212);
  z-index: 1;
  color: black;
  cursor: pointer;
  width: 68%;
  height: 17px;
  justify-self: center;
}

#logoutLink {
  grid-column: 2;
  grid-row: 3;
  border-radius: 0 0 5px 5px;
}

#adminLink{
  grid-column: 2;
  grid-row: 2;
  border-radius: 0;
}

#logoutLink::before {
  display: grid;
  grid-column: 3/4;
  top: -10px;
  left: 50%;
  width: 20px;
  height: 20px;
  background-color: #fff;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

</style>