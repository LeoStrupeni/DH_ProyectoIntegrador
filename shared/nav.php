<div class="row">

  <div class="col-3 text-center">
    <?php
      if ($_POST){
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

<div class="row">
  <div class="col">
    <nav class="navbar navbar-expand-md navbar-light bg-transparent">
        <button class="navbar-toggler btn bg-dark btn-lg btn-block" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="text-light dropdown-toggle">Menu</span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>Cervezas</strong>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Opcion</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>Vinos</strong>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Opcion</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>Blancas</strong>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Opcion</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <strong>Aperitivos</strong>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Opcion</a>
              </div>
            </li>
          </ul>
      </div>
    </nav>
  </div>
</div>
