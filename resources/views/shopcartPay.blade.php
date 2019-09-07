@extends('layout')

@section('title','Pago')

@section('content')


<div class="jumbotron text-center bg-info">
    <h1 class="display-4">¡Paso Final!</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar la cantidad de : <h4>$ {{$total}}</h4>
    </p>
    <button type="button" class="btn btn-warning btn-lg m-2">PAGAR</button>
    <p>Los productos seran procesados para envio una vez que se confirme el pago <br>
        <strong>(Para aclaraciones complete el formulario de contacto)</strong></p>
</div>


PAGAME!!!
@notify_css
@notify_js
@notify_render
@endsection