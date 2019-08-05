<button type="button" class="btn btn-nav btn-user" data-toggle="modal" data-target="#modalRegister">
    Registrar
</button>

<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <?php require_once "./global/autoload.php"; ?>
            <form action="index.php" class="form" method="post">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-group">
                        <label for="email" class="h4">Email </label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su email" value="">
                    </div>
                    <div class="form-group">
                        <label for="nombre" class="h4">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" value="">
                    </div>
                    <div class="form-group">
                        <label for="apellido" class="h4">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingrese su apellido" value="">
                    </div>
                    <div class="form-group">
                        <label for="documento" class="h4">Documento</label>
                        <input type="number" name="documento" id="documento" class="form-control" placeholder="Ingrese su documento" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="pais" class="h4">País de Origen</label>
                        <select class="form-control" id="pais">
                            <?php $paises = DB::getAllPaises(); ?>
                            <?php foreach ($paises as $pais) : ?>
                                <?php $nombre = $pais->getNombre(); ?>
                                <option value=<?= $nombre ?>>
                                    <?= $nombre ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fecnac" class="h4">Fecha de nacimiento</label>
                        <input type="date" name="fecnac" id="fecnac" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="h4">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="h4">Confirmar contraseña</label>
                        <input type="password" name="password-2" id="password-2" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terminos" required>
                            <label class="form-check-label">
                                Aceptar términos y condiciones
                            </label>
                        </div>
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