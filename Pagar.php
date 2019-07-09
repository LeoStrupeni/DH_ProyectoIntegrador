<?php
require_once 'global/config.php';
require_once 'global/conexion.php';

require_once 'ShopCart.php';

if ($_POST) {

    $total = 0;
    $SID = session_id();
    $correo = $_POST['email'];

    foreach ($_SESSION['CARRITO'] as $key => $producto) {
        $total = $total + ($producto['Precio'] * $producto['Cantidad']);
    }

    $sentencia = $pdo->prepare("INSERT INTO `ventas` (`IdVentas`, `ClaveTransaccion`, `DatosPago`, `Fecha`, `Correo`, `Total`, `Estado`) 
                                VALUES (NULL, :ClaveTransaccion, '', now(), :Correo, :Total, 'Pendiente');");
    $sentencia->bindValue(":ClaveTransaccion", $SID);
    $sentencia->bindValue(":Correo", $correo);
    $sentencia->bindValue(":Total", $total);
    $sentencia->execute();
    $idVenta = $pdo->lastInsertId();

    foreach ($_SESSION['CARRITO'] as $key => $producto) {

        $sentenciadetalle = $pdo->prepare("INSERT INTO `ventasdetalles` (`IdVentaDetalle`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
                                VALUES (NULL, :idVenta, :idProducto, :precioUni, :cantidad, '0');");
        $sentenciadetalle->bindValue(":idVenta", $idVenta);
        $sentenciadetalle->bindValue(":idProducto", $producto['ID']);
        $sentenciadetalle->bindValue(":precioUni", $producto['Precio']);
        $sentenciadetalle->bindValue(":cantidad", $producto['Cantidad']);
        $sentenciadetalle->execute();
    }
}
?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<?php
$nombre = "Shop";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/nav.php" ?>
    <hr>



    <div class="jumbotron text-center bg-info">
        <h1 class="display-4">¡Paso Final!</h1>
        <hr class="my-4">
        <p class="lead">Estas a punto de pagar la cantidad de : <h4>$ <?= number_format($total, 2); ?></h4>
        </p>
        <button type="button" class="btn btn-warning btn-lg m-2">PAGAR</button>
        <p>Los productos seran procesados para envio una vez que se confirme el pago <br>
            <strong>(Para aclaraciones complete el formulario de contacto)</strong></p>
    </div>


</body>

</html>