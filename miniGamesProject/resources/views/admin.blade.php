@extends('adminlte::page')

@section('title', 'AdminPanel')

@section('content_header')
    <h1>Admin Panel</h1>
@stop

@section('content')
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
                            <button class='btn btn-primary btn-sm edit-user' data-id= '{{$user->id}}'>Editar</button>
                            <button class='btn btn-sm btn-danger btn-delete' data-id= '{{$user->id}}' + >Borrar</button>
                         </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                responsive:true,
                autoWidth:false
            });

            $(document).on('click', '.btn-delete', function () {
                var userId = $(this).data('id');
                if (confirm("¿Está seguro que desea borrar este usuario?")) {
                    $.ajax({
                        url: '/users/' + userId,
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

            $(document).on('click', '.edit-user', function () {
                var userId = $(this).data('id');
                $.ajax({
                    url: '/users/' + userId + '/edit',
                    type: 'GET',
                    success: function (response) {
                        $('#edit-user-form input[name="id"]').val(response.user.id);
                        $('#edit-user-form input[name="name"]').val(response.user.name);
                        $('#edit-user-form input[name="email"]').val(response.user.email);
                        console.log()
                        $('#edit-user-modal').modal('show');
                    },
                    error: function (xhr) {
                        alert('Ha ocurrido un error al cargar los datos del usuario.');
                    }
                });
            });

        });
    </script>
@stop