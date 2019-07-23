<button type="button" class="btn btn-nav btn-user" data-toggle="modal" data-target="#modalRegister">
    Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <?php
            require_once "php/funciones.php";

            $nombreDefault = "";
            $emailDefault = "";
            $fechaDefault = "";

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $errores = validarRegistracion($_POST);

                if (empty($errores)) {
                    $usuario = armarUsuario($_POST);
                    registrar($usuario);
                }

                $nombreDefault = $_POST["nombre"];
                $emailDefault = $_POST["email"];
                $fechaDefault = $_POST["fecnac"];
            }
            ?>
            <form action="index.php" class="form" method="post">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-group">
                        <label for="email" class="h4">Email </label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su email" value="<?= $emailDefault; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="h4">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" value="<?= $nombreDefault; ?>">
                    </div>
                    <div class="form-group">
                        <label for="password" class="h4">Contrasena</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="fecnac" class="h4">Fecha de nacimiento</label>
                        <input type="date" name="fecnac" id="fecnac" class="form-control" value="<?= $fechaDefault; ?>">
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-modal">Registrar</button>
                    </div>
                    <?php if (isset($errores)) {
                        foreach ($errores as $error) {
                            mostrarErroresEnFormulario($error);
                        }
                    } ?>
                </div>
            </form>

        </div>
    </div>
</div>