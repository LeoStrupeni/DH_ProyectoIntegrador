<button type="button" class="btn btn-nav btn-user" data-toggle="modal" data-target="#modalLogin">
  Ingresar
</button>

<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content modal-contacto">

      <form action="index.php" class="form p-2" method="POST">
        <div class="modal-body">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

          <div class="form-group">
            <label for="email" class="h4">Email</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>

          <div class="form-group">
            <label for="password" class="h4">Contrasena</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>

          <div>
            <input type="checkbox" name="Recordar" value="recuerdo" class="form-check-input" checked>
            <label class="form-check-label">
              Recordarme
            </label>
          </div>

        </div>

        <div class="modal-footer justify-content-center">
          <button type="submit" class="btn btn-modal active">Ingresar</button>
        </div>
      </form>

    </div>
  </div>
</div>
