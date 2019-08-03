<header>
  <nav class="navbar">
    <div class="col-12">
      <div class="row m-2">
        <div class="col-2">
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

        <div class="col-8 col-lg-6">
          <form class="form-inline" action="shop.php" method="post">
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

        <div class="col-12 col-lg-4 text-right">
          <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo '<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2 btn-nav" role="group" aria-label="First group">
                  <a href="perfil.php" class="btn btn-secondary">Perfil</a>
                </div>
                <div class="btn-group mr-2 btn-nav" role="group" aria-label="Second group">
                  <a class="btn btn-warning" href="ShopViewCart.php"><i class="fas fa-shopping-cart"></i>
                  </a>
                </div>
              </div>';
            //(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO'])
          } else {
            include "php/modal-login.php";
            include "php/modal-register.php";
          }
          ?>
        </div>
      </div>
    </div>

  </nav>

</header>