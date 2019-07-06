<?php
session_start();

$mensaje="";

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']) {
        case 'Agregar':
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje.='Ok ID: '.$ID."<br>";
            }else{$mensaje.='Error, ID incorrecto'."<br>";}
            
            if (is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){
                $nombre=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje.="Ok Nombre: ".$nombre."<br>";
            }else{$mensaje.='Error, algo pasa con el Nombre'."<br>"; break;}

            if (is_numeric(openssl_decrypt($_POST['cantidad'],COD,KEY))){
                $cantidad=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje.="Ok Cantidad; ".$cantidad."<br>";
            }else{$mensaje.='Error, algo paso con la cantidad'."<br>"; break;}

            if (is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $precio=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="Ok Precio: ".$precio."<br>";
            }else{$mensaje.='Error, algo pasa con el precio'."<br>"; break;}

            if (!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'ID'=>$ID,
                    'Nombre'=>$nombre,
                    'Cantidad'=>$cantidad,
                    'Precio'=>$precio
                );
                $_SESSION['CARRITO'][0]=$producto;
            }  else {
                $numeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'Nombre'=>$nombre,
                    'Cantidad'=>$cantidad,
                    'Precio'=>$precio
                );
                $_SESSION['CARRITO'][$numeroProductos]=$producto;
            }

            $mensaje=print_r($_SESSION,true);
        break;
    }
}

?>