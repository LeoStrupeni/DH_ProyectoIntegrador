@extends('layout')

@section('title','Busqueda')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-12 col-sm-3">
            <img src="{{'/storage/images/Bebidas/'.$product->first()->image}}" class="rounded mx-auto d-block w-100 h-100" alt="Responsive image">
        </div>

        <div class="col-12 col-sm-9">

            <table class="table table-sm table-dark">
                <thead>
                    <tr>
                        <th scope="col" colspan="2" class="text-center h5">
                            {{$product->first()->name}} 
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Descripcion</th>
                        <td>{{$product->first()->description}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Precio</th>
                        <td>{{$product->first()->price}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Graduacion</th>
                        <td>{{$product->first()->graduation}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Origen</th>
                        <td>{{$product->first()->origin}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Año</th>
                        <td>{{$product->first()->year}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Volumen(ml)</th>
                        <td>{{$product->first()->volume}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Marca</th>
                        <td>{{$product->first()->brand_id}}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="row p-2 mb-2 footer-1">
        <h4 class="m-auto">Productos relacionados</h4>
    </div>

       
    <div class="row">
        @foreach ($relatedWith as $related)
            <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-1">
                <div class="card bg-transparent border border-dark rounded-lg">
                    <h4 class="text-center p-1 cut-text"> {{$related->name}}</h4>
                    <img title="{{$related->name}}" alt="{{$related->name}}" src="{{'/storage/images/Bebidas/'.$related->image}}" class="card-img p-1" style="z-index: 10;">
                    <div class="card-img-overlay text-right mt-5">

                        <h4>{{"$ ".$related->price}}</h4>

                        <form method="get" action="Busqueda.php">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" min="1" class="text-right w-25" value="1" id="cantidad" name="cantidad" required>
                            </div>
                            <input type="hidden" name="id" id="id" value="{{$related->id}}">
                            <button class="btn btn-success w-50 mb-1" type="submit" name="btnAccion" value="Agregar">
                                Agregar
                            </button>
                        </form>

                        <form method="GET" action="/detail">
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{$related->id}}">
                            <button class="btn btn-warning w-50" type="submit" name="" value="" style="font-size:1vw;">
                                + Detalles
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>





@endsection