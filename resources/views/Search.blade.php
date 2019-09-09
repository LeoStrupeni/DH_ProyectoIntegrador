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
    <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-1">
        <div class="card bg-transparent border border-dark rounded-lg">
            <h4 class="text-center p-1 cut-text"> {{$producto->name}} </h4>
            <img title="{{$producto->name}}" alt="{{$producto->name}}"
                src="{{is_null($producto->image)?'/storage/images/Products/imgND.jpg':'/storage/images/Products/'.$producto->image}}"
                data-toggle="popover" data-trigger="hover" data-content="{{substr($producto->description, 0, 500)}}.."
                class="card-img p-1 img-fluid" style="z-index: 1;">
            <div class="card-img-overlay text-right mt-5">
                <h5>{{"$". $producto->price}}</h5>
                <form method="GET" action="{{route('shopcartadd')}}">
                    <div class="form-group">
                        <label for="cantidad" style="font-size:1vw;">Cantidad</label>
                        <input type="number" min="1" max={{$producto->Stock}} class="text-right w-25" value="1"
                            name="idquantity" onkeypress="return valideKey(event);" required />
                    </div>
                    <input type="hidden" name="id" value="{{$producto->id}}">
                    <input type="hidden" name="idname" value="{{$producto->name}}">
                    <input type="hidden" name="idprice" value="{{$producto->price}}">
                    <input type="hidden" name="iduser" value="{{$producto->user_id}}">
                    <input type="hidden" name="idstock" value="{{$producto->Stock}}">

                    <button class="btn btn-success w-50 mb-1" type="submit" style="font-size:1vw;">
                        Agregar
                    </button>
                </form>
                <form method="GET" action="/detail">
                    <input type="hidden" name="id" id="id" value="{{$producto->id}}">
                    <button class="btn btn-warning w-50" type="submit" name="" value="" style="font-size:1vw;">
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
            <button type="button" class="btn btn-filtros shadow rounded-circle"
                data-pushbar-target="pushbar-filters">
                <i class="fas fa-filter"></i>
            </button>
    
            <div data-pushbar-id="pushbar-filters" class="pushbar from_right pushbar-filters nav-1">
                <button data-pushbar-close class="btn btn-danger ml-2 mt-2"><i class="fas fa-sign-out-alt"></i></button>
                <h3 class="text-center text-white mt-2">FILTROS</h3>
                <form action="" method="">
                    <div class="form-group">
                        <div class="col p-3">
                            <input list="marca" placeholder="Marca" class="w-100 rounded">
                            <datalist id="marca">
                                <option value="">
                            </datalist>
                        </div>
        
                        <div class="col p-3">
                            <select class="custom-select custom-select-sm" name="categoria">
                                <option selected>Categoria</option>
                            </select>
                        </div>

                        <div class="col p-3">
                            <select class="custom-select custom-select-sm" name="graduacion">
                                <option selected>Graduacion</option>
                            </select>
                        </div>
        
                        <div class="col p-3">
                            <select class="custom-select custom-select-sm" name="graduacion">
                                <option selected>Origen</option>
                            </select>
                        </div>
        
                        <div class="col p-3">
                            <select class="custom-select custom-select-sm" name="graduacion">
                                <option selected>Volumen</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@notify_css
@notify_js
@notify_render
@endsection