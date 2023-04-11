<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>REGISTRO</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bodyRegister">
    <div class="divForm">
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
    </div>
</body>
<script>
    $(document).ready(function (){
        $(".buttonLogin").click(function() {
            event.preventDefault();
            window.location.href = '../login';
        });
    })
</script>