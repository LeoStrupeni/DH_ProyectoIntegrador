<button type="button" class="btn btn-primary btn-nav" data-toggle="modal" data-target="#modalLogin">
  Login
</button>

<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <div class="container">
            <div class="card bg-black m-auto">
                <div class="row no-gutters">
                    <div class="col-6">
                        <img src="images/Bienvenida.jpg" class="card-img" alt="...">
                    </div>
                    <div class="col-6 m-auto">
                        <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="index.php" class="text-light form p-2" method="POST">
                          <div class="form-group">
                            <label for="email">EMAIL</label>
                            <input type="email" name="email" id="email" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for="password">CONTRASEÑA</label>
                            <input type="password" name="password" id="password" class="form-control">
                          </div>
                          <div>
                            <input type="checkbox" name="Recordar" value="recuerdo" checked>Recordame
                          </div>
                          <div class="text-center">
                            <button type="submit" class="btn btn-secondary active">ENTRAR</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>