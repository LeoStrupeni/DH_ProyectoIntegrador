<?php
include 'global/config.php';
include 'global/conexion.php';


if($_GET){
    // var_dump($_GET);exit;

    $eliminar = $pdo->prepare('DELETE FROM productos_usuarios WHERE idProductos = :idproducto');
    $eliminar->bindparam(':idproducto',$_GET['id']);   
    $eliminar->execute(); 

    header('Location: perfil.php');
}



?>