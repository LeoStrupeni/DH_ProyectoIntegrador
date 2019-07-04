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
                <a href="shop.php"><i class="fas fa-shopping-cart"></i></a>
              </button>';
      } else {
        require_once "php/modal-nav.php";
      }
    ?>
  </div>


      
    
