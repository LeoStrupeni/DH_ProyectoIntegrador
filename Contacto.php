<!DOCTYPE html>
    <?php 
        $nombre = "Contacto";
        include ("html/head.php") 
    ?>
    <body>
        <div class="container">
            <div class="row">
                <div class="col text-right">
                    <a class="text-light" href="index.php">Volver a Pagina Inicio</a>
                </div>
            </div>

            <div class="col-8 bg-transparent mx-auto">
                <div class="h1 text-center text-light">Contacto</div>
                
                <form action="contact.php" method="post" class="mx-auto text-light ">
                    <div class="form-group">
                        <b class="text-light">Dejanos tus datos y nos pondremos en contacto con vos</b>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre </label>
                        <input type="text" name="nombre" class="form-control" placeholder="Tu Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="tu email" required>
                    </div>
                    <div class="form-group">
                    <label for="telefono">Teléfono</label>
                        <input class="form-control" id= "telefono" type="tel" name="telefono" value="" pattern= "3416772339" title= "ingresá tu celular con el formato 3416772339" placeholder="tu teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="porque"><b>Mensaje</b></label>
                        <textarea name="porque" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
    </body>
</html>