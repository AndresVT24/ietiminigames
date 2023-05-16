<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href='https://fonts.googleapis.com/css?family=Caesar+Dressing' rel='stylesheet' type='text/css'>
</head>
<body class="bodyPerfil">
    <div id="header">
        <script>
            var pagina = 'Perfil';
        </script>

        <header-component></header-component>

    </div>
    <!-- ES EL MODEL QUE SE USA CUANDO QUEREMOS EDITAR LA INFO DE UN USUARIO -->
    <div class="modal" tabindex="-1" id="btnEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar {{Auth::user() -> nick_name}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
                </div>
                <div class="modal-body">
                    <form class="form-floating row g-3" id="formEditUser" method="post">
                        <!-- AQUI SE AÑADE CON JQUERY LA INFO DEL USUARIO QUE QUEREMOS EDITAR -->
                        @csrf
                        @method('PUT')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btnClose">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSave">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<!-- FIN DEL MODEL -->
    <div class="divInfoPerfil">
        <div class="divImagePerfil">
            <img src="https://img.freepik.com/vector-premium/perfil-avatar-hombre-icono-redondo_24640-14044.jpg?w=740" alt="" width="250" height="250">
        </div>
        <div class="divNickPerfil">
            <p class="pNick">{{ Auth::user()->nick_name }}</p>
        </div>
        <div class="divNamePerfil rows col">
            <p>Nombre</p>
            <p class="pName">{{ Auth::user()->name }}</p>
        </div>
        <div>
            <button class="btn btn-lg btn-primary btn-edit" type="button" data-id='{{ Auth::user()->id }}' data-bs-target="#btnEdit" data-bs-toggle="modal">EDITAR</button>
        </div>
        <div class="divLastNamePerfil rows col">
            <p>Apellido</p>
            <p class="pLastName">{{ Auth::user()->last_name }}</p>
        </div>
        <div class="divEmailPerfil rows">
            <p>Email</p>
            <p class="pEmail">{{ Auth::user()->email }}</p>
        </div>
        <div class="divPasswordPerfil rows">
            <p>Contraseña</p>
            <p class="pPassword">*********</p>
        </div>
        <div class="divPasswordPerfil rows">
            <p>Contraseña</p>
            <p class="pPassword">*********</p>
        </div>
    </div>
    <div id="footer">
        <footer-component></footer-component>

    </div>
</body>
<script>
    $(document).ready(function (){
        //INDENTIFICACION SI ES PREMIUM
        var idValor = $(".btn-edit").attr("data-id");
        console.log(idValor)
        
        $.ajax({
            url: 'userFind/' + idValor ,
            type: 'GET',
            success: function(data){
                status= data.userInfo['status']
                if(status==1){
                    $('.divNickPerfil').css({
                        'color': 'gold',
                        'text-shadow': '0 0 10px black',
                        'font-family': 'Caesar Dressing'
                    })

                    $('.divImagePerfil > img').css({
                        'box-shadow': '0 0 50px gold'
                    })
                }
            }
            ,
            error: function (xhr) {
                alert('Ha ocurrido un error al cargar los datos del usuario.');
            }
        });

        //BORRA DEL DOM LOS DATOS QUE SE ENSEÑA EN EL FORM
        $(".btn-edit").click(function (){
                $("#formEditUser").empty()
            })

        //OBTENER DATOS DEL USUARIO PARA EL FORMULARIO
        $(document).on('click', '.btn-edit', function () {
                var userId = $(this).data('id');
                console.log(userId)
                $.ajax({
                    url: 'userFind/' + userId ,
                    type: 'GET',
                    success: function(data){
                        console.log(data)
                        data= data.userInfo
                        arrayAvoid= ["id", "updated_at", "created_at", "status", "email_verified_at", "rol"]
                        arrayNotAvaliable= ['email', 'nick_name']
                        $.each(data, function(index, user) {
                            if($.inArray(index, arrayAvoid) == -1){
                                if($.inArray(index, arrayNotAvaliable) !== -1){
                                    $("#formEditUser").append('<div class="col-md-6"> <label for="input'+index+'" class="form-label">'+index+'</label> <input type="text" class="form-control" id="input'+index+'" value="'+user+'" name="'+index+'" disabled> </div>')
                                }
                                else{
                                    $("#formEditUser").append('<div class="col-md-6"> <label for="input'+index+'" class="form-label">'+index+'</label> <input type="text" class="form-control" id="input'+index+'" value="'+user+'" name="'+index+'"> </div>')

                                }
                            }
                        });
                    }
                    ,
                    error: function (xhr) {
                        alert('Ha ocurrido un error al cargar los datos del usuario.');
                    }
                });
            });
    })
</script>