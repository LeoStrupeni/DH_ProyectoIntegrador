@extends('layout')

@section('title', 'Listado de usuarios')

@section('content')
<div class="table-responsive-lg">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Documento</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Pais</th>
                <th scope="col">Fecha de registro</th>
                <th scope="col">Ultima fecha de modificacion</th>
                <th scope="col">Tipo de usuario</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->personal_id}}</td>
                <td>{{$user->birthday}}</td>
                <td>{{$user->country}}</td>
                <td>{{$user->created_at->format('d/m/Y')}}</td>
                <td>{{$user->updated_at->format('d/m/Y')}}</td>
                <td>{{$user->profile->name}}</td>
                <td>
                    <form action="{{route('users.destroy', $user->id)}}" method="POST" class="form-users">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger py-0 px-1 delete-user" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row text-center mx-auto mt-1">
        <div class="col-md-6 offset-5">
            {{$users->links()}}
        </div>
    </div>
</div>

@notify_css
@notify_js
@notify_render
@endsection