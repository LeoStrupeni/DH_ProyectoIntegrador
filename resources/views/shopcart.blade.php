@extends('layout')

@section('title','Shopping Cart')

@section('content')

<div class="row my-2">
    <div class="col-12 col-lg-10 m-auto">

        @if (Session::has('cart'))
            <table class="table table-sm table-warning">
                <tbody>
                    <tr>
                        <th width="40%">Producto</th>
                        <th width="15%" class="text-center">Cantidad</th>
                        <th width="20%" class="text-center">Precio</th>
                        <th width="20%" class="text-center">Total</th>
                        <th width="5%">Eliminar</th>
                    </tr>
                    <?php $total = 0; ?>

                    @foreach (Session::get('cart') as $product)
                    <tr>
                        <td width="40%"><?= $product['name'] ?></td>
                        <td width="15%" class="text-center"><?= $product['quantity'] ?></td>
                        <td width="20%" class="text-center"><?= $product['price'] ?></td>
                        <td width="20%" class="text-center"><?= number_format($product['price'] * $product['quantity'], 2) ?></td>
                        <td width="5%" class="text-center">
                            <form method="GET" action="{{route('shopcartdelete')}}">
                                <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                <button class="btn btn-danger" type="submit" value="delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                        <?php $total = $total + ($product['price'] * 1); ?>
                    @endforeach
                    

                    <tr>
                        <td colspan="3" class="text-right">
                            <h3>Total</h3>
                        </td>
                        <td>
                            <h3 class="text-center"><?= number_format($total, 2) ?></h3>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <div class="alert alert-success p-2" role="alert">
                <form class="form-inline m-auto" method="post" action="pagar.php" >
                    <div class="col-2 form-group p-0">
                        <label for="my-input">Correo de contacto: </label>
                    </div>
                    <div class="col-6 form-group p-1">
                        <input name="email" class="form-control" type="email" value="{{$emailuser}}" required> 
                    </div>
                    <div class="col-2 p-1">
                        <button class="btn btn-primary w-100" type="submit" value="proceder">Pagar</button>
                    </div>
                    <div class="col-2 p-1">
                        <a class="btn btn-success w-100" href="/search" role="button">Agregar Mas</a>
                    </div>  
                </form> 
    
            </div>
            
        @else

            <div class="alert alert-warning" role="alert">
                No hay productos en el carrito
            </div>

        @endif

@notify_css
@notify_js
@notify_render
@endsection