<?php
include 'global/config.php';
include 'ShopCart.php';
?>

<!DOCTYPE html>

<html lang="es" dir="ltr">


<?php $nombre = "Carrito"; ?>

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
                                <td width="15%" class="text-center">1</td>
                                <td width="20%" class="text-center"><?= $producto['Precio'] ?></td>
                                <td width="20%" class="text-center"><?= number_format($producto['Precio'] * 1, 2) ?></td>
                                <td width="5%">

                                    <form method="post" action="">
                                        <input type="hidden" name="id" id="id" value="<?= openssl_encrypt($producto['ID'], COD, KEY) ?>">
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