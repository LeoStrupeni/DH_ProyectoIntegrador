<?php
include 'global/config.php';
include 'global/conexion.php';
require_once 'global/autoload.php';
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

        <?php $producto = DB::getProductByID($_GET['id']); ?>

        <div class="row">
            <div class="col-12 col-sm-3">
                <img src=<?php if (is_file('images/Bebidas/' . $producto->getImagen() . '.jpg')) : ?> <?= 'images/Bebidas/' . $producto->getImagen() . '.jpg' ?> <?php else : ?> <?= 'images/Bebidas/imgND.jpg' ?> <?php endif; ?> class=" rounded mx-auto d-block" alt="Responsive image">
            </div>

            <div class="col-12 col-sm-9">

                <table class="table table-sm table-dark">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2" class="text-center h5">
                                <?= $producto->getName(); ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Descripcion</th>
                            <td><?= $producto->getDescripcion(); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Precio</th>
                            <td><?= $producto->getPrecio(); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Graduacion</th>
                            <td><?= $producto->getGraduacion(); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Origen</th>
                            <td><?= $producto->getOrigen(); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Año</th>
                            <td><?= $producto->getAnio(); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Volumen(ml)</th>
                            <td><?= $producto->getVolumen(); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Marca</th>
                            <td><?= $producto->getidMarcas(); ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

        <div class="row p-2 mb-2 footer-1">
            <h4 class="m-auto">Productos relacionados</h4>
        </div>

        <?php $listaProductos = DB::getProductsWithSimilarCategory($producto); ?>

        <div class="row">
            <?php foreach ($listaProductos as $producto) : ?>
                <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-1">
                    <div class="card bg-transparent border border-dark rounded-lg">
                        <h4 class="text-center p-1 cut-text"> <?= $producto->getName(); ?></h4>
                        <img title="<?= $producto->getName(); ?>" alt="<?= $producto->getName(); ?>" src=<?php if (is_file('images/Bebidas/' . $producto->getImagen() . '.jpg')) : ?> <?= 'images/Bebidas/' . $producto->getImagen() . '.jpg' ?> <?php else : ?> <?= 'images/Bebidas/imgND.jpg' ?> <?php endif; ?> data-toggle="popover" data-trigger="hover" data-content="<?= substr($producto->getDescripcion(), 0, 500) . '...' ?>" class="card-img p-1" style="z-index: 10;">
                        <div class="card-img-overlay text-right mt-5">

                            <h4><?= "$ " . $producto->getPrecio(); ?></h4>

                            <form method="get" action="Busqueda.php">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" min="1" class="text-right w-25" value="1" id="cantidad" name="cantidad" required>
                                </div>
                                <input type="hidden" name="id" id="id" value="<?= $producto->getIdProducto(); ?>">
                                <button class="btn btn-success w-50 mb-1" type="submit" name="btnAccion" value="Agregar">
                                    Agregar
                                </button>
                            </form>

                            <form method="get" action="detalles.php">
                                <input type="hidden" name="id" id="id" value="<?= $producto->getIdProducto(); ?>">
                                <button class="btn btn-warning w-50" type="submit">
                                    + Detalles
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php require_once "shared/footer.php" ?>
    </div>


    <?php require_once "shared/bts-js.php" ?>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>
</body>

</html>