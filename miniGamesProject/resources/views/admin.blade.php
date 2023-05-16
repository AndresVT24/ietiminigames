@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content_header')
    <h1>USUARIOS</h1>
@stop

@section('content')

<!-- ES EL MODEL QUE SE USA CUANDO QUEREMOS EDITAR LA INFO DE UN USUARIO -->
<div class="modal" tabindex="-1" id="editUser">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">EDITAR USUARIO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnClose"></button>
            </div>
        <div class="modal-body">
        <form class="form-floating row g-3" id="formEditUser" method="post">
            @csrf
            @method('PUT')
            <!-- AQUI SE AÑADE CON JQUERY LA INFO DEL USUARIO QUE QUEREMOS EDITAR -->
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

<!-- ES LA TABLA CON LOS DATOS DE LOS USUARIOS -->
<div class="card">
    <div class="card-body">
        <table class='table table-striped' id='users'>
            <thead>
                <th>ID</th>
                <th>NAME</th>
                <th>LAST_NAME</th>
                <th>NICK_NAME</th>
                <th>ROL</th>
                <th>EMAIL</th>
                <th>EMAIL_VERIFIED_AT</th>
                <th>STATUS</th>
                <th>PASSWORD</th>
                <th>CREATED_AT</th>
                <th>UPDATED_AT</th>
                <th>ACCIONES</th>
            </thead>
            <tbody>
                    @foreach ($users as $user)
                    <tr>
                    <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->nick_name}}</td>
                        <td>{{$user->rol}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->email_verified_at}}</td>
                        <td>{{$user->status}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary btn-edit" data-bs-toggle="modal" data-bs-target="#editUser" data-id= '{{$user->id}}'>Editar</button>
                            <button type="button" class='btn btn-sm btn-danger btn-delete' data-id= '{{$user->id}}' + >Borrar</button>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            var userId=0

            //HACE QUE LA TABLA QUE ENSEÑA LOS USUARIO SEA RESPONSIVE
            $('#users').DataTable({
                responsive:true,
                autoWidth:false
            });
            
            //BORRA DEL DOM LOS DATOS QUE SE ENSEÑA EN EL FORM
            $(".btn-edit").click(function (){
                $("#formEditUser").empty()
            })
            
            //ELIMINA EL USUARIO DE LA BASE DE DATOS
            $(document).on('click', '.btn-delete', function () {
                var userId = $(this).data('id');
                if (confirm("¿Está seguro que desea borrar este usuario?")) {
                    $.ajax({
                        url: '/userDelete/' + userId,
                        type: 'DELETE',
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function () {
                            location.reload();
                        },
                        error: function (xhr) {
                            alert('Ha ocurrido un error al borrar el usuario.');
                        }
                    });
                }
            });

            //ENSEÑA EL FORMULARIO PARA PODER EDITAR AL USUARIO CON LOS DATOS DEL USUARIO
            $(document).on('click', '.btn-edit', function () {
                userId = $(this).data('id');
                userId= userId
                $.ajax({
                    url: '/userFind/' + userId ,
                    type: 'GET',
                    success: function(data){
                        data= data.userInfo
                        arrayNoEdit= ["id", "email", "email_verified_at", "created_at", "updated_at"]
                        $.each(data, function(index, usuario) {
                            if($.inArray(index, arrayNoEdit) !== -1){
                                $("#formEditUser").append('<div class="col-md-6"> <label for="input'+index+'" class="form-label">'+index+'</label> <input type="text" class="form-control" id="input'+index+'" value="'+usuario+'" name="'+index+'" disabled> </div>')
                            }
                            else{
                                $("#formEditUser").append('<div class="col-md-6"> <label for="input'+index+'" class="form-label">'+index+'</label> <input type="text" class="form-control" id="input'+index+'" value="'+usuario+'" name="'+index+'"> </div>')

                            }
                        });
                    }
                    ,
                    error: function (xhr) {
                        alert('Ha ocurrido un error al cargar los datos del usuario.');
                    }
                });
            });

            //GUARDA LOS CAMBIOS QUE SE HAYAN HECHO EN EL USUARIO
            $("#btnSave").click(function (e) {
                e.preventDefault();
                var datosFormulario = $('#formEditUser').serialize();
                $.ajax({
                    url: "/userEdit/" + userId,
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
        });
    </script>
@stop