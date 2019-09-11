@extends('layout')

@section('title','Busqueda')

@section('content')
<br>
@if(!empty($_SESSION->mensaje))
<div class="alert alert-secondary">
    {{$SESSION->mensaje}}
    <a href="{{url('/')}}" class="badge badge-success"> Ver Carrito</a>
</div>
@endif

<!-- Averiguar como vaciar en este punto la $_SESSION['mensaje'] -->

<div class="row" style="min-height:400px;">
    @if (count($products) == 0)

    <div class="alert alert-secondary w-100 h-25 text-center h4" role="alert">
        No se encontro ningun producto!
    </div>

    @endif
    @foreach ($products as $producto)
    <div class="col-8 col-sm-5 col-lg-4 col-xl-3 mb-1 mx-auto">
        <div class="card bg-transparent border border-dark rounded-lg" style="max-width:312px;">
            <h4 class="text-center p-1 cut-text"> {{$producto->name}} </h4>
            <img title="{{$producto->name}}" alt="{{$producto->name}}"
                src="{{is_null($producto->image)?'/storage/images/Products/imgND.jpg':'/storage/images/Products/'.$producto->image}}"
                data-toggle="popover" data-trigger="hover" data-content="{{substr($producto->description, 0, 500)}}.."
                class="card-img p-1 img-fluid" style="z-index: 1;">
            <div class="card-img-overlay text-right mt-5">
                <h5>{{"$". $producto->price}}</h5>
                <form method="GET" action="{{route('shopcartadd')}}">
                    <div class="form-group">
                        <label style="font-size:1vw;">Cantidad</label>
                        <input type="number" min="1" max={{$producto->Stock}} class="text-right w-25" value="1"
                            name="idquantity" onkeypress="return valideKey(event);" required />
                    </div>
                    <input type="hidden" name="id" value="{{$producto->id}}">
                    <input type="hidden" name="idname" value="{{$producto->name}}">
                    <input type="hidden" name="idprice" value="{{$producto->price}}">
                    <input type="hidden" name="iduser" value="{{$producto->user_id}}">
                    <input type="hidden" name="idstock" value="{{$producto->Stock}}">

                    <button class="btn btn-success w-50 mb-1 px-0" type="submit">
                        Agregar
                    </button>
                </form>
                <form method="GET" action="/detail">
                    <input type="hidden" name="id" value="{{$producto->id}}">
                    <button class="btn btn-warning w-50 px-0" type="submit">
                        + Detalles
                    </button>
                </form>

            </div>
        </div>
    </div>
    @endforeach

</div>
{{$products->links()}}

<div class="row">
    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
        <div>
            <button type="button" class="btn btn-filtros shadow rounded-circle" data-pushbar-target="pushbar-filters">
                <i class="fas fa-filter"></i>
            </button>

            <div data-pushbar-id="pushbar-filters" class="pushbar from_right pushbar-filters">
                <button data-pushbar-close class="btn btn-danger ml-2 mt-2"><i class="fas fa-sign-out-alt"></i></button>
                <h3 class="text-center text-white mt-2">FILTROS</h3>
                <form action="{{route('search')}}" method="GET">
                    <div class="form-group">
                        <div class="col px-3 py-1">
                            <label class="text-white">* Marca</label>
                            <select class="custom-select custom-select-sm" name="filter_marca">
                                <option value="Marcas" selected>Marcas ... </option>
                                    @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col px-3 py-1">
                            <label class="text-white">* Categoria</label>
                            <select class="custom-select custom-select-sm" name="filter_categoria">
                                <option value="Categorias" selected>Categorias ... </option>
                                    @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col px-3 py-1">
                            <label class="text-white">* Graduacion</label>
                            <select class="custom-select custom-select-sm" name="filter_graduacion">
                                <option value="Graduaciones" selected>Graduaciones ... </option>
                                    @foreach ($graduations as $graduation)
                                <option value="{{$graduation->graduation}}">{{round($graduation->graduation, 1)}} %</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col px-3 py-1">
                            <label class="text-white">* Origen-Bodega</label>
                            <select class="custom-select custom-select-sm" name="filter_origin">
                                <option value="Origenes" selected>Origen ... </option>
                                    @foreach ($origins as $origin)
                                <option value="{{$origin->origin}}">{{$origin->origin}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col px-3 py-1">
                            <label class="text-white">* Volumen</label>
                            <select class="custom-select custom-select-sm" name="filter_volume">
                                <option value="Volumenes" selected>Volumen ... </option>
                                    @foreach ($volumes as $volume)
                                <option value="{{$volume->volume}}">{{$volume->volume}} ml.</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="col px-3 py-1">
                            <label class="text-white">* Cosecha</label>
                            <select class="custom-select custom-select-sm" name="filter_year">
                                <option value="Cosecha" selected>Cosecha ... </option>
                                    @foreach ($years as $year)
                                <option value="{{$year->year}}">{{$year->year}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <input type="hidden" name="PM" value="{{$var}}">
                        <button type="submit" class="btn btn-success m-auto"><i class="fas fa-redo-alt"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection