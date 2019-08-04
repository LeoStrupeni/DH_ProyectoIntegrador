<?php
require_once 'global/config.php';
require_once 'global/conexion.php';
require_once 'global/autoload.php';

if ($_POST) {
        $errores = Validation::vUserToRegister($_POST);
        var_dump($errores);
}

?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<?php
$nombre = "Titulo";
require_once "shared/head.php"
?>



<body>
        <?php require_once "shared/navbar.php" ?>

        <div class="container-fluid">

                <?php require_once "shared/main.php" ?>

                <?php require_once "shared/bts-js.php" ?>

                <?php require_once "shared/footer.php" ?>

                <?php require_once "./modals/modal-newsletter.php"?>
        </div>

</body>

</html>