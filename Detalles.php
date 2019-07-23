<?php
require_once 'global/config.php';
require_once 'global/conexion.php';

require_once 'ShopCart.php';
?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<?php
$nombre = "Detalle";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/navbar.php" ?>
    <div class="container">
        <?php
        $sentencia = $pdo->prepare('SELECT * FROM productos where `idProductos`=' . $_GET['id']);
        $sentencia->execute();
        $producto = $sentencia->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="row">
            <div class="col-12 col-sm-3">
                <img src="<?= 'images/Bebidas/' . $producto['imagen'] ?>" class="rounded mx-auto d-block" alt="Responsive image">
            </div>

            <div class="col-12 col-sm-9">

                <table class="table table-sm table-dark">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2" class="text-center h5"><?= $producto['Name'] ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Descripcion</th>
                            <td><?= $producto['Descripcion'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Precio</th>
                            <td><?= $producto['Precio'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Graduacion</th>
                            <td><?= $producto['Graduacion'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Origen</th>
                            <td><?= $producto['Origen'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Año</th>
                            <td><?= $producto['Año'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Volumen(ml)</th>
                            <td><?= $producto['Volumen'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Marca</th>
                            <td><?= $producto['Marcas_idMarcas'] ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>


    </div>
</body>

</html>