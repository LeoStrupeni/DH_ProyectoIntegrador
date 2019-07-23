<?php
include 'global/config.php';
include 'global/conexion.php';
?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<?php
$nombre = "Detalle";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/navbar.php" ?>
    <div class="container">
        <?php
        $sentencia = $pdo->prepare('SELECT * FROM productos where `idProductos`=' . $_GET['id']);
        $sentencia->execute();
        $producto = $sentencia->fetch(PDO::FETCH_ASSOC);
        
        ?>

        <div class="row">
            <div class="col-12 col-sm-3">
                <img src=<?php if (is_file('images/Bebidas/' . $producto['imagen'] . '.jpg')) {
                                echo 'images/Bebidas/' . $producto['imagen'] . '.jpg';
                            } else {
                                echo 'images/Bebidas/imgND.jpg';
                            } ?> class=" rounded mx-auto d-block" alt="Responsive image">
            </div>

            <div class="col-12 col-sm-9">

                <table class="table table-sm table-dark">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2" class="text-center h5"><?= $producto['Name'] ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Descripcion</th>
                            <td><?= $producto['Descripcion'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Precio</th>
                            <td><?= $producto['Precio'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Graduacion</th>
                            <td><?= $producto['Graduacion'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Origen</th>
                            <td><?= $producto['Origen'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Año</th>
                            <td><?= $producto['Año'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Volumen(ml)</th>
                            <td><?= $producto['Volumen'] ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Marca</th>
                            <td><?= $producto['Marcas_idMarcas'] ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

        <?php
        $sentencia = $pdo->prepare('SELECT * FROM productos WHERE Categoria = '.$producto['Categoria'].' ORDER BY RAND() LIMIT 4');
        $sentencia->execute();
        $listaProductos = $sentencia->fetchall(PDO::FETCH_ASSOC);
        ?>

        <div class="row">
            <?php foreach ($listaProductos as $producto) :?>
                <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-1">
                    <div class="card bg-transparent border border-dark rounded-lg"> 
                        <h4 class="text-center p-1 cut-text"> <?=$producto['Name']?></h4>
                        <img title = "<?=$producto['Name']?>" alt="<?=$producto['Name']?>" 
                        src=<?php if(is_file('images/Bebidas/'.$producto['imagen'].'.jpg')){
                                    echo 'images/Bebidas/'.$producto['imagen'].'.jpg';
                                } else {echo 'images/Bebidas/imgND.jpg';}?> 
                        data-toggle="popover" data-trigger="hover" data-content="<?=substr($producto['Descripcion'],0,500).'...'?>"
                        class="card-img p-1" style="z-index: 10;"> 
                        <div class="card-img-overlay text-right mt-5">
                            <h4><?="$ ".$producto['Precio']?></h4>
                            <form method="get" action="Busqueda.php">

                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" min="1" class="text-right w-25" value="1" id="cantidad" name="cantidad" required>
                                </div>
                                <input type="hidden" name="id" id="id" value="<?= $producto['idProductos'] ?>">
                                <button class="btn btn-success w-50 mb-1" type="submit" name="btnAccion" value="Agregar">
                                    Agregar
                                </button>
                            </form>
                            <form method="get" action="detalles.php">
                                <input type="hidden" name="id" id="id" value="<?= $producto['idProductos'] ?>">
                                <button class="btn btn-warning w-50" type="submit" name="" value="">
                                    + Detalles
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php require_once "shared/footer.php" ?>

<?php require_once "shared/bts-js.php" ?>

<script>
    $(function() {
        $('[data-toggle="popover"]').popover()
    });
</script>
</body>

</html>