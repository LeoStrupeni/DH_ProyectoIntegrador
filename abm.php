<?php
include 'global/config.php';
include 'global/conexion.php';
$sentencia=$pdo->query("SELECT P.ID,`IdUsuario`,`Name`,`Descripcion`,`Precio`,`Graduacion`,`Origen`,`imagen`,`Anio`,`Volumen`,m.Nombre as Marca ,c.Nombre as Categoria
                        FROM `productos_usuarios` P 
                        INNER JOIN prod_marcas M on P.Marcas_idMarcas = m.ID
                        INNER JOIN prod_categorias C on P.Categoria = c.ID");
$listaProductos=$sentencia->fetchall(PDO::FETCH_ASSOC);  

// var_dump($listaProductos);exit;

$mensaje=null;
if(!$listaProductos){
	$mensaje .= 'NO HAY PRODUCTOS PARA MOSTRAR';
}
?>

    <div class="row my-2">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="row mt-2 p-1">
                    <div class="col-md-10 m-0 h3 text-center">
                        Listado Productos
                    </div>
                    <div class="col-md-2">
                        <a type="button" href="Abm_addProduct.php" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>
                    </div>    
                </div> -->
                   
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover table-striped">
                        <thead class="text-center">
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Grad.</th>
                            <th>Origen</th>
                            <th>Año</th>
                            <th>Volumen</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Editar</th>
                        </thead>
                        <tbody>

                            <?php foreach ($listaProductos as $Sql): ?>
                                <tr>
                                    <td class="cut-text"><?=$Sql['Name'];?></td>
                                    <td class="cut-text"><?=substr($Sql['Descripcion'],0,15)."...";?></td>
                                    <td class="cut-text text-center"><?="$ ".ROUND($Sql['Precio'],0);?></td>
                                    <td class="cut-text text-center"><?=ROUND($Sql['Graduacion'],0)." %";?></td>
                                    <td class="cut-text"><?=$Sql['Origen'];?></td>
                                    <td class="cut-text text-center"><?=$Sql['Anio'];?></td>
                                    <td class="cut-text text-center"><?=$Sql['Volumen']." ml";?></td>
                                    <td class="cut-text text-center"><?=$Sql['Marca'];?></td>
                                    <td class="cut-text text-center"><?=$Sql['Categoria'];?></td>

                                    <td class="text-center">
                                        <a href="" class='btn btn-warning btn-sm'><i class='fa fa-pencil-alt' aria-hidden='true'></i></a>
                                        <a href="Abm_deleteProduct.php?id=<?=$Sql['ID']?>" class='btn btn-danger btn-sm'><i class='fa fa-trash-alt' aria-hidden='true'></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php  if(!empty($mensaje)): ?>
                        <div class="alert alert-danger">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php  endif; ?>
                </div>
            </div>
        </div>
    </div>
 