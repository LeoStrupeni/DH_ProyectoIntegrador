<?php
include 'global/config.php';
include 'ShopCart.php';
?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<?php
$nombre = "Carrito";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/nav-test.php" ?>

    <br>

    <div class="row">
        <div class="col-12 col-lg-10 m-auto">
    
            <?php if (!empty($_SESSION['CARRITO'])) : ?>

                <table class="table table-primary">
                    <tbody>
                        <tr>
                            <th width="40%">Descripcion</th>
                            <th width="15%" class="text-center">Cantidad</th>
                            <th width="20%" class="text-center">Precio</th>
                            <th width="20%" class="text-center">Total</th>
                            <th width="5%">Eliminar</th>
                        </tr>
                        <?php $total = 0; ?>
                        <?php foreach ($_SESSION['CARRITO'] as $key => $producto) : ?>
                            <tr>
                                <td width="40%"><?= $producto['Nombre'] ?></td>
                                <td width="15%" class="text-center"><?= $producto['Cantidad'] ?></td>
                                <td width="20%" class="text-center"><?= $producto['Precio'] ?></td>
                                <td width="20%" class="text-center"><?= number_format($producto['Precio'] * $producto['Cantidad'], 2) ?></td>
                                <td width="5%">

                                    <form method="get" action="">
                                        <input type="hidden" name="id" id="id" value="<?= $producto['ID'] ?>">
                                        <button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
                                    </form>


                                </td>
                            </tr>

                            <?php $total = $total + ($producto['Precio'] * 1); ?>

                        <?php endforeach; ?>

                        <tr>
                            <td colspan="3" align="right">
                                <h3>Total</h3>
                            </td>
                            <td align="right">
                                <h3 class="text-center"><?= number_format($total, 2) ?></h3>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td colspan="5">
                                <form method="post" action="pagar.php">
                                    <div class="alert alert-success">
                                        <div class="form-group">
                                            <label for="my-input">Correo de contacto: </label>
                                            <input id="email" name="email" class="form-control" type="email" required>
                                        </div>
                                        <small id="emailHelp" class="form-text text-muted">Confirmacion de envio</small>
                                    </div>
                                    <button class="btn btn-primary btn-lg btn-block" type="submit" value="proceder" name="btnAccion">Proceder a Pagar</button>
                                </form>

                            </td>
                        </tr>

                    </tbody>
                </table>

            <?php else : ?>
                <div class="alert alert-warning" role="alert">
                    No hay productos en el carrito
                </div>

            <?php endif; ?>


        </div>
    </div>

</body>

</html>