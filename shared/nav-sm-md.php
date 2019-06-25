<div class="row d-none d-sm-flex d-md-flex d-lg-none">

  <div class="col-sm-12">

    <div class="row">
      <div class="col-sm-4">
        <img src="images/Drinks-42.svg" alt="logo" class="logo img-responsive mb-1">
      </div>

      <div class="col-sm-8 text-center">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == $_POST) {
          echo '<a href="perfil.php" class="btn btn-success btn-nav">Perfil</a>';
          echo '<button class="btn btn-light btn-lg btn-nav" type="submit">
                <i class="fas fa-shopping-cart"></i>
              </button>';
        } else {
          echo '<a href="login.php" class="btn btn-success btn-nav">Login</a>';
          echo '<a href="register.php" class="btn btn-success btn-nav">Registrate</a>';
        }
        ?>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-sm-12">
        <form action="#" class="form m-2">
          <div class="input-group mb-3">
            <input class="form-control" type="search" placeholder="Busqueda" aria-label="Buscar">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

</div>