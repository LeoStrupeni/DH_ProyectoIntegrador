@extends('layout')

@section('title','Shopping Cart')

@section('content')

<?php $total = 0 ?>
@if (count(Session::get('cart')))

<table class="table table-sm table-warning">
    <tbody>
        <tr>
            <th width="45%">Producto</th>
            <th width="10%" class="text-center">Cantidad</th>
            <th width="20%" class="text-center">Precio</th>
            <th width="20%" class="text-center">Total</th>
            <th width="5%">Eliminar</th>
        </tr>
        @foreach (Session::get('cart') as $product)
        <tr>
            <td width="45%">{{$product['name']}}</td>
            <td width="10%" class="text-center">{{$product['quantity']}}</td>
            <td width="20%" class="text-center">{{$product['price']}}</td>
            <td width="20%" class="text-center">{{number_format($product['price'] * $product['quantity'], 2)}}
            </td>
            <td width="5%" class="text-center">
                <form method="GET" action="{{route('shopcartdelete')}}">
                    <input type="hidden" name="id" value="{{$product['id']}}">
                    <input type="hidden" name="idStock" value="{{$product['stock']}}">
                    <button class="btn btn-danger" type="submit" value="delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </td>
        </tr>

        <?php $total = $total + ($product['price'] * $product['quantity']); ?>
        @endforeach


        <tr>
            <td colspan="3" class="text-right">
                <h3>Total</h3>
            </td>
            <td>
                <h3 class="text-center">{{number_format($total, 2)}}</h3>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

<div class="alert alert-success p-2" role="alert">
    <div class="row">
        <div class="col-12 col-md-4 p-1 text-center">
            <a href="{{ route('pay')}}" class="btn btn-primary w-50">Pagar <i
                    class="fas fa-dollar-sign"></i></a>
        </div>
        <div class="col-12 col-md-4 p-1 text-center">
            <a class="btn btn-success w-50" href="/search" role="button">Agregar <i
                    class="fas fa-wine-bottle"></i></a>
        </div>
        <div class="col-12 col-md-4 p-1 text-center">
            <a href="{{ route('cartTrash')}}" class="btn btn-danger w-50">
                Vaciar <i class="fas fa-dumpster"></i>
            </a>
        </div>
    </div>
</div>

@else

<div class="alert alert-warning" role="alert">
    No hay productos en el carrito
</div>

@endif

@endsection