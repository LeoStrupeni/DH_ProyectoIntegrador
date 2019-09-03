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
</div>


<div class="my-2">
    <div class="card bg-info">
        <h3 class="text-center mt-2">Nuevo Producto</h3>
        <div class="header mt-4">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 m-0">
                        <div class="form-group row">
                            <label class="col-md-2 control-label text-right cut-text m-0 p-1 text-white"><strong>Nombre:</strong></label>
                            <input type="text" class="col-md-10 form-control" name="nombre" value="" required>
                        </div>
                    </div>
                    <div class="col-md-2 p-0 m-0">
                    </div>
                    <div class="col-md-2 p-0 m-0">
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right cut-text m-0 p-1 text-white"><strong>Precio:</strong></label>
                            <input type="number" class="col-md-6 form-control text-center" name="precio" value="" required>
                        </div>
                    </div>

                </div>
        
                <div class="col-12 form-group">
                    <label class="control-label text-white"><strong>Descripcion del Producto:</strong></label>
                    <textarea class="form-control" name="descripcion" rows="5"></textarea>
                </div>


                <div class="row">
                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1 text-white"><strong>Marca:</strong></label>
                            <select class="col-md-6 custom-select" name="marca" required>
                                <option selected></option>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->name}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1 text-white"><strong>Categoria:</strong></label>
                            <select class="col-md-6 custom-select" name="categoria" required>
                                <option selected></option>
                                
                                @foreach ($category as $cat)
                                <option value="{{$cat->name}}">{{$cat->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1 text-white"><strong>Año:</strong></label>
                            <input type="number" min="1990" max="<?=date("Y");?>" value="<?=date("Y");?>" class="col-md-6 form-control" name="anio" value="">
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1 text-white"><strong>Graduacion:</strong></label>
                            <input type="text" class="col-md-6 form-control" name="graduacion" value="" required>
                        </div>
                    </div>

                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1 text-white"><strong>Origen:</strong></label>
                            <input type="text" class="col-md-6 form-control" name="graduacion" value="" required>
                        </div>
                    </div>

                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1 text-white"><strong>Volumen:</strong></label>
                            <input type="text" class="col-md-6 form-control" name="graduacion" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row ml-5 text-white"><strong>Select a file: </strong>
                    <input type="file" name="foto" class="col-4 form-control-file">
                </div>

                <div class="row">
                    <div class="col text-center my-2">
                        <button type="submit" class="btn btn-danger btn-lg">Confirmar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection