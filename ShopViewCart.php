<?php
include 'global/config.php';
include 'ShopCart.php';
?>

<!DOCTYPE html >

<html lang="es" dir="ltr">

<?php
$nombre = "Carrito";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/nav.php" ?>

    <br>
    
    <div class="row">
        <div class="col-10 m-auto">
            <h3 class="text-white">Lista de Carrito</h3>
            <?php if(!empty($_SESSION['CARRITO'])) :?>
            
            <table class="table table-primary">
                <tbody>
                    <tr>    
                        <th width="40%">Descripcion</th>
                        <th width="15%" class="text-center">Cantidad</th>
                        <th width="20%" class="text-center">Precio</th>
                        <th width="20%" class="text-center">Total</th>
                        <th width="5%" >Eliminar</th>
                    </tr>
                    <?php $total=0;?>
                    <?php foreach($_SESSION['CARRITO'] as $key => $producto):?>
                    <tr>
                        <td width="40%"><?=$producto['Nombre']?></td>
                        <td width="15%" class="text-center"><?=$producto['Cantidad']?></td>
                        <td width="20%" class="text-center"><?=$producto['Precio']?></td>
                        <td width="20%" class="text-center"><?=number_format($producto['Precio']*$producto['Cantidad'],2)?></td>
                        <td width="5%"><button class="btn btn-danger" type="button">Eliminar</button></td>
                    </tr>
                    
                    <?php $total=$total+($producto['Precio']*$producto['Cantidad']);?>

                    <?php endforeach;?>
                    
                    <tr>
                        <td colspan="3" align="right"><h3>Total</h3></td>
                        <td align="right"><h3 class="text-center"><?=number_format($total,2)?></h3></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <?php else :?>
            <div class="alert alert-success" role="alert">
                No hay productos en el carrito
            </div>
    
            <?php endif; ?>


        </div>
    </div>
    
</body>

</html>