<?php
include 'global/config.php';
include 'global/conexion.php';

include 'ShopCart.php';
?>

<!DOCTYPE html >

<html lang="es" dir="ltr">

<?php
$nombre = "Shop";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/nav-test.php" ?>
    <hr>
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
            <?php foreach ($listaProductos as $producto) :?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1">
                <div class="card text-center">
                    <img 
                    title = "<?=$producto['Name']?>"
                    alt="<?=$producto['Name']?>" 
                    class="card-img-top p-1 m-auto"
                    src=<?='images/Bebidas/'.$producto['imagen']?>
                    data-toggle="popover"
                    data-trigger="hover"
                    data-content="<?=$producto['Descripcion']?>"
                    height="225px">
                    <div class="card-body">
                        <h6 class="card-title"><?=$producto['Name']?></h6>
                        <h5 class="card-title"><?=$producto['Precio']?></h5>    

                        <form method="post" action="">
                            <input type="hidden" name="id" id="id" value="<?=openssl_encrypt($producto['idProductos'],COD,KEY)?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?=openssl_encrypt($producto['Name'],COD,KEY)?>">
                            <input type="hidden" name="precio" id="precio" value="<?=openssl_encrypt($producto['Precio'],COD,KEY)?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?=openssl_encrypt(1,COD,KEY)?>"> 

                            <button class="btn btn-primary" type="submit" name="btnAccion" value="Agregar">
                                Agregar al Carrito
                            </button>                            
                        </form>



                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
    </script>

</body>

</html>