@extends('layout')

@section('title', 'Productos')

@section('content')
<div class="row">
    <div class="col-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error!</strong> Revise los campos obligatorios.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(Session::has('success'))
        <div class="alert alert-info">
            {{Session::get('success')}}
        </div>
        @endif    
    </div>
    <div class="col">
        <h3 class="">Nuevo Producto</h3>
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6 m-0">
                    <div class="form-group row">
                        <label class="col-md-2 control-label text-right cut-text m-0 p-1">Nombre:</label>
                        <input type="text" class="col-md-10 form-control" name="nombre" required>
                    </div>
                </div>
                <div class="col-md-4 p-0 m-0">
                    <div class="form-group row">
                        <label class="col-md-3 control-label text-right cut-text m-0 p-1">Precio:</label>
                        <input type="number" class="col-md-6 form-control text-center" name="precio" required>
                    </div>
                </div>

                <div class="col-md-2 p-0 m-0">
                    <div class="form-group row">
                        <label class="col-md-3 control-label text-right cut-text m-0 p-1">Año:</label>
                        <input type="number" min="1990" max="<?=date("Y");?>" value="<?=date("Y");?>" class="col-md-5 form-control" name="anio">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection