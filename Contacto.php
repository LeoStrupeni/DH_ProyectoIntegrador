<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Contacto</title>
        <link rel="stylesheet" href="css/stylesForm.css">
    </head>
    <body>
        <div class="row">
            <div class="col-12">
                <a href="index.php">Volver a Pagina Inicio</a>  
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="cajaformulario">
                    <h1>Contacto </h1>
                    <br><br><br>
                    <form action="contact.php" method="post">
                        <p>
                            <b>Dejanos tus datos y nos pondremos en contacto con vos</b>
                        </p>

                        <p>
                            <label for="Nombre">Nombre</label><br>
                            <input id= "nombre" type="text" name="nombre" value="" placeholder="tu nombre" required>
                        </p>

                        <p>
                            <label for="Email">Email</label><br>
                            <input id= "Email" type="email" name="Email" value="" placeholder="tu mail"required>
                        </p>

                        <p>
                            <label for="telefono">Teléfono</label><br>
                            <input id= "telefono" type="tel" name="telefono" value="" pattern= "3416772339" title= "ingresá tu celular con el formato 3416772339" placeholder="tu teléfono"required>
                        </p>
                        <p>
                            <label for="porque"><b>Mensaje</b></label><br>
                            <textarea name="name" rows="8" cols="80"></textarea>
                        </p>
                        <p>
                            <button type="submit" name="button">Enviar</button>
                        </p>
                        <p>
                            <button id = "segundoboton" type="reset" name="button">Resetear</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>