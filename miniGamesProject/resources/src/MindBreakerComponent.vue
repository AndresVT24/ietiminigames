<template>
    <p id="tiempo-restante">Tiempo: </p>
    <p id="puntuacion-actual">Puntos: 0</p>
    <p id="enunciado">Porfavor, clica en el </p>
    <div id="resultado1"></div>
    <div id="resultado2"></div>
</template>
<style>
* {
    margin: 0;
    padding: 0;
}
#puntuacion-actual{
    font-size:calc(0.6em + 1vw) !important;
    grid-row: 1;
    grid-column: 4/5;
}
#tiempo-restante{
    grid-row: 2;
    grid-column: 2/4;
    font-family: 'Orbitron', sans-serif;
    font-size:calc(1.6em + 1vw) !important;
    font-weight: bolder;
}
#game2{
    height: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-rows: 5% 15% 15% 55%;
    column-gap: 50px;
    row-gap: 30px;
    padding: 30px;
    box-sizing: border-box;
    background-color: antiquewhite;
}

#enunciado{
    font-size:calc(0.5em + 1vw);
    text-align: center;
    grid-row: 3;
    grid-column: 1/5;
}
#resultado1{
    grid-row: 4;
    grid-column: 2;
}
#resultado2{
    grid-row: 4;
    grid-column: 3;
}

#game2 button{
    border-radius: 10px;
    height: 50px;
    width: 100%;
    font-size: 28px;
    font-weight: bolder;
    border: 3px solid black;
    cursor: pointer;
}

