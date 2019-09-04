@extends('layout')

@section('title', 'Perfil')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <img src="{{ is_file( public_path('storage\\avatars\\').$user->avatar ) ? url('/storage/avatars/'.$user->avatar) : url('/storage/avatars/profile-placeholder.png')}}"
            alt="profile" class="img-fluid shadow mx-auto mt-1 d-block rounded-circle perfil">
    </div>
    <div class="col-sm-12">
        <h1 class="text-center">Hola, {{$user->name}}</h1>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <form class="mt-1" action="{{route('users.update', Auth::user()->id)}}" method="POST"
            enctype="multipart/form-data">
            @method('PATCH')
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
                        <div class="form-group col-md-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="Su nombre..."
                                value="{{$user->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" placeholder="Su apellido..."
                                value="{{$user->surname}}" name="surname">
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Su password..."
                                value="{{$user->password}}" name="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha de registro</label>
                            <input type="text" class="form-control" placeholder="Su apellido..."
                                value="{{$user->created_at->format('m/d/Y')}}" name="surname" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="email">Correo Electronico</label>
                            <input type="email" class="form-control" placeholder="nombre@email.com"
                                value="{{$user->email}}" name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Numero de documento</label>
                            <input type="number" class="form-control" placeholder="37299940"
                                value="{{$user->personal_id}}" name="personal_id">
                            @error('personal_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Fecha de nacimiento</label>
                            <input type="date" class="form-control" placeholder="nombre@email.com"
                                value="{{$user->birthday}}" name="birthday">
                            @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="imagen-perfil">Foto de perfil</label>
                        <input type="file" class="form-control-file" name="avatar">
                        @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                    <div class="form-group">
                        <label for="tipo-comerciante">Tipo de Comerciante</label>
                        <select class="custom-select" name="profile_id">
                            @foreach ($profiles as $profile)
                            <option value="{{$profile->id}}" {{($profile->id == $user->profile_id ? 'selected' : '')}}>
                                {{$profile->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('profile_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Pais</label>
                        <select name="country" id="country" class="form-control">
                            @foreach ($countries as $country)
                            <option value="{{$country}}" {{($country == $user->country ? 'selected' : '')}}>
                                {{$country}}
                            </option>
                            @endforeach
                        </select>
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
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
@notify_css
@notify_js
@notify_render
@endsection