<header>
    <nav class="navbar pt-0 nav-1 px-5 navbar-dark">
        <span class="navbar-brand mb-0 h1 pb-0">
            <a href="index.php" class="text-reset">Inicio</a>
        </span>
        <span class="navbar-text pb-0">Lorem Ipsum</span>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light nav-2 py-auto">

        <div class="col-12 col-sm-4 col-md-6 col-lg-8 col-xl-9">

            <div class="text-center">
                <button class="navbar-toggler mb-2" type="button" data-toggle="collapse" data-target="#navBebidas" aria-controls="navBebidas" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>


            <div class="collapse navbar-collapse" id="navBebidas">

                <div class="navbar-nav">
                    <a class="nav-item nav-link text-dark font-weight-bold" href="#">Cervezas</a>
                    <a class="nav-item nav-link text-dark font-weight-bold" href="#">Vinos</a>
                    <a class="nav-item nav-link text-dark font-weight-bold" href="#">Blancas</a>
                    <a class="nav-item nav-link text-dark font-weight-bold" href="#">Aperitivos</a>
                </div>

                <form class="form-inline my-2 my-lg-0 mx-auto" action="Busqueda.php" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Search" name="ParamBusqueda" required>
                    <button class="btn btn-search my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

            </div>

        </div>


        <div class="col-12 col-sm-8 col-md-6 col-lg-4 col-xl-3 text-center">
            <?php
            if (isset($_SESSION['Usuario'])) {
                echo    '<div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2 btn-nav" role="group" aria-label="First group">
                                <a href="perfil.php" class="btn btn-nav btn-user">Perfil</a>
                            </div>
                            <div class="btn-group mr-2 btn-nav" role="group" aria-label="Second group">
                                <a class="btn btn-warning" href="Carrito.php">
                                    <i class="fas fa-shopping-cart pt-1"></i>
                                </a>
                            </div>
                        </div>';
                //(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO'])
            } else {
                require_once "./modals/modal-login.php";
                require_once "./modals/modal-register.php";
            }
            ?>

        </div>


    </nav>
</header>