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
                <li class="list-unstyled">{{ $error }}</li>
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
    <div class="card bg-light">
        <h3 class="text-center mt-2">Nuevo Producto</h3>
        <div class="header mt-4">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="my-2">
                {{ csrf_field() }}

                <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                <div class="row m-0">
                    <div class="col-12 col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-4 col-md-3 control-label text-right cut-text m-0 p-1 text-black"><strong>Nombre:</strong></label>
                            <input type="text" class="col-6 col-md-8 form-control" name="name" value="" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group row">
                            <label
                                class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Precio:</strong></label>
                            <input type="number" class="col-6 form-control text-right" name="price" value="" required>
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group row">
                            <label
                                class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Stock:</strong></label>
                            <input type="number" class="col-6 form-control text-right" name="stock" value="" required>
                        </div>
                    </div>


                </div>

                <div class="col-12 form-group">
                    <label class="control-label text-black"><strong>Descripcion del Producto:</strong></label>
                    <textarea class="form-control" name="description" rows="5"></textarea>
                </div>


                <div class="row">
                    <div class="col-12 col-md-4 text-center">
                        <img title="" alt="" class="text-center" src="/storage/images/Products/imgND.jpg">
                    </div>
                    <div class="col-12 col-md-8 mt-2">
                        <div class="form-group row">
                            <label
                                class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Marca:</strong></label>
                            <select class="col-6 custom-select" name="brand_id" required>
                                @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Categoria:</strong></label>
                            <select class="col-6 custom-select" name="category_id" required>
                                @foreach ($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Año:</strong></label>
                            <input type="number" min="1990" max="<?=date("Y");?>" value="<?=date("Y");?>"
                                class="col-6 form-control" name="year" value="">
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Graduacion:</strong></label>
                            <input type="text" class="col-6 form-control" name="graduation" value="" required>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Origen:</strong></label>
                            <input type="text" class="col-6 form-control" name="origin" value="" required>
                        </div>
                        <div class="form-group row">
                            <label
                                class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Volumen:</strong></label>
                            <input type="text" class="col-6 form-control" name="volume" value="" required>
                        </div>
                        <div class="form-group row">
                            <label class="col-4 control-label text-right cut-text m-0 p-1 text-black"><strong>Imagen:
                                </strong></label>
                            <input type="file" name="image" class="col-6 form-control-file" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 m-auto text-center">
                        {{-- <button type="submit" class="btn btn-danger btn-lg">Actualizar</button> --}}
                        <input type="submit" value="Guardar" class="btn btn-warning w-25">
                        <a href="{{ route('products.index') }}" class="btn btn-success w-25">Atrás</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection