@extends('layout')

@section('title', 'Perfil')

@section('js')
<script src="{{ URL::asset('js/deletions.js') }}"></script>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12 col-md-4" style="min-height:370px;">
        <h1 class="text-center">Hola, {{$user->name}}</h1>
        <img src="{{ is_file( public_path('storage\\avatars\\').$user->avatar ) ? url('/storage/avatars/'.$user->avatar) : url('/storage/avatars/profile-placeholder.png')}}"
            alt="profile" class="img-fluid shadow mx-auto mt-1 d-block rounded-circle perfil">
    </div>
    <div class="col-sm-12 col-md-8" style="min-height:370px;">
        <form class="mt-1" action="{{route('users.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab">Facturacion</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="Su nombre..."
                                value="{{$user->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellido">Apellido</label>
                            <input type="text" class="form-control" placeholder="Su apellido..."
                                value="{{$user->surname}}" name="surname">
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
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
                            <label>DNI/CUIT-CUIL</label>
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

                    <div class="form-row">
                        @if (Auth::user()->hasRole('admin'))
                        <div class="form-group col-md-3">
                            <label>Rol</label>
                            @foreach ($user->roles as $role)
                            <input disabled type="text" class="form-control" value="{{$role->description}}" name="rol">
                            @endforeach
                    
                            @error('rol')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @endif
                    </div>
                </div>

                <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                    <div class="form-group col-md-6 pl-0">
                        <label for="tipo-comerciante">Tipo de Comerciante</label>
                        <select class="custom-select" name="profile_id">
                            @foreach ($profiles as $profile)
                            <option value="{{$profile->id}}" 
                                @if ($user->profile_id > 1 && $profile->id==1)
                                    disabled
                                @elseif ($user->profile_id > 2 && ($profile->id==1 || $profile->id==2))
                                    disabled
                                @endif
                                {{($profile->id == $user->profile_id ? 'selected' : '')}}
                                >
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
                    <div class="form-group col-md-6 pl-0">
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

<div class="row">
    <div class="col">
        <div class="panel panel-default m-auto">
            <div class="panel-body">
        
                <nav class="navbar p-2 nav-2">
                    <div class="text-left">
                        <h3>Mis productos</h3>
                    </div>
                    <div class="text-right">
                        <div class="btn-group">
                        <a href="{{ route('products.create') }}" class="btn btn-info">Añadir Producto</a>
                        </div>
                    </div>
                </nav>
        
                <div class="table-container">
                <table id="mytable" class="table table-bordered table-striped">
                    <thead>
                    <th>Imagen</th>
                    <th>Name</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Grad.</th>
                    <th>Origen</th>
                    <th>Año</th>
                    <th>Vol.</th>
                    <th>Categoria.</th>
                    <th>Marca</th>
                    <th>Stock</th>
                    <th>Edicion</th>
                    </thead>
                    <tbody>

                    @if($products->count())
                        @foreach($products as $product)
                        <tr>
                            <td class="text-center"><img
                                src="{{is_null($product->image)?'/storage/images/Products/imgND.jpg':'/storage/images/Products/'.$product->image}}"
                                style="width:40px;"></td>
                            <td>{{$product->name}}</td>
                            <td class="cut-text" data-toggle="popover" data-trigger="hover"
                            data-content="{{$product->description}}">{{substr($product->description, 0, 15)}}</td>
                            <td class="text-center">$ {{$product->price}}</td>
                            <td class="text-center">{{$product->graduation}} %</td>
                            <td>{{$product->origin}}</td>
                            <td class="text-center">{{$product->year}}</td>
                            <td class="text-center">{{$product->volume}} ml.</td>
                            <td>{{$product->Category->name}}</td>
                            <td>{{$product->brand->name}}</td>
                            <td class="text-center">{{$product->Stock}}</td>
                            <td class="text-center">
                            <a class="btn btn-primary mb-1 w-75" href="{{action('ProductController@edit',$product->id)}}">
                                <i class='fa fa-pencil-alt' aria-hidden='true'></i>
                            </a>
            
                            <form action="{{action('ProductController@destroy', $product->id)}}" method="POST"
                                class="form-products">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger w-75" type="submit" class="delete-product">
                                <i class='fa fa-trash-alt' aria-hidden='true'></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="12">No hay registro!</td>
                    </tr>
                    @endif
                    </tbody>
        
                </table>
                </div>
            </div>
            {{$products->links()}}
        </div>
    </div>
</div>
@notify_css
@notify_js
@notify_render
@endsection