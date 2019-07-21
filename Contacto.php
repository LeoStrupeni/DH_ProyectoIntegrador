<!DOCTYPE html>
<html lang="es" dir="ltr">
<?php
$nombre = "Contacto";
require_once "shared/head.php"
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-right text-white">
                <a class="text-reset" href="index.php">Volver a Pagina Inicio</a>
            </div>
        </div>

        <div class="row">
            <div class="col cuerpo-contacto">
                <div class="h1 text-center text-white">Contacto</div>

                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <b class="text-white">Dejanos tus datos y nos pondremos en contacto con vos</b>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Tu email" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input class="form-control" id="telefono" type="tel" name="telefono" value="" pattern="[1-9]{10}" title="Ingresá tu celular con el formato 3416772339" placeholder="Tu teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="porque"><b>Mensaje</b></label>
                        <textarea name="porque" id="porque" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button type="submit" name="button" class="form-control btn-contacto">Enviar</button>
                        </div>
                        <div class="col">
                            <button type="reset" name="button" class="form-control btn-contacto segundoboton">Resetear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>

</html>