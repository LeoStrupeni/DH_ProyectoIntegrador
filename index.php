<?php

require_once 'global/autoload.php';
session_start();

if ($_POST) {
        $errores = Validation::vUserToRegister($_POST);

        if (empty($errores)) {
                //Se puede crear un metodo estatico para formar este usuario?
                $user = new Usuario(
                        $_POST['email'],
                        $_POST['password'],
                        $_POST['apellido'],
                        $_POST['nombre'],
                        date('Y-m-d', strtotime($_POST['fecnac'])),
                        (int) $_POST['documento']
                );
                $_SESSION['Usuario'] = $user;
                var_dump($_SESSION);
                $saved = DB::saveUser($user);
        } else {
                header('Location:index.php');
        }
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

        <?php if (isset($saved)) : ?>
                <div class="<?php echo $saved ? 'alert-success text-center' : 'alert-danger text-center' ?>" role="alert">
                        <?php echo $saved ? '¡Usuario guardado con éxito!' : '¡Este usuario ya existe!' ?>
                </div>
        <?php endif; ?>

        <div class="container-fluid">

                <?php require_once "shared/main.php" ?>

                <?php require_once "shared/bts-js.php" ?>

                <?php require_once "shared/footer.php" ?>

                <?php require_once "./modals/modal-newsletter.php" ?>
        </div>

</body>

</html>