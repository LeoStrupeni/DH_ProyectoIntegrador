<div class="row d-none d-lg-flex">

  <div class="col-3 text-center">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

  <div class="col-3">
    <img src="images/Drinks-42.svg" alt="logo" class="logo img-responsive">
  </div>

  <div class="col-6 text-center mt-4">
    <form class="form-inline my-2 my-lg-2">
      <div class="col-10 p-0">
        <input class="form-control" type="search" placeholder="Busqueda" aria-label="Search">
      </div>
      <div class="col-2 text-center">
        <button class="btn btn-success" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>
  </div>

</div>