idCategoriaPadre<?php
require_once 'global/config.php';
require_once 'global/conexion.php';

require_once 'ShopCart.php';

if ($_POST) {

    $total = 0;
    $SID = session_id();
    $correo = $_POST['email'];

    foreach ($_SESSION['CARRITO'] as $key => $producto) {
        $total = $total + ($producto['Precio'] * 1);
    }

    $sentencia = $pdo->prepare("INSERT INTO `ventas` (`ID`, `ClaveTransaccion`, `DatosPago`, `Fecha`, `Correo`, `Total`, `Estado`) 
                                VALUES (NULL, :ClaveTransaccion, '', now(), :Correo, :Total, 'Pendiente');");
    $sentencia->bindValue(":ClaveTransaccion", $SID);
    $sentencia->bindValue(":Correo", $correo);
    $sentencia->bindValue(":Total", $total);
    $sentencia->execute();
    $idVenta = $pdo->lastInsertId();

    foreach ($_SESSION['CARRITO'] as $key => $producto) {

        $sentenciadetalle = $pdo->prepare("INSERT INTO `ventasdetalles` (`ID`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`) 
                                VALUES (NULL, :ID, :idProducto, :precioUni, :cantidad, '0');");
        $sentenciadetalle->bindValue(":ID", $idVenta);
        $sentenciadetalle->bindValue(":idProducto", $producto['ID']);
        $sentenciadetalle->bindValue(":precioUni", $producto['Precio']);
        $sentenciadetalle->bindValue(":cantidad", 1);
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