#game2 p{
    text-align: center;
    font-size: 40px;
    font-weight: bolder;
    cursor: pointer;
}
</style>
<script setup>
$(document).ready(function(){

    var puntos = 0;

    var tiempo = 30;

    var variablesColores = [{
        "Rojo":"red",
        "Azul":"blue",
        "Marron":"brown",
        "Verde":"green",
        "Negro":"black",
        "Blanco":"white",
        "Amarillo":"yellow",
        "Morado":"purple"
    }]
        
    var variablesOpciones = [{
        1:"botón con texto:",
        2:"botón de color:",
        3:"texto:",
        4:"texto de color:"
    }]

    function generarOpcionesAleatorias(){

        $('#enunciado').empty();
        $('#resultado1').empty();
        $('#resultado2').empty();

        $('#enunciado').text('Por favor, haz clic en ')

        let numeroOpcion = Math.floor(Math.random() * Object.keys(variablesOpciones[0]).length);
        let opcionAleatoria = variablesOpciones[0][Object.keys(variablesOpciones[0])[numeroOpcion]];

        let numeroColor = Math.floor(Math.random() * Object.keys(variablesColores[0]).length);
        let nuevoNumeroColor = Math.floor(Math.random() * Object.keys(variablesColores[0]).length);
        let nuevoNumeroColor2 = Math.floor(Math.random() * Object.keys(variablesColores[0]).length);

        while(numeroColor == nuevoNumeroColor || numeroColor == nuevoNumeroColor2 || nuevoNumeroColor == nuevoNumeroColor2){
            numeroColor = Math.floor(Math.random() * Object.keys(variablesColores[0]).length);
            nuevoNumeroColor = Math.floor(Math.random() * Object.keys(variablesColores[0]).length);
            nuevoNumeroColor2 = Math.floor(Math.random() * Object.keys(variablesColores[0]).length);
        }

        let colorAleatorio = Object.keys(variablesColores[0])[numeroColor];
        let nuevoColorAleatorio = Object.keys(variablesColores[0])[nuevoNumeroColor];
        let nuevoColorAleatorio2 = Object.keys(variablesColores[0])[nuevoNumeroColor2];

        let tipoOpcionIncorrecta =  Math.floor(Math.random() * 2);

        if(numeroOpcion == 0){
            var opcionCorrecta = $('<button>',{
                text:colorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio],
                    'background-color': variablesColores[0][nuevoColorAleatorio2],
                }
            })

            if(tipoOpcionIncorrecta == 0){
                var opcionIncorrecta = $('<button>',{
                text:nuevoColorAleatorio,
                css: {
                    'color':variablesColores[0][colorAleatorio],
                    'background-color': variablesColores[0][nuevoColorAleatorio2],
                    }
                })
            }else{
                var opcionIncorrecta = $('<button>',{
                text:nuevoColorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio2],
                    'background-color': variablesColores[0][colorAleatorio],
                    }
                })
            }

        }else if(numeroOpcion == 1){
            var opcionCorrecta = $('<button>',{
                text:nuevoColorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio],
                    'background-color': variablesColores[0][colorAleatorio],
                }
            })

            if(tipoOpcionIncorrecta == 0){
                var opcionIncorrecta = $('<button>',{
                text:colorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio],
                    'background-color': variablesColores[0][nuevoColorAleatorio2],
                    }
                })
            }else{
                var opcionIncorrecta = $('<button>',{
                text:nuevoColorAleatorio,
                css: {
                    'color':variablesColores[0][colorAleatorio],
                    'background-color': variablesColores[0][nuevoColorAleatorio2],
                    }
                })
            }

        }else if(numeroOpcion == 2){
            let is_button =  Math.floor(Math.random() * 2);
            if(is_button){
                var opcionCorrecta = $('<button>',{
                text:colorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio],
                    'background-color': variablesColores[0][nuevoColorAleatorio2],
                }
            })
            
            if(tipoOpcionIncorrecta == 0){
                var opcionIncorrecta = $('<button>',{
                text:nuevoColorAleatorio,
                css: {
                    'color':variablesColores[0][colorAleatorio],
                    'background-color': variablesColores[0][nuevoColorAleatorio2],
                    }
                })
            }else{
                var opcionIncorrecta = $('<button>',{
                text:nuevoColorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio2],
                    'background-color': variablesColores[0][colorAleatorio],
                    }
                })
            }
        
        }else{
                var opcionCorrecta = $('<p>',{
                text:colorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio],
                    }
                })
                var opcionIncorrecta = $('<p>',{
                    text:nuevoColorAleatorio,
                    css: {
                        'color':variablesColores[0][colorAleatorio],
                        }
                    })
            }
            
        }else if(numeroOpcion == 3){
            let is_button =  Math.floor(Math.random() * 2);
            if(is_button){
                var opcionCorrecta = $('<button>',{
                text:nuevoColorAleatorio,
                css: {
                    'color':variablesColores[0][colorAleatorio],
                    'background-color': variablesColores[0][nuevoColorAleatorio2],
                }
            })

            if(tipoOpcionIncorrecta == 0){
                var opcionIncorrecta = $('<button>',{
                text:colorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio],
                    'background-color': variablesColores[0][nuevoColorAleatorio2],
                    }
                })
            }else{
                var opcionIncorrecta = $('<button>',{
                text:nuevoColorAleatorio,
                css: {
                    'color':variablesColores[0][nuevoColorAleatorio2],
                    'background-color': variablesColores[0][colorAleatorio],
                    }
                })
            }

            }else{
                var opcionCorrecta = $('<p>',{
                text:nuevoColorAleatorio2,
                css: {
                    'color':variablesColores[0][colorAleatorio],
                }
                })
                var opcionIncorrecta = $('<p>',{
                    text:colorAleatorio,
                    css: {
                        'color':variablesColores[0][nuevoColorAleatorio],
                    }
                })
            }
        }

        let colocarOpciones =  Math.floor(Math.random() * 2);
            $(opcionIncorrecta).on('click', perderRonda)
            $(opcionCorrecta).on('click', ganarRonda)
        if(colocarOpciones == 0){
            $('#resultado2').append(opcionIncorrecta)
            $('#resultado1').append(opcionCorrecta)
        }else{
            $('#resultado2').append(opcionCorrecta)
            $('#resultado1').append(opcionIncorrecta)
        }
        
        $('#enunciado').append(opcionAleatoria +" ");
        $('#enunciado').append(colorAleatorio); 
    }

    let interval = setInterval(cuentaRegresiva, 1000);

    generarOpcionesAleatorias()

    function ganarRonda(){
        puntos += 20;
        agregarTiempo(2);
        console.log("puntos = "+puntos);
        generarOpcionesAleatorias();
        const puntosActuales = document.getElementById('puntuacion-actual');
        puntosActuales.innerHTML = "Puntos: "+puntos;
    }

    function perderRonda(){
        puntos -= 25    ;
        agregarTiempo(-5);
        console.log("puntos = "+puntos);
        generarOpcionesAleatorias();
        const puntosActuales = document.getElementById('puntuacion-actual');
        puntosActuales.innerHTML = "Puntos: "+puntos;
    }

    function cuentaRegresiva() {
        const tiempoRestante = document.getElementById('tiempo-restante');
        tiempoRestante.innerHTML = "Tiempo: "+tiempo;

        if (tiempo < 0) {
            clearInterval(interval);
            tiempoRestante.innerHTML = "Tiempo: 0";
            if(puntos < 0){
                puntos = 0;
            }
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
                        lose_game();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            document.getElementById('puntuacion-final').innerHTML += puntos;
        } else {
            tiempo--;
        }
    }

    function agregarTiempo(segundos) {
        tiempo += segundos;
    }
},
)
</script>
