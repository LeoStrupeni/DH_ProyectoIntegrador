<?php
include "php/conexion.php";
include "carrito.php";
?>

<!DOCTYPE html >

<html lang="es" dir="ltr">

<?php
$nombre = "Shop";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/nav.php" ?>
    <hr>
    <div class="container">
        <br>
        <div class="alert alert-secondary" role="alert">
            <?php echo $mensaje;?>
            <a href="" class="badge badge-secondary">Ver Carrito</a>
        </div>
        <div class="row">
            <?php
                $consulta = $pdo -> prepare("Select * from tblproductos");
                $consulta->execute();
                $productos = $consulta->fetchall(PDO::FETCH_ASSOC);
            ?>

            <?php foreach ($productos as $producto) :?>
            
                <div class="col-3">
                    <div class="card bg-transparent border-0">
                        <img title=<?=$producto['Nombre']?> alt=<?=$producto['Nombre']?> class="card-img-top w-50 m-auto" src=<?='images/'.$producto['Imagen']?> data-toggle="popover" data-placement="right" data-trigger="hover" data-content=<?=$producto['Descripcion']?>>
                        <div class="card-body text-center">
                            <h5 class="card-title mb-0"><?=$producto['Nombre']?></h5> <br>
                            <p class="card-text">Precio: $ <?=$producto['Precio']?></p>

                            <form action="shop.php" method="post">
                                <input type="text" name="id" id="id" value="<?= $producto['ID'] ?>">
                                <input type="text" name="nombre" id="nombre" value="<?=$producto['Nombre']?>">
                                <input type="text" name="precio" id="precio" value="<?=$producto['Precio']?>">
                                <input type="text" name="cantidad" id="cantidad" value="<?= 1?>">
                                
                                <button class="btn btn-primary" name="btnAccion" values="Agregar" type="submit">
                                    Agregar al carrito
                                </button>
                            </form>


                            
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
        </div>

    </div>
    <?php require_once "shared/bts-js.php" ?>   

    <script>
        $(function () {
        $('.example-popover').popover({
            container: 'body'
        })
        })
    </script>    

</body>

</html>