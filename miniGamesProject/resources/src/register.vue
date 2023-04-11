<template>
    <form id="formRegister" action="">
        <p>REGISTRO</p>
        <hr>
        <div class="divDadesForm">
            <div class="labelInput">
                <p>NOMBRE: </p>
                <input type="text" placeholder="NOMBRE">
            </div>
            <div class="labelInput">
                <p>ALIAS / NICKNAME: </p>
                <input type="text" placeholder="ALIAS / NICKNAME">
            </div>
            <div class="labelInput1 row">
                <p>CORREO ELECTRONICO: </p>
                <input type="text" placeholder="CORREO ELECTRONICO">
            </div>
            <div class="labelInput2 row">
                <p>CONTRASEÑA:</p>
                <input type="password">
            </div>
            <div class="labelInput3 row">
                <p>CONTRASEÑA OTRA VEZ:</p>
                <input type="password">
            </div>
        </div>
        <button type="submit" class="buttonRegister">REGISTRARSE</button>
        <hr>
        <p class="pRegister" >¿Tienes una cuenta?</p>
        <button class="buttonLogin" >LOGIN</button>
    </form>
</template>

<script setup>
    $(document).ready(function (){
        $(".buttonLogin").click(function() {
            event.preventDefault();
            window.location.href = '../login';
        });
    })
</script>
<style>
    #formRegister{
        width: auto;
        color: white;
        background-color: #000;
        padding: 0 10px 30px 10px;
        border: 1px black solid;
        border-radius: 10px;
        flex-direction: column;
    }

    #formRegister .divDadesForm{
        width: 30vw;
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr 1fr 1fr;
        grid-gap: 5px;
    }

    .divDadesForm .row{
        grid-column: 1 /span 2;
    }

    .divDadesForm .row input{
        width: 100%;
    }

    .labelInput1{
        grid-row: 2;
    }

    .pRegister{
        text-align: center;
    }

    .buttonLogin, .buttonRegister{
        padding: 5px 20px 5px 20px;
        display: block;
        margin: 0 auto;
    }

    .buttonRegister{
        margin: 20px auto 20px auto;
    }
</style>