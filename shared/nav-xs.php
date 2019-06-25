<div class="row d-block d-sm-none">

  <div class="row d-block">

    <img src="images/Drinks-42.svg" alt="logo" class="logo img-responsive mb-1">

  </div>

  <div class="row d-block m-2">

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

  <div class="row d-block text-center">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == $_POST) {
      echo '<a href="perfil.php" class="btn btn-success btn-nav m-0">Perfil</a>';
      echo '<button class="btn btn-light btn-lg btn-nav" type="submit">
                <i class="fas fa-shopping-cart"></i>
              </button>';
    } else {
      echo '<a href="login.php" class="btn btn-success btn-nav m-0">Login</a>';
      echo '<a href="register.php" class="btn btn-success btn-nav">Registrate</a>';
    }
    ?>
  </div>

</div>