<?php
require_once 'global/config.php';
require_once 'global/conexion.php';
require_once 'ShopCart.php';
?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<?php
$nombre = "Titulo";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/navbar.php" ?>
    <div class="container">
        <br>
        <?php if (!empty($_SESSION['mensaje'])) : ?>
            <div class="alert alert-secondary">
                <?= $_SESSION['mensaje'] ?>
                <a href="ShopViewCart.php" class="badge badge-success"> Ver Carrito</a>
            </div>
        <?php endif; ?>

        <!-- Averiguar como vaciar en este punto la $_SESSION['mensaje'] -->

        <div class="row">
            <?php
            $sentencia = $pdo->prepare('SELECT * FROM productos');
            $sentencia->execute();
            $listaProductos = $sentencia->fetchall(PDO::FETCH_ASSOC);
            ?>

            <?php foreach ($listaProductos as $producto) : ?>
                <div class="col-10 col-sm-6 col-md-4 col-lg-3 border border-dark rounded-lg p-1">
                    <div class="card bg-transparent mb-2">
                        <h4 class="text-center"> <?= $producto['Name'] ?> </h4>
                        <img title="<?= $producto['Name'] ?>" alt="<?= $producto['Name'] ?>" src=<?= 'images/Bebidas/' . $producto['imagen'] ?> data-toggle="popover" data-trigger="hover" data-content="<?= $producto['Descripcion'] ?>" class="card-img" style="z-index: 10;">
                        <!-- Tuve que agregar style= z-index porque la imagen quedaba detras de los botones y no se abria el popover -->
                        <div class="card-img-overlay text-right mt-5">
                            <h4 class=""><?= "$ " . $producto['Precio'] ?></h4>
                            <form method="get" action="Shop.php">
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


    <nav class="navbar fixed-bottom navbar-expand-md navbar-dark bg-black">
        <p class="navbar-brand">Filtros</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marca
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tipo
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Graduacion
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Origen
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Precio
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Volumen
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
    </nav>

    <?php require_once "shared/footer.php" ?>

    <?php require_once "shared/bts-js.php" ?>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>

</body>

</html>