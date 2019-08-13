<!DOCTYPE html>
<html lang="es" dir="ltr">

<?php

$nombre = "Perfil usuario";
require_once "shared/head.php";
require_once "global/autoload.php";

session_start();

?>

<?php require_once "shared/navbar.php" ?>


<body>
    <div class="container pt-2">
        <div class="row">
            <div class="col-sm-12">
                <img src="images/profile-placeholder.png" alt="Perfil" class="img-fluid mx-auto d-block rounded-circle perfil">
            </div>
            <div class="col-sm-12">
                <h1 class="text-center">Hola,
                    <?=$_SESSION['Usuario']->getNombre();?>
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-controls="billing" aria-selected="false">Facturacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="productos-tab" data-toggle="tab" href="#productos" role="tab" aria-controls="productos" aria-selected="false">Mis Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="alta-tab" data-toggle="tab" href="#alta" role="tab" aria-controls="alta" aria-selected="false">Altas Productos</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form class="mt-1" action="" method="post">
                            <div class="form-group">
                                <label for="username">Nombre de Usuario</label>
                                <input class="form-control" type="text" placeholder="Username" readonly>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" placeholder="Su nombre..." value="<?= $_SESSION['Usuario']->getNombre(); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" placeholder="Su apellido..." value="<?= $_SESSION['Usuario']->getApellido(); ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email" class="form-control" placeholder="nombre@email.com" value="<?= $_SESSION['Usuario']->getEmail(); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tel">Numero de telefono</label>
                                    <input type="tel" name="" id="" class="form-control" placeholder="+549..." value="<?= $_SESSION['Usuario']->getTelefono(); ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="imagen-perfil">Foto de perfil</label>
                                <input type="file" class="form-control-file">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                        <form action="" class="mt-1" method="post">
                            <div class="form-group">
                                <label for="tipo-comerciante">Tipo de Comerciante</label>
                                <select class="custom-select">
                                    <option selected>Tipo...</option>
                                    <option value="4">Minorista</option>
                                    <option value="3">Mayorista</option>
                                    <option value="5">Consumidor final</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="direccion-envio">Direccion de facturacion</label>
                                <input type="text" name="" id="" placeholder="Direccion..." class="form-control" value="<?= $_SESSION['Usuario']->getCalle(); ?>">
                                <small class="form-text text-muted">Solamente aplicable como direccion de
                                    facturacion!</small>
                            </div>
                            <div class="form-group">
                                <label for="tarjetas">Tarjetas asociadas</label>
                                <input type="text" name="" id="" placeholder="Mostrar tarjetas asociadas..." class="form-control">
                            </div>
                        </form>
                    </div>
                
                    <div class="tab-pane fade" id="productos" role="tabpanel" aria-labelledby="productos-tab">
                        <?php require_once 'abm.php'; ?>
                    </div>

                    <div class="tab-pane fade" id="alta" role="tabpanel" aria-labelledby="alta-tab">
                        <?php require_once 'Abm_addProduct.php'; ?>
                    </div>
              
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 text-center my-2">
                <button type="button" class="btn btn-success">Guardar</button>
            </div>
        </div>
        
        <?php require_once "shared/footer.php" ?>

    </div>


</body>

<?php require_once "shared/bts-js.php" ?>


</html>