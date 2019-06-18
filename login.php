<!DOCTYPE html>

<html>

<?php
$nombre = "Login";
require_once "shared/head.php"
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-right">
                <a class="text-light" href="index.php">Volver a Pagina Inicio</a>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card bg-black" style="max-width: 760px;">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="images/Bienvenida.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-6 m-auto">
                    <form action="index.php" class="text-light form ml-4 mr-4">
                        <div class="form-group">
                            <label for="email">EMAIL</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">CONTRASEÑA</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div>
                            <input type="checkbox" name="Recordar" value="recuerdo" checked>Recordame
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-secondary active">ENTRAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "shared/bts-js.php" ?>
</body>

</html>