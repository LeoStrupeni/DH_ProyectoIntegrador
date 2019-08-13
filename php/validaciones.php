<?php

session_start();

$mensaje=''; 

if (isset($_GET['btnAccion'])) {
    switch ($_GET['btnAccion']) {
        case 'Agregar':
            if (!isset($_SESSION['CARRITO'])) {
                $sentencia = $pdo->prepare('SELECT * FROM productos where ID=' . $_GET['id']);
                $sentencia->execute();
                $eleccion = $sentencia->fetch(PDO::FETCH_ASSOC);

                $producto = array(
                    'ID' => $eleccion['ID'],
                    'Nombre' => $eleccion['Name'],
                    'Cantidad' => $_GET['cantidad'],
                    'Precio' => $eleccion['Precio']
                );

                $_SESSION['CARRITO'][0] = $producto;
                $mensaje = "Producto agregado al carrito";
                $_SESSION['mensaje'] = $mensaje;
            } else {

                $idProductos = array_column($_SESSION['CARRITO'], "ID");

                if (in_array($_GET['id'], $idProductos)) {
                    $_SESSION['mensaje'] = "El producto ya se encuentra en el carrito";
                } else {

                    $numeroProductos = count($_SESSION['CARRITO']);
                    $sentencia = $pdo->prepare('SELECT * FROM productos where ID=' . $_GET['id']);
                    $sentencia->execute();
                    $eleccion = $sentencia->fetch(PDO::FETCH_ASSOC);

                    $producto = array(
                        'ID' => $eleccion['ID'],
                        'Nombre' => $eleccion['Name'],
                        'Cantidad' => $_GET['cantidad'],
                        'Precio' => $eleccion['Precio']
                    );

                    $_SESSION['CARRITO'][$numeroProductos] = $producto;
                    $mensaje = "Producto agregado al carrito";
                    $_SESSION['mensaje'] = $mensaje;
                }
            }
            header("Location: Busqueda.php");    
        break;

        case "Eliminar":
            if (is_numeric($_GET['id'])) {
                $ID = $_GET['id'];
                foreach ($_SESSION['CARRITO'] as $key => $producto) {
                    if ($producto['ID'] == $ID) {
                        unset($_SESSION['CARRITO'][$key]);
                        echo "<script>Alert('Elemento Borrado ...')</script>";
                    }
                }               
            }else{$mensaje.='Error, ID incorrecto'."<br>";}
            header("Location: Carrito.php"); 
    }
}
