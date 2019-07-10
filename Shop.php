<?php
include 'global/config.php';
include 'global/conexion.php';

include 'ShopCart.php';
?>

<!DOCTYPE html >

<html lang="es" dir="ltr">

<?php $nombre = "Shop"; ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?php echo $nombre; ?></title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

</head>

<body>
    <?php require_once "shared/nav-test.php" ?>
    <div class="container">
        <br>    
        
        <?php if($mensaje!="") :?>
            <div class="alert alert-secondary">
                <?=$mensaje?>
                <a href="ShopViewCart.php" class="badge badge-success"> Ver Carrito</a>
            </div>
        <?php endif;?>
        
        <div class="row">
            <?php 
                $sentencia=$pdo->prepare('SELECT * FROM productos');
                $sentencia->execute();
                $listaProductos=$sentencia->fetchall(PDO::FETCH_ASSOC);               
            ?>
            <div class="col m-auto table-responsive">
                <table class="table table-secondary">
                    <tbody>
                        <tr>    
                            <th width="10%" class="text-center">Imagen</th>
                            <th width="50%" class="text-center">Nombre</th>
                            <th width="20%" class="text-center">Precio</th>
                            <th width="20%"></th>
                        </tr>
                        
                        <?php foreach ($listaProductos as $producto) :?>
                        
                        <tr>
                            <td width="10%">
                                <img title = "<?=$producto['Name']?>" alt="<?=$producto['Name']?>" src=<?='images/Bebidas/'.$producto['imagen']?> 
                                class="mx-auto d-block" max-width="90%" height="100px">
                            </td>
                            <td width="50%">
                                <h6 data-toggle="popover" data-placement="bottom" data-trigger="hover" data-content="<?=$producto['Descripcion']?>">
                                    <?=$producto['Name']?>
                                </h6>
                            </td>
                            <td width="20%" class="text-center"><h5 class=""><?=$producto['Precio']?></h5></td>
                            <!-- <td width="10%">
                                <input type="number" min="1" class="w-100">
                            </td> -->
                            <td width="20%" class="text-center">
                                <form method="post" action="shop.php">
                                    <input type="hidden" name="id" id="id" value="<?=openssl_encrypt($producto['idProductos'],COD,KEY)?>">
                                    <input type="hidden" name="nombre" id="nombre" value="<?=openssl_encrypt($producto['Name'],COD,KEY)?>">
                                    <input type="hidden" name="precio" id="precio" value="<?=openssl_encrypt($producto['Precio'],COD,KEY)?>">
                                    <button class="btn btn-primary w-100 m-1" type="submit" name="btnAccion" value="Agregar">
                                        Agregar
                                    </button>
                                </form>
                                <form method="post" action="detalles.php">
                                    <input type="hidden" name="id" id="id" value="<?=$producto['idProductos']?>">
                                    <button class="btn btn-success w-100 m-1" type="submit" name="" value="">
                                        + Detalles
                                    </button>
                                </form>
                                
                            </td>
                        </tr>

                        <?php endforeach;?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <nav class="navbar fixed-bottom navbar-expand-md navbar-dark bg-black">
        <p class="navbar-brand">Filtros</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marca
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tipo
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Graduacion            
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Origen
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Precio
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Volumen
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>       
    </nav>

    <?php require_once "shared/footer.php" ?>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
    </script>

</body>

</html>