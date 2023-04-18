<template>
    <div id="container-memory">
        <div id="green" class="circle"></div>
        <div id="red" class="circle"></div>
        <div id="blue" class="circle"></div>
        <div id="yellow" class="circle"></div>
    </div>
</template>
    
  
<script setup>
window.addEventListener('DOMContentLoaded', function () {
    const red = document.querySelector('#red');
    const blue = document.querySelector('#blue');
    const yellow = document.querySelector('#yellow');
    const green = document.querySelector('#green');
    var puntos = 0;
    let arrayClicksUsuario = []
    let turnoMaquinaActivo = false;

    function addEffect(element) {
        element.classList.add('effect');
        setTimeout(function () {
            element.classList.remove('effect');
        }, 1000); // Remueve la clase después de 1s
    }

    red.addEventListener('click', function () {
        if (!turnoMaquinaActivo) {
            addEffect(this);
            arrayClicksUsuario.push(1)
            console.log(arrayClicksUsuario)
            verificarSecuencia();
        }
    });

    blue.addEventListener('click', function () {
        if (!turnoMaquinaActivo) {
            addEffect(this);
            arrayClicksUsuario.push(2)
            console.log(arrayClicksUsuario)
            verificarSecuencia();
        }
    });

    yellow.addEventListener('click', function () {
        if (!turnoMaquinaActivo) {
            addEffect(this);
            arrayClicksUsuario.push(3)
            console.log(arrayClicksUsuario)
            verificarSecuencia();
        }
    });

    green.addEventListener('click', function () {
        if (!turnoMaquinaActivo) {
            addEffect(this);
            arrayClicksUsuario.push(4)
            console.log(arrayClicksUsuario)
            verificarSecuencia();
        }
    });

    // Repite esto para los otros manejadores de eventos 'click'

    function turnoMaquina(arrayNumeros) {
        // Desactiva los clicks del usuario durante el turno de la máquina
        turnoMaquinaActivo = true;

        arrayNumeros.push(Math.floor(Math.random() * 4) + 1);
        let i = 0;
        function encenderSiguienteCirculo() {
            if (i < arrayNumeros.length) {
                console.log(arrayNumeros[i])

                const numero = arrayNumeros[i];
                if (numero === 1) {
                    addEffect(red);
                } else if (numero === 2) {
                    addEffect(blue);
                } else if (numero === 3) {
                    addEffect(yellow);
                } else if (numero === 4) {
                    addEffect(green);
                }
                i++;
                setTimeout(encenderSiguienteCirculo, 2000); // Llamamos la función recursivamente después de 2s
            }
        }
        setTimeout(function () {
            encenderSiguienteCirculo();
        }, 2000);

        // Reactiva los clicks del usuario después de que termine el turno de la máquina
        setTimeout(function () {
            turnoMaquinaActivo = false;
        }, 2000*arrayNumeros.length);
        
    }

    let arrayNumeros = []


    turnoMaquina(arrayNumeros)
    
    function verificarSecuencia() {
        for (let i = 0; i < arrayClicksUsuario.length; i++) {
            if (arrayClicksUsuario[i] !== arrayNumeros[i]) {
                // Si los elementos no son iguales, el usuario se equivocó
                $.ajax({
                url: '/save-points',
                type: 'POST',
                data: {
                    // Aquí puedes pasar los datos que deseas guardar en la base de datos
                    puntuacion: puntos,
                    _token: window.csrfToken // Agrega el token CSRF aquí
                },
                success: function(response) {
                    console.log('Los datos se han guardado correctamente');
                    window.location.href = '/ranking/Memory';
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
            }
        }

        puntos += arrayNumeros.length * 10 + 1 // Sumamos puntuacion al hacer bien la secuencia

        // Si llegamos hasta aquí, los arrays son iguales
        if (arrayClicksUsuario.length === arrayNumeros.length) {
            console.log(puntos)
            // Reiniciamos el array de clicks del usuario para comenzar un nuevo nivel
            arrayClicksUsuario = [];
            // Iniciamos un nuevo turno de la máquina
            turnoMaquina(arrayNumeros);
        }
    }

});


</script>
<style>
* {
    margin: 0;
    padding: 0;
}

#container-memory {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
    grid-template-rows: 100%;
    align-items: center;
    justify-items: center;
    height: 100%;
    background-color: antiquewhite;
}

.circle {
    width: 150px;
    height: 150px;
    border-radius: 100%;
    border: 5px ridge black;
    justify-self: center;
    align-self: center;
}

.effect {
    background-color: rgb(255, 255, 0);
    box-shadow: 0 0 60px rgb(255, 0, 76);
}

#red {
    grid-row: 1;
    grid-column: 2;
    background-color: red;
}

#blue {
    grid-row: 1;
    grid-column: 4;
    background-color: blue;
}

#yellow {
    grid-row: 1;
    grid-column: 6;
    background-color: yellow;
}

#green {
    grid-row: 1;
    grid-column: 8;
    background-color: green;
}
</style>