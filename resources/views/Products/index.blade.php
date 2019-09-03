@extends('layout')

@section('title', 'Productos')

@section('content')

<div class="row">
  {{-- <section class="content"> --}}
    <div class="col">
      <div class="panel panel-default m-auto">
        <div class="panel-body">

          <nav class="navbar p-2">
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

                    <form action="{{action('ProductController@destroy', $product->id)}}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger w-75" type="submit">
                        <i class='fa fa-trash-alt' aria-hidden='true'></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="12">No hay registro !!</td>
                </tr>
                @endif
              </tbody>

            </table>
          </div>
        </div>
        <div class="row text-center mx-auto mt-1">
          <div class="col-md-6 offset-5">
            {{$products->links()}}
          </div>
        </div>
      </div>
    </div>
  {{-- </section> --}}


</div>

@endsection