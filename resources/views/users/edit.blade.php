@extends('layout')

@section('title', 'Perfil')

@section('js')
<script src="{{ URL::asset('js/deletions.js') }}"></script>
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-md-4" style="min-height:370px;">
        <h1 class="text-center">Hola, {{$user->name}}</h1>
        <img src="{{ is_file( public_path('storage\\avatars\\').$user->avatar ) ? url('/storage/avatars/'.$user->avatar) : url('/storage/avatars/profile-placeholder.png')}}"
            alt="profile" class="img-fluid shadow mx-auto mt-1 d-block rounded-circle perfil">
    </div>
    <div class="col-12 col-md-8" style="min-height:370px;">
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
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="Su nombre..."
                                value="{{$user->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Apellido</label>
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
                            <label>Correo Electronico</label>
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
                            <input type="date" class="form-control"
                                value="{{$user->birthday}}" name="birthday">
                            @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Foto de perfil</label>
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
                        <label>Tipo de Comerciante</label>
                        <select class="custom-select" name="profile_id">
                            @foreach ($profiles as $profile)
                            <option value="{{$profile->id}}" @if ($user->profile_id > 1 && $profile->id==1)
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
                        <label>Pais</label>
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
                
                {{-- FILTROS DE PRODUCTOS --}}
                <nav class="navbar navbar-expand-lg p-2 nav-1 navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#filtersProducts" aria-controls="filtersProducts" aria-expanded="false" aria-label="Toggle navigation"> 
                        <span class="navbar-toggler-icon"></span>
                    </button>
                                
                    <div class="collapse navbar-collapse justify-content-center" id="filtersProducts">
                        <form action="{{route('users.edit', Auth::user()->id)}}" method="GET" class="form-inline mx-2">
                            <div class="form-group mx-1">
                                <select class="custom-select p-1" name="filter_nombre" style="width:200px;">
                                    <option value="Productos" selected>Tus Productos ... </option>
                                        @foreach ($products as $product)
                                    <option value="{{$product->name}}">{{$product->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success m-auto"><i class="fas fa-redo-alt"></i></button>
                            </div>
                        </form>
                        <form action="{{route('users.edit', Auth::user()->id)}}" method="GET" class="form-inline mx-2">
                            <div class="form-group mx-1">
                                <select class="custom-select p-1" name="filter_marca" style="width:200px;">
                                    <option value="Marcas" selected>Tus Marcas ... </option>
                                        @foreach ($brands as $marca)
                                    <option value="{{$marca->brand_id}}">{{$marca->brand->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success m-auto"><i class="fas fa-redo-alt"></i></button>
                        </div>
                        </form>    
                        <form action="{{route('users.edit', Auth::user()->id)}}" method="GET" class="form-inline mx-2">
                            <div class="form-group mx-1">
                                <select class="custom-select p-1" name="filter_categoria" style="width:200px;">
                                    <option value="Categorias" selected>Tus Categorias ... </option>
                                        @foreach ($categories as $categoria)
                                    <option value="{{$categoria->category_id}}">{{$categoria->Category->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success m-auto"><i class="fas fa-redo-alt"></i></button>
                            </div>
                        </form>
                        <a href="{{route('users.edit', Auth::user()->id)}}" class="btn btn-nav btn-danger">Limpiar</a>
                    </div>
                </nav>

                @if($products->count())

                <div class="row">
                    @foreach($products as $product)
                    <div class="col-12 col-md-6 col-lg-4 my-2">
                        <div class="card p-1 border border-dark">
                            <h5 class="card-title cut-text text-center">{{$product->name}}</h5>
                            <div class="row no-gutters">
                                <div class="col-3 text-center">
                                    <div class="col m-auto">
                                        <img class="w-100 h-100 p-1" alt="{{$product->name}}"
                                            src="{{is_null($product->image)?'/storage/images/Products/imgND.jpg':'/storage/images/Products/'.$product->image}}"
                                            data-toggle="popover" data-trigger="hover"
                                            data-content="{{$product->description}}">
                                    </div>

                                    <a class="btn btn-primary mb-1"
                                        href="{{action('ProductController@edit',$product->id)}}">
                                        <i class='fa fa-pencil-alt' aria-hidden='true'></i>
                                    </a>
                                    <form action="{{action('ProductController@destroy', $product->id)}}" method="POST"
                                        class="form-products">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger delete-product" type="submit">
                                            <i class='fa fa-trash-alt' aria-hidden='true'></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col-9">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Marca: {{$product->brand->name}}</li>
                                        <li class="list-group-item">Categoria: {{$product->Category->name}}</li>
                                        <li class="list-group-item">Origen: {{$product->origin}}</li>
                                        <li class="list-group-item">Precio: $ {{$product->price}}</li>
                                        <li class="list-group-item">Stock: {{$product->Stock}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-warning" role="alert">
                        No hay registro!
                    </div>
                    @endif
                </div>
            </div>
            {{$products->links()}}
        </div>
    </div>
</div>
@endsection