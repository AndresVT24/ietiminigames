<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>LANDING</title>
        <link rel="stylesheet" href="..\css\app.css">
        <script src="https://cdn.jsdelivr.net/npm/typewriter-effect@2.17.0/dist/core.js"></script>
        <style>
        *{
            text-align:center;
        }
        #cardLanding{
            height:40vh;
            width:50%;
            padding:20px;
            margin:0 auto;
            margin-top:20vh;
            display:grid;
            grid-template-rows:35% 25% 40%;
        }

        #cardLanding #titleLanding{
            background-color:white;
            width:100%;
            padding:20px;
            border-radius:10px 10px 0px 0px;
            margin:0 auto;
            font-size: calc(0.7em + 1vw);
        }
        #cardLanding h4{
            background-color:rgba(255,255,255,0.5);
            margin:0;
            padding:20px;
            font-size: calc(0.3em + 1vw);
        }
        #cardLanding #buttonEntrar{
            background-color:rgba(255,255,255,0.5);
            margin:0;
            border-radius:0px 0px 10px 10px;
            padding:10px;
        }
        #cardLanding #buttonEntrar a{
            color: white;
            font-family:Helvetica, sans-serif;
            font-weight:bold;
            font-size:calc(1.2em + 1vw);
            text-align: center;
            text-decoration:none;
            background-color:#1C8E8A;
            display:block;
            position:relative;
            padding:20px;
            max-width: 330px;
            margin:0 auto;

            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            text-shadow: 0px 1px 0px #000;
            filter: dropshadow(color=#000, offx=0px, offy=1px);

            -webkit-box-shadow:inset 0 1px 0 #fff, 0 10px 0 #034745;
            -moz-box-shadow:inset 0 1px 0 #fff, 0 10px 0 #034745;
            box-shadow:inset 0 1px 0 #fff, 0 10px 0 #034745;

            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
        }

        #cardLanding #buttonEntrar a:active{
            top:10px;
            background-color:#034745;

            -webkit-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #013130;
            -moz-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #013130;
            box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #013130;
        }

    </style>
    
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    
    <body class="bodyIndex">
        <div id="cardLanding">
            <h2 id="titleLanding" class="typewriter">Bienvenido a IetiMinigames, espero que te lo pases bien y disfrutes de esta pagina de minijuegos!</h2>
            <h4>Para entrar simplemente dale al boton de jugar! Y si te gusta no te olvides de compartir la web!</h4>
            <div id="buttonEntrar">
                <a href="/login">JUGAR</a>
            </div>
        </div>
        <script>
    const title = document.querySelector('.typewriter');
    const typewriter = new Typewriter(title, {
        loop: false,
        typeSpeed: 30
    });

    typewriter.typeString('Bienvenido a IetiMinigames, espero que te lo pases bien y disfrutes de esta pagina de minijuegos!')
        .start();
    </script>
    </body>
</html>
