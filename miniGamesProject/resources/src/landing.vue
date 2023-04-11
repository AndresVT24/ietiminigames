<template>
    <div id="buttonEntrar">
            <a href="/login">JUGAR</a>
    </div>
</template>

<script setup>
</script>

<style>
    #buttonEntrar{
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position:relative;
    }
    #buttonEntrar a{
        color: white;
        font-family:Helvetica, sans-serif;
        font-weight:bold;
        font-size:36px;
        text-align: center;
        text-decoration:none;
        background-color:#3400ac;
        display:block;
        position:relative;
        padding:20px 40px;

        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        text-shadow: 0px 1px 0px #000;
        filter: dropshadow(color=#000, offx=0px, offy=1px);

        -webkit-box-shadow:inset 0 1px 0 #fff, 0 10px 0 #12003b;
        -moz-box-shadow:inset 0 1px 0 #fff, 0 10px 0 #12003b;
        box-shadow:inset 0 1px 0 #fff, 0 10px 0 #12003b;

        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    #buttonEntrar a:active{
        top:10px;
        background-color:#3400ac;

        -webkit-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #070018;
        -moz-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #070018;
        box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #070018;
    }
</style>