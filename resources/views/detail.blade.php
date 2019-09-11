@extends('layout')

@section('title','Busqueda')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-12 col-md-4">
            <img src="{{is_null($product->first()->image)?'/storage/images/Products/imgND.jpg':'/storage/images/Products/'.$product->first()->image}}"
                style="max-height:250px;" class="rounded mx-auto d-block p-1" data-toggle="popover" data-trigger="hover"
                data-content="{{substr($product->first()->description, 0, 500)}}.." alt="Responsive image">

            <form method="GET" action="{{route('shopcartadd')}}" class="form-inline mt-4">
                <input type="hidden" name="id" value="{{$product->first()->id}}">
                <input type="hidden" name="idname" value="{{$product->first()->name}}">
                <input type="hidden" name="idprice" value="{{$product->first()->price}}">
                <input type="hidden" name="iduser" value="{{$product->first()->user_id}}">
                <input type="hidden" name="idstock" value="{{$product->first()->Stock}}">
                <div class="form-group w-25">
                    <label for="cantidad" style="font-size:1vw;" class="text-right">Cantidad: </label>
                </div>
                <div class="form-group w-50">
                    <input type="number" min="1" max={{$product->first()->Stock}} class="form-control text-right"
                        value="1" name="idquantity" onkeypress="return valideKey(event);" required />
                </div>
                <button class="btn btn-success w-25 px-0" type="submit">
                    Agregar
                </button>
            </form>
        </div>

        <div class="col-12 col-md-8">

            <table class="table table-sm table-dark my-2">
                <thead>
                    <tr class="bg-danger">
                        <th scope="col" colspan="6" class="text-center h3">
                            {{$product->first()->name}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="w-25 align-middle text-center">Descripcion</th>
                        <td>{{$product->first()->description}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle text-center">Precio</th>
                        <td>{{$product->first()->price}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle text-center">Graduacion</th>
                        <td>{{$product->first()->graduation}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle text-center">Origen</th>
                        <td>{{$product->first()->origin}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle text-center">Año</th>
                        <td>{{$product->first()->year}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle text-center">Volumen(ml)</th>
                        <td>{{$product->first()->volume}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle text-center">Marca</th>
                        <td>{{$product->first()->brand}}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="align-middle text-center">Categoria</th>
                        <td>{{$product->first()->categoria}}</td>
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
        <div class="col-8 col-sm-5 col-lg-4 col-xl-3 mb-1 mx-auto">
            <div class="card bg-transparent border border-dark rounded-lg">
                <h4 class="text-center p-1 cut-text"> {{$related->name}}</h4>
                <img title="{{$related->name}}" alt="{{$related->name}}"
                    src="{{is_null($related->image)?'/storage/images/Products/imgND.jpg':'/storage/images/Products/'.$related->image}}"
                    class="card-img p-1" style="z-index: 10;" data-toggle="popover" data-trigger="hover"
                    data-content="{{substr($related->description, 0, 500)}}..">
                <div class="card-img-overlay text-right mt-5">

                    <h5>{{"$ ".$related->price}}</h5>

                    <form method="GET" action="{{route('shopcartadd')}}">
                        <div class="form-group">
                            <label for="cantidad" style="font-size:1vw;">Cantidad</label>
                            <input type="number" min="1" max={{$related->Stock}} class="text-right w-25" value="1"
                                name="idquantity" onkeypress="return valideKey(event);" required />
                        </div>
                        <input type="hidden" name="id" value="{{$related->id}}">
                        <input type="hidden" name="idname" value="{{$related->name}}">
                        <input type="hidden" name="idprice" value="{{$related->price}}">
                        <input type="hidden" name="iduser" value="{{$related->user_id}}">
                        <input type="hidden" name="idstock" value="{{$related->Stock}}">

                        <button class="btn btn-success w-50 mb-1 px-0" type="submit">
                                Agregar
                            </button>
                    </form>

                    <form method="GET" action="/detail">
                        <input type="hidden" name="id" value="{{$related->id}}">
                        <button class="btn btn-warning w-50 px-0" type="submit">
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