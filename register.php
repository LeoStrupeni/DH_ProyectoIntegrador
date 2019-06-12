<!DOCTYPE html>
<html lang="en">
<?php 
        $nombre = "Registro";
        include ("head.php") 
?>
    <body>
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
                // Email
                if (!validar_email($email)) {
                    $errores[] = 'El campo de Email tiene un formato no válido.';
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
        <form method="post">
            <p>
                <!-- Campo nombre -->
                <input type="text" name="nombre" placeholder="Nombre">
            </p>
            <p>
                <!-- Campo edad -->
                <input type="text" name="edad" placeholder="Edad">
            </p>
            <p>
                <!-- Campo Email -->
                <input type="text" name="email" placeholder="Email">
            </p>
            <p>
                <!-- Botón submit -->
                <input type="submit" value="Enviar">
            </p>
        </form>
    </body>
</html>