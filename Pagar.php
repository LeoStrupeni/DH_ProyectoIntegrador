<?php
include 'global/config.php';
include 'global/conexion.php';

include 'ShopCart.php';

    if($_POST){
        $total=0;
        $SID=session_id();
        $correo=$_POST['email'];
        
        foreach($_SESSION['CARRITO'] as $key => $producto){
            $total=$total+($producto['Precio']*$producto['Cantidad']);
            }

        $sentencia=$pdo->prepare("INSERT INTO `TempVentas` (`ID`, `ClaveTransaccion`, `DatosPago`, `Fecha`, `Correo`, `Total`, `Status`) VALUES (NULL, :ClaveTransaccion, '', NOW() , :Correo, :Total, 'pendiente');");
        
        $sentencia->bindparam(":ClaveTransaccion",$SID);
        $sentencia->bindparam(":Correo",$correo);
        $sentencia->bindparam(":Total",$total);
        $sentencia->execute();

        $idVenta=$pdo->lastInsertId();

        foreach($_SESSION['CARRITO'] as $key => $producto){
            $sentencia=$pdo->prepare("INSERT INTO `ventasdetalles` (`IdVentaDetalle`, `IDVENTA`, `IDPRODUCTO`, `PRECIOUNITARIO`, `CANTIDAD`, `DESCARGADO`)  VALUES (NULL, :IDVENTA, :IDPRODUCTO, :PRECIOUNITARIO , :CANTIDAD, '0');");

            $sentencia->bindparam(":IDVENTA",$idVenta);
            $sentencia->bindparam(":IDPRODUCTO",$producto['ID']);
            $sentencia->bindparam(":PRECIOUNITARIO",$producto['Precio']);
            $sentencia->bindparam(":CANTIDAD",$producto['Cantidad']);
            
            $sentencia->execute();

        }

        echo "<h3>".$total."</h3>";
        
    }
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

</body>

</html>