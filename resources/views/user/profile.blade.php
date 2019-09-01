@extends('layout')

@section('title', 'Perfil')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <img src="{{ url('/storage/avatars/'.$user->avatar) }}" alt="profile"
            class="img-fluid shadow mx-auto d-block rounded-circle perfil">
    </div>
    <div class="col-sm-12">
        <h1 class="text-center">Hola, {{$user->name}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <form class="mt-1" action="{{route('user-update')}}" method="POST">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            {{ method_field('PATCH') }}
            @csrf
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab">Facturacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="productos-tab" data-toggle="tab" href="#productos" role="tab">Mis
                        Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="alta-tab" data-toggle="tab" href="#alta" role="tab">Altas Productos</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="Su nombre..." value="{{$user->name}}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" placeholder="Su apellido..."
                                value="{{$user->surname}}" name="surname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Correo Electronico</label>
                            <input type="email" class="form-control" placeholder="nombre@email.com"
                                value="{{$user->email}}" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tel">Numero de documento</label>
                            <input type="tel" name="" id="" class="form-control" placeholder="xxx"
                                value="{{$user->personal_id}}" name="personal_id">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imagen-perfil">Foto de perfil</label>
                        <input type="file" class="form-control-file" name="avatar">
                    </div>
                </div>

                <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                    <div class="form-group">
                        <label for="tipo-comerciante">Tipo de Comerciante</label>
                        <select class="custom-select" name="profile_id">
                            @foreach ($profiles as $profile)
                            <option value="{{$profile->id}}">{{$profile->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pais">Pais</label>
                        <input type="text" placeholder="Argentina" class="form-control"
                            value="{{$user->country}}" name="country">
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6 text-center my-2">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@endsection