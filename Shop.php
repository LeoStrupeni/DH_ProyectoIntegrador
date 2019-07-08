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
    <?php require_once "shared/nav.php" ?>
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
            <div class="col-lg-10 m-auto table-responsive">
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
                                <img title = "<?=$producto['Name']?>" alt="<?=$producto['Name']?>" class="p-1 m-auto" src=<?='images/Bebidas/'.$producto['imagen']?> height="50%">
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
                                    <input type="hidden" name="cantidad" id="cantidad" value="<?=openssl_encrypt(1,COD,KEY)?>"> 
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
    <?php require_once "shared/footer.php" ?>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
    </script>

</body>

</html>