<!DOCTYPE html>
<?php 
        $nombre = "Registro";
        include ("html/head.php") 
?>
    <body class="text-light">
        <div class="container">
            <div class="row">
                <div class="col text-right">
                    <a class="text-light" href="index.php">Volver a Pagina Inicio</a>
                </div>
            </div>
        </div>
        <?php
            // PARA PROCESAR FORMULARIO 
            
            // Comprobamos si nos llega los datos por POST
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Funciones Para Validar
                /*valida si un texto no esta vacío*/
                function validar_requerido(string $texto): bool
                {
                    return !(trim($texto) == '');
                }
                /*valida si es número  entero y mayor a 18*/                
                function validarEdad() {
                    return (is_integer($_POST["edad"]) || ($_POST["edad"]) >=18);
                }
                /*valida si el texto tiene un formato válido de E-Mail*/
                function validar_email(string $texto): bool
                {
                    return (filter_var($texto, FILTER_VALIDATE_EMAIL) === FALSE) ? False : True;
                }
                // Variables
                $errores = [];
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
                $edad = isset($_POST['edad']) ? $_POST['edad'] : null;
                $email = isset($_POST['email']) ? $_POST['email'] : null;
                // Validaciones
                // Nombre
                if (!validar_requerido($nombre)) {
                    $errores[] = 'El campo Nombre es obligatorio.';
                }
                // Edad
                if (!validarEdad($edad)==true) {
                    $errores[] = 'Ingresa tu edad en números, si eres mayor de 18 años.';                
                }                    
            }
       ?>
        <!-- Mostramos errores por HTML -->
        <?php if (isset($errores)): ?>
        <ul class="errores">
            <?php 
                foreach ($errores as $error) {
                    echo '<li>' . $error . '</li>';
                } 
            ?> 
        </ul>
        <?php endif; ?>
        <!-- Formulario -->
       
        <div class="container mt-5">
        <div class="card bg-black"style="max-width: 760px;">
            <div class="row no-gutters">
                <div class="col-md-6">
                    <img src="images/Bienvenida.jpg" class="card-img" alt="...">
                </div>
                <div class="col-md-6 m-auto">
                    <form action="register.php" class="text-light form ml-4 mr-4" method="post">
                        <div class="form-group">
                            <label for="email">EMAIL: </label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su email">
                        </div>
                        <div class="form-group">
                            <label for="nombre">NOMBRE: </label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su Nombre">
                        </div>
                        <div class="form-group">
                            <label for="nombre">FEC. NACIMIENTO: </label>
                            <input type="date" name="FECNAC" class="form-control"> 
                        </div>
                        <div class="form-group">
                            <label for="edad">EDAD: </label>
                            <input type="text" name="edad" class="form-control" placeholder="Ingrese su Edad"> 
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-secondary active">ENTRAR</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

        <?php include ("html/Script-B.php") ?> 

    </body>
</html>