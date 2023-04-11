<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body class="bodyRegister">
    <div class="divForm">
        <form>
            <p>LOGIN</p>
            <hr>
            <div class="divDadesForm">
                <div class="labelInput">
                    <p>NOMBRE DE USURIO: </p>
                    <input type="text" placeholder="USUARIO">
                </div>
                <div class="labelInput">
                    <p>CONTRASEÑA:</p>
                    <input type="password">
                </div>
                <center><button type="submit" class="buttonLogin">LOGIN</button><center>
            </div>
            <a href="">¿Te has olvidado la contraseña?</a>
            <hr>
            <p class="pRegister" >¿No tienes una cuenta?</p>
            <center><button class="buttonRegister" >REGISTRARSE</button><center>
        </form>
    </div>
</body>
</html>