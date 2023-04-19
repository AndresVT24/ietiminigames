@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Admin Panel</h1>
@stop

@section('content')
    <table>
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
        </thead>
        <tbody>
            <tr>
                @foreach ($users as $user)
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->nick_name}}</td>
                    <td>{{$user->rol}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->email_verified_at}}</td>
                    <td>{{$user->status}}</td>
                    <td>{{$user->password}}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop