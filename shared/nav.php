<div class="row m-2">
  <div class="col-4 col-sm-4 col-md-4 col-lg-3">
    <div class="btn-group" role="group">
      <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Menu
      </button>
      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item" href="#">Cervezas</a>
        <a class="dropdown-item" href="#">Vinos</a>
        <a class="dropdown-item" href="#">Blancas</a>
        <a class="dropdown-item" href="#">Aperitivos</a>
      </div>
    </div>
  </div>

  <div class="col-8 col-sm-8 col-md-8 col-lg-6">
    <form class="form-inline">
      <div class="col-8 p-0 text-right">
        <input class="form-control" type="search" placeholder="Busqueda" aria-label="Search">
      </div>
      <div class="col-4">
        <button class="btn btn-secondary" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>
  </div>  

  <div class="col-12 col-sm-12 col-md-12 col-lg-3">
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo '<a href="perfil.php" class="btn btn-secondary">Perfil</a>';
        echo '<button class="btn btn-dark" type="submit">
                  <i class="fas fa-shopping-cart"></i>
                </button>';
      } else {
        echo '<!--Modal: Login / Register Form-->
        <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
        
              <!--Modal cascading tabs-->
              <div class="modal-c-tabs">
        
                <!-- Nav tabs -->
                <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                      Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  " data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                      Register</a>
                  </li>
                </ul>
        
                <!-- Tab panels -->
                <div class="tab-content">
                  <!--Panel 7-->
                  <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
        
                    <!--Body-->
                    <div class="modal-body mb-1">
                      <div class="md-form form-sm mb-2">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" id="modalLRInput10" class="form-control form-control-sm validate">
                        <label data-error="wrong" data-success="right" for="modalLRInput10">Email</label>
                      </div>
        
                      <div class="md-form form-sm mb-2">
                        <i class="fas fa-lock prefix"></i>
                        <input type="password" id="modalLRInput11" class="form-control form-control-sm validate">
                        <label data-error="wrong" data-success="right" for="modalLRInput11">Contraseña</label>
                      </div>
                      <div class="text-center mt-2">
                        <button class="btn btn-info">Log in <i class="fas fa-sign-in ml-1"></i></button>
                      </div>
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                      <div class="options text-center text-md-right mt-1">
                        <a href="#" class="blue-text">Olvido su contraseña?</a>
                      </div>
                      <button type="button" class="btn btn-secondary waves-effect ml-auto" data-dismiss="modal">Close</button>
                    </div>
        
                  </div>
                  <!--/.Panel 7-->
        
                  <!--Panel 8-->
                  <div class="tab-pane fade" id="panel8" role="tabpanel">
        
                    <!--Body-->
                    <div class="modal-body">
                      <div class="md-form form-sm mb-2">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" id="modalLRInput12" class="form-control form-control-sm validate">
                        <label data-error="wrong" data-success="right" for="modalLRInput12">Email</label>
                      </div>
        
                      <div class="md-form form-sm mb-2">
                        <i class="fas fa-lock prefix"></i>
                        <input type="password" id="modalLRInput13" class="form-control form-control-sm validate">
                        <label data-error="wrong" data-success="right" for="modalLRInput13">Ingrese su contraseña</label>
                      </div>
        
                      <div class="md-form form-sm mb-2">
                        <i class="fas fa-lock prefix"></i>
                        <input type="password" id="modalLRInput14" class="form-control form-control-sm validate">
                        <label data-error="wrong" data-success="right" for="modalLRInput14">Repite su contraseña</label>
                      </div>
        
                      <div class="text-center form-sm mt-2">
                        <button class="btn btn-info">Registrarse<i class="fas fa-sign-in ml-1"></i></button>
                      </div>
        
                    </div>
                    <!--Footer-->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary waves-effect ml-auto" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!--/.Panel 8-->
                </div>
        
              </div>
            </div>
            <!--/.Content-->
          </div>
        </div>
        <!--Modal: Login / Register Form-->
        
        <div class="text-center">
          <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#modalLRForm">Login / Register</a>
        </div>        
        
        
        </div>';
      }
    ?>
  </div>


      
    
