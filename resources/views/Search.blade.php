@extends('layout')

@section('title','Busqueda')

@section('content')

<div class="container">
    <br>
    @if(!empty($_SESSION->mensaje))
    <div class="alert alert-secondary">
        {{$SESSION->mensaje}}
        <a href="carrito.php" class="badge badge-success"> Ver Carrito</a>
    </div>
    @endif

    <!-- Averiguar como vaciar en este punto la $_SESSION['mensaje'] -->

    <div class="row" style="min-height:400px;">
        @if (count($products) == 0)

        <div class="alert alert-secondary w-100 h-25 text-center h4" role="alert">
            No se Encontro ningun producto!
        </div>

        @endif
        @foreach ($products as $producto)

        <?php
            
            // $var = (Storage::url("images/Bebidas/".$producto['image']));
            // var_dump(Storage::url("images/Bebidas/".$producto['image']));
            // var_dump($var);

            ?>

        <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-1">
            <div class="card bg-transparent border border-dark rounded-lg">
                <h4 class="text-center p-1 cut-text"> {{$producto->name}} </h4>
                <img title="{{$producto->name}}" alt="{{$producto->name}}"
                    src="{{ file_exists(Storage::url("images/Bebidas/".$producto->image)) ? Storage::url("images/Bebidas/".$producto->image) : Storage::url("images/Bebidas/imgND.jpg") }}"
                    data-toggle="popover" data-trigger="hover"
                    data-content="{{substr($producto->description, 0, 500)}}.." class="card-img p-1 img-fluid"
                    style="z-index: 10;">
                <div class="card-img-overlay text-right mt-5">
                    <h5>{{"$". $producto->price}}</h5>
                    <form method="get" action="">
                        @csrf
                        <div class="form-group">
                            <label for="cantidad" style="font-size:1vw;">Cantidad</label>
                            <input type="number" min="1" class="text-right w-25" value="1" id="cantidad" name="cantidad"
                                required>
                        </div>
                        <input type="hidden" name="id" id="id" value="{{$producto->id}}">
                        <button class="btn btn-success w-50 mb-1" type="submit" name="btnAccion" value="Agregar"
                            style="font-size:1vw;">
                            Agregar
                        </button>
                    </form>
                    <form method="get" action="">
                        @csrf
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

    <div class="row text-center mx-auto mt-1">
        <div class="col-md-6 offset-5">
            {{$products->links()}}
        </div>
    </div>

</div>


<nav class="navbar fixed-bottom navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <p class="navbar-brand">Filtros</p>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form action="" method="">
            <div class="form-group row">
                <div class="col-2">
                    <input list="marca" placeholder="Marca" class="w-100 rounded">
                    <datalist id="marca">
                        <option value="">
                    </datalist>
                </div>

                <div class="col-2">
                    <select class="custom-select custom-select-sm" name="categoria">
                        <option selected>Categoria</option>
                    </select>
                </div>

                <div class="col-2">
                    <select class="custom-select custom-select-sm" name="subcategoria">
                        <option selected>Sub Categoria</option>
                    </select>
                </div>

                <div class="col-2">
                    <select class="custom-select custom-select-sm" name="graduacion">
                        <option selected>Graduacion</option>
                    </select>
                </div>

                <div class="col-2">
                    <select class="custom-select custom-select-sm" name="graduacion">
                        <option selected>Origen</option>
                    </select>
                </div>

                <div class="col-2">
                    <select class="custom-select custom-select-sm" name="graduacion">
                        <option selected>Volumen</option>
                    </select>
                </div>

            </div>
        </form>

    </div>
</nav>


@endsection