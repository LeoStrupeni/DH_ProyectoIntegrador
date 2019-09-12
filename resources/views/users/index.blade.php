@extends('layout')

@section('title', 'Listado de usuarios')

@section('js')
<script src="{{ URL::asset('js/deletions.js') }}"></script>
@endsection

@section('content')
<div class="table-responsive-lg">
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Documento/CUIT - CUIL</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Pais</th>
                <th scope="col">Fecha de registro</th>
                <th scope="col">Ultima fecha de modificacion</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Rol Asignado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <th>{{$user->name}}</th>
                    <th>{{$user->surname}}</th>
                    <th>{{$user->email}}</th>
                    <th>{{$user->personal_id}}</th>
                    <th>{{$user->birthday}}</th>
                    <th>{{$user->country}}</th>
                    <th>{{$user->created_at->format('d/m/Y')}}</th>
                    <th>{{$user->updated_at->format('d/m/Y')}}</th>
                    <th>{{$user->profile->name}}</th>
                    <th>
                        @foreach ($user->roles as $role)
                            {{$role->description }}
                        @endforeach
                    </th>
                    <th>
                        <form action="{{route('users.destroy', $user->id)}}" method="POST" class="form-users">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger py-0 px-1 delete-user" value="Borrar">
                        </form>
                    </th>
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
@endsection