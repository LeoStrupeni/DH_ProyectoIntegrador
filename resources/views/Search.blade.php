@extends('Plantilla')

@section('Titulo')
    Busqueda
@endsection

@section('Contenido')
    


<div class="container">
        <br>
        <?php if (!empty($_SESSION['mensaje'])) : ?>
            <div class="alert alert-secondary">
                <?=$_SESSION['mensaje']?>
                <a href="carrito.php" class="badge badge-success"> Ver Carrito</a>

            </div>
        <?php endif; ?>

        <!-- Averiguar como vaciar en este punto la $_SESSION['mensaje'] -->

        <div class="row" style="min-height:400px;">
            <?php if (count($products)==0) :?>
            
            <div class="alert alert-secondary w-100 h-25 text-center h4" role="alert">
                No se Encontro ningun producto!
            </div>
            
            <?php endif;?>
            <?php foreach ($products as $producto) :?>

                <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-1">
                    <div class="card bg-transparent border border-dark rounded-lg"> 
                        <h4 class="text-center p-1 cut-text"> <?=$producto['Name']?></h4>
                        <img title = "<?=$producto['Name']?>" alt="<?=$producto['Name']?>" 
                        src="\storage\images\Bebidas\<?=(is_file('storage\images\Bebidas\{{$producto->imagen}}.jpg')) ? 'imgND' : $producto->imagen;?>.jpg"
                        data-toggle="popover" data-trigger="hover" data-content="<?=substr($producto['Descripcion'],0,500).'...'?>"
                        class="card-img p-1 img-fluid" style="z-index: 10;"> 
                        <div class="card-img-overlay text-right mt-5">
                            <h5><?="$ ".$producto['Precio']?></h5>
                            <form method="get" action="Busqueda.php">

                                <div class="form-group">
                                    <label for="cantidad" style="font-size:1vw;">Cantidad</label>
                                    <input type="number" min="1" class="text-right w-25" value="1" id="cantidad" name="cantidad" required>
                                </div>
                                <input type="hidden" name="id" id="id" value="<?= $producto['idProductos'] ?>">
                                <button class="btn btn-success w-50 mb-1" type="submit" name="btnAccion" value="Agregar" style="font-size:1vw;">
                                    Agregar
                                </button>
                            </form>
                            <form method="get" action="detalles.php">
                                <input type="hidden" name="id" id="id" value="<?= $producto['idProductos'] ?>">
                                <button class="btn btn-warning w-50" type="submit" name="" value="" style="font-size:1vw;">
                                    + Detalles
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            {{$products->links()}}
        </div>
    </div>


    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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