<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bodyPerfil">
    <div id="header">
        <script>
            var pagina = 'Perfil';
        </script>

        <header-component></header-component>

    </div>
    <div class="divInfoPerfil">
        <div class="divImagePerfil">
            <img src="https://img.freepik.com/vector-premium/perfil-avatar-hombre-icono-redondo_24640-14044.jpg?w=740" alt="" width="250" height="250">
        </div>
        <div class="divNickPerfil">
            <p class="pNick">{{ Auth::user()->nick_name }}</p>
        </div>
        <div class="divNamePerfil row">
            <p>Nombre</p>
            <p class="pName">{{ Auth::user()->name }}</p>
        </div>
        <div class="divLastNamePerfil row">
            <p>Apellido</p>
            <p class="pLastName">{{ Auth::user()->last_name }}</p>
        </div>
        <div class="divEmailPerfil row">
            <p>Email</p>
            <p class="pEmail">{{ Auth::user()->email }}</p>
        </div>
        <div class="divPasswordPerfil row">
            <p>Contraseña</p>
            <p class="pPassword">*********</p>
        </div>
    </div>
    </div>
    <div id="footer">
        <footer-component></footer-component>

    </div>
</body>