<?php
include 'global/config.php';
include 'global/conexion.php';

include 'ShopCart.php';
?>

<!DOCTYPE html >

<html lang="es" dir="ltr">

<?php
$nombre = "Detalle";
require_once "shared/head.php"
?>  

<body>
    <?php require_once "shared/nav.php" ?>
    <div class="container">
        <div class="row">
            <?php 
                $sentencia=$pdo->prepare('SELECT * FROM productos where `idProductos`='.$_POST['id']);
                $sentencia->execute();
                $producto=$sentencia->fetch(PDO::FETCH_ASSOC);   
            ?>

            <div class="card mb-3 m-auto" style="width: 75%;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?='images/Bebidas/'.$producto['imagen']?>" class="card-img" alt="..." height="80%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-center"><?=$producto['Name']?></h5>

                            <table class="table table-sm table-dark">
                                <tbody>
                                    <tr>
                                    <th scope="row">Descripcion</th>
                                    <td><?=$producto['Descripcion']?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Precio/th>
                                    <td><?="Precio: ".$producto['Precio']?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Graduacion</th>
                                    <td><?=$producto['Graduacion']?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Origen</th>
                                    <td><?=$producto['Origen']?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Año</th>
                                    <td><?=$producto['Año']?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Volumen(ml)</th>
                                    <td><?=$producto['Volumen']?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Marca</th>
                                    <td><?=$producto['Marcas_idMarcas']?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   
        </div>
    </div>
    <?php require_once "shared/footer.php" ?>
</body>

</html>

