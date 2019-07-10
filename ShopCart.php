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

            if (is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){
                $precio=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje.="Ok Precio: ".$precio."<br>";
            }else{$mensaje.='Error, algo pasa con el precio'."<br>"; break;}

            if (!isset($_SESSION['CARRITO'])){
                $producto=array(
                    'ID'=>$ID,
                    'Nombre'=>$nombre,
                    'Precio'=>$precio
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje="Producto agregado al carrito";
            }  else {

                $idProductos=array_column($_SESSION['CARRITO'],"ID");

                if(in_array($ID,$idProductos)){
                    
                    $mensaje="El producto ya se encuentra en el carrito";
                    var_dump($_SESSION['CARRITO']);
                }else{
                
                $numeroProductos=count($_SESSION['CARRITO']);
                $producto=array(
                    'ID'=>$ID,
                    'Nombre'=>$nombre,
                    'Cantidad'=>1,
                    'Precio'=>$precio
                );
                $_SESSION['CARRITO'][$numeroProductos]=$producto;
                $mensaje="Producto agregado al carrito";
                }
            }

            // $mensaje=print_r($_SESSION,true);
             
        break;

        case "Eliminar":
            if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                foreach($_SESSION['CARRITO'] as $key => $producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['CARRITO'][$key]);
                        echo "<script>Alert('Elemento Borrado ...')</script>";
                    }
                }                
            }else{$mensaje.='Error, ID incorrecto'."<br>";}

    }
}
