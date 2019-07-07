<button type="button" class="btn btn-primary btn-nav" data-toggle="modal" data-target="#modalRegister">
  Registrate!!
</button>

<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-body">
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

        <!-- Formulario -->
          <div class="container">
              <div class="card bg-black">
                  <div class="row no-gutters">
                      <div class="col-md-6">
                          <img src="images/Bienvenida.jpg" class="card-img h-100" alt="...">
                      </div>
                      <div class="col-md-6 pt-3">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <form action="index.php" class="text-light form p-3" method="post">
                              <div class="form-group">
                                  <label for="email">EMAIL: </label>
                                  <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese su email" value="<?= $emailDefault; ?>">
                              </div>
                              <div class="form-group">
                                  <label for="nombre">NOMBRE: </label>
                                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" value="<?= $nombreDefault; ?>">
                              </div>
                                <div class="form-group">
                                    <label for="password">CONTRASEÑA</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                              <div class="form-group">
                                  <label for="fecnac">FEC. NACIMIENTO: </label>
                                  <input type="date" name="fecnac" id="fecnac" class="form-control" value="<?= $fechaDefault; ?>">
                              </div>
                              <div class="form-group text-center">
                                  <button type="submit" class="btn btn-secondary active">ENTRAR</button>
                              </div>
                              <?php if (isset($errores)) {
                                  foreach ($errores as $error) {
                                      mostrarErroresEnFormulario($error);
                                  }
                              } ?>
                          </form>
                      </div>
                  </div>
              </div>
          </div>  
      </div>
    </div>
  </div>
</div>