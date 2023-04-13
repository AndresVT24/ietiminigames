<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>LOGIN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bodyLogin">
    <div class="divForm">
        <form action="../register" id="formLogin" method="get">
            <p>LOGIN</p>
            <hr>
            <div class="divDadesForm">
                <div class="labelInput">
                    <p>ALIAS / NICKNAME: </p>
                    <input type="text" placeholder="USUARIO" name="user">
                </div>
                <div class="labelInput">
                    <p>CONTRASEÑA:</p>
                    <input type="password" name="password">
                </div>
                <button type="submit" class="buttonLogin">LOGIN</button>
            </div>
            <a href="">¿Te has olvidado la contraseña?</a>
            <hr>
            <p class="pRegister" >¿No tienes una cuenta?</p>
            <button class="buttonRegister" >REGISTRARSE</button>
        </form>
    </div>
    <script>
        $(document).ready(function (){
        $(".buttonRegister").click(function() {
            event.preventDefault();
            window.location.href = '../register';
        });
    })
    </script>
</body>