<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bodyLogin">
    <div class="divForm">
        <form>
            <p>Login</p>
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
                <button type="submit" class="inputEnviar">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>