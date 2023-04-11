<template>
    <div class="divImagePerfil">
        <img src="https://img.freepik.com/vector-premium/perfil-avatar-hombre-icono-redondo_24640-14044.jpg?w=740" alt="" width="250" height="250">
    </div>
    <div class="divNickPerfil">
        <p class="pNick">AndresVT</p>
    </div>
    <div class="divNamePerfil row">
        <p>Nombre</p>
        <p class="pName row">Andres</p>
    </div>
    <div class="divEmailPerfil row">
        <p>Email</p>
        <p class="pEmail">andres24vt@gmail.com</p>
    </div>
    <div class="divPasswordPerfil row">
        <p>Contraseña</p>
        <p class="pPassword">*********</p>
    </div>
</template>
<script setup>

</script>
<style>
.divInfoPerfil{
    display: grid;
    grid-template-columns: 300px auto;
    grid-template-rows: repeat(1fr, 5);
}

.divInfoPerfil .divImagePerfil{
    grid-column: 1;

}

.divInfoPerfil .row{
    grid-column: 1/span 2;

}

img{
    border: 5px black solid;
    border-radius: 50%;
}

.divInfoPerfil > div>p:nth-child(1){
    font-weight: bolder;
}

.pNick{
    font-size: xx-large;
}

</style>