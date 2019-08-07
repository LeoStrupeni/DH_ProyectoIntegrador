<?php
$nombre = "Titulo";
require_once "shared/head.php";
require_once 'global/autoload.php';
session_start();

//A chequear si hay alguna otra forma de hacer esto en otra pagina - Mejor esperar a implementar LARAVEL
if ($_POST) {
        //Metodo rustico para chequear si el usuario quiere loguearse o registrarse - TO REFACTOR
        if (count($_POST) == 3) {
                $existe = DB::validateUserByEmail($_POST['email'], $_POST['password']);
                if ($existe) {
                        $_SESSION['Usuario'] = DB::getUserDataForLogIn($_POST['email']);
                }
        } else {
                $errores = Validation::vUserToRegister($_POST);

                if (empty($errores)) {
                        //Se puede crear un metodo estatico para formar este usuario?
                        $user = new Usuario(
                                $_POST['email'],
                                $_POST['apellido'],
                                $_POST['nombre'],
                                date('Y-m-d', strtotime($_POST['fecnac'])),
                                (int) $_POST['documento']
                        );
                        $user->setPassword($_POST['password']);
                        $_SESSION['Usuario'] = $user;
                        $saved = DB::saveUser($user);
                } else {
                        header('Location:index.php');
                }
        }
}

?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<body>
        <?php require_once "shared/navbar.php" ?>

        <?php if (isset($saved)) : ?>
                <div class="<?php echo $saved ? 'alert-success text-center' : 'alert-danger text-center' ?>" role="alert">
                        <?php echo $saved ? '¡Usuario guardado con éxito!' : '¡Este usuario ya existe!' ?>
                </div>
        <?php endif; ?>

        <?php if (isset($existe) && !$existe) : ?>
                <div class="alert-danger text-center" role="alert">
                        ¡Este usuario no existe!
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