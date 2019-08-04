<?php
require_once 'global/config.php';
require_once 'global/conexion.php';
require_once 'global/autoload.php';

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
                        (int)$_POST['documento']
                );
                session_start();
                var_dump($user);
                echo DB::saveUser($user);
                exit;
                header('Location:index.php');
        } else {
                var_dump($_POST);
                var_dump($errores);
                exit;
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

        <div class="container-fluid">

                <?php require_once "shared/main.php" ?>

                <?php require_once "shared/bts-js.php" ?>

                <?php require_once "shared/footer.php" ?>

                <?php require_once "./modals/modal-newsletter.php" ?>
        </div>

</body>

</html>