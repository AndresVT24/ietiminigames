@extends('base')
@section('title', 'Perfil')

@section('content')
    <style>
        .overlay {
            background-color: rgba(0, 0, 0, 0.6);
        }
    </style>
    <!-- MODAL -->
    @if(Auth::user()->status != 0)
    <div id="modal" class="fixed top-0 left-0 w-full h-full flex items-center justify-center overlay hidden">
        <div class="bg-white w-1/2 p-8 border rounded">
            <h2 class="text-lg font-bold mb-4">Editar {{Auth::user() -> nick_name}}</h2>
            <form id="formEditUser" method="post">
                @method('PUT')
                @csrf
            </form>
            <div class="flex justify-center mt-5">
                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mr-2 rounded" id="btnClose">
                    Cerrar
                </button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="btnSave">
                    Guardar
                </button>
            </div>
        </div>
    </div>

    <!-- FIN DEL MODEL -->
    <div class="divInfoPerfil">
        <div class="divImagePerfil">
            <img src="/img/avatar.avif" alt="" width="250" height="250" class="imgUser">
        </div>
        <div class="divNickPerfil">
            <p class="pNick">{{ Auth::user()->nick_name }}</p>
        </div>
        <div class="divNamePerfil rows col">
            <p>Nombre</p>
            <p class="pName">{{ Auth::user()->name }}</p>
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
    </div>
    <div class="flex items-center justify-center mt-5">
        <button id="modalButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded btn-edit" type="button" data-id='{{ Auth::user()->id }}'>
            Editar Perfil
        </button>
    </div>
</body>
@else
<div id="bannedUser">
<h1>Usuario Baneado</h1>
<p>Tu usuario está baneado, si quieres contactar con nosotros envia un correo a <strong>adminietigmaes@gmail.com</strong></p>
</div>
@endif
<style>
  body{
    background-color: #6CC4F5;
  }
</style>
<script>
    $(document).ready(function (){
        // Función para abrir y cerrar el modal
        function toggleModal() {
            const modal = document.getElementById('modal');
            modal.classList.toggle('hidden');
        }

        function getInfoUser(idValor){
            $.ajax({
                url: 'userFindProfile/' + idValor ,
                type: 'GET',
                success: function(data){
                    var rol= data.userInfo['rol']
                    if(rol==1 || rol==2){
                        $('.divNickPerfil').css({
                            'color': 'gold',
                            'text-shadow': '0 0 10px black',
                            'font-family': 'Caesar Dressing'
                        })

                        $('.divImagePerfil > img').css({
                            'box-shadow': '0 0 50px gold'
                        })
                    }
                    data= data.userInfo
                    arrayAvoid= ["id", "updated_at", "created_at", "status", "email_verified_at", "rol"]
                    arrayNotAvaliable= ['email', 'nick_name']
                    $.each(data, function(index, user) {
                        if($.inArray(index, arrayAvoid) == -1){
                            if($.inArray(index, arrayNotAvaliable) !== -1){
                                $("#formEditUser").append('<div class="sm:col-span-4 mb-4"> <label for="input'+index+'" class="block text-sm font-medium leading-6 text-gray-900">'+index+'</label><div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"> <input type="text" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="input'+index+'" value="'+user+'" name="'+index+'" disabled></div></div>')
                            }
                            else{
                                $("#formEditUser").append('<div class="sm:col-span-4 mb-4"> <label for="input'+index+'" class="block text-sm font-medium leading-6 text-gray-900">'+index+'</label><div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md"> <input type="text" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" id="input'+index+'" value="'+user+'" name="'+index+'"></div></div>')

                            }
                        }
                    });
                }
                ,
                error: function (xhr) {
                    alert('Ha ocurrido un error al cargar los datos del usuario.');
                }
            });
        }

        function setStatuStyle(idValor){
            $.ajax({
                url: 'userFind/' + idValor ,
                type: 'GET',
                success: function(data){
                    var rol= data.userInfo['rol']
                    if(rol==1 || rol==2){
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
        }

        $("#titulo").text("PERFIL")

        //INDENTIFICACION SI ES PREMIUM
        var idValor = $(".btn-edit").attr("data-id");

        //OBTENER DATOS DEL USUARIO PARA EL FORMULARIO
        getInfoUser(idValor)

        //GUARDA LOS CAMBIOS QUE SE HAYAN HECHO EN EL USUARIO
        $("#btnSave").click(function (e) {
            e.preventDefault();
            var datosFormulario = $('#formEditUser').serialize();
            console.log(datosFormulario)
            $.ajax({
                url: "/userEditPerfil/" + idValor,
                method: 'PUT',
                data: datosFormulario,
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            })
        })

        // Evento abrir modal o Cerrar Modal
        $("#modalButton").click(function (){
            toggleModal()
        })

        $("#btnClose").click(function (){
            toggleModal()
        })
    })
</script>
@endsection
