<?php

$mensaje="";

if(isset($_POST['btnAccion'])){
    switch($_POST['btnAccion']) {
        case 'Agregar':
            if(is_numeric($_POST['id'])){
                $ID=$_POST['id'];
                $mensaje='Ok ID correcto'.$ID;
            }else{
                $mensaje='Upss... ID incorrecto'.$ID;
            }
        break;

    }
};


?>