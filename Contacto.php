<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Contacto</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
		integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col text-right">
                    <a class="text-light" href="index.php">Volver a Pagina Inicio</a>
                </div>
            </div>

            <div class="bg-transparent mx-auto">
                <div class="h1 text-center text-light">Contacto</div>
                <form action="contact.php" method="post" class="mx-auto">
                    <p>
                        <b class="text-light">Dejanos tus datos y nos pondremos en contacto con vos</b>
                    </p>

                    <p>
                        <label for="Nombre" class="text-light">Nombre</label><br>
                        <input class="ingreso" id= "nombre" type="text" name="nombre" value="" placeholder="tu nombre" required>
                    </p>

                    <p>
                        <label for="Email" class="text-light">Email</label><br>
                        <input class="ingreso" id= "Email" type="email" name="Email" value="" placeholder="tu mail"required>
                    </p>

                    <p>
                        <label for="telefono" class="text-light" >Teléfono</label><br>
                        <input class="ingreso" id= "telefono" type="tel" name="telefono" value="" pattern= "3416772339" title= "ingresá tu celular con el formato 3416772339" placeholder="tu teléfono"required>
                    </p>
                    <p>
                        <label for="porque" class="text-light"><b>Mensaje</b></label><br>
                        <textarea name="name" rows="8" cols="80"></textarea>
                    </p>
                    <p>
                        <button type="submit" name="button" class="btn-contacto">Enviar</button>
                    </p>
                    <p>
                        <button type="reset" name="button" class="btn-contacto segundoboton">Resetear</button>
                    </p>
                </form>
            </div>
        </div>
    </body>
</html>