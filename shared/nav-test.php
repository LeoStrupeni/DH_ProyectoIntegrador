<header>
    <nav class="navbar pt-0 nav-1 px-5 navbar-dark">
        <span class="navbar-brand mb-0 h1">
            <a href="index.php" class="text-reset">Lorem ipsum</a>    
        </span>
        <span class="navbar-text">Lorem Ipsum</span>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light nav-2 pl-5">

        <div class="col-8 pl-5">

            <div class="text-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBebidas" aria-controls="navBebidas" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>


            <div class="collapse navbar-collapse" id="navBebidas">

                <div class="navbar-nav">
                    <a class="nav-item nav-link text-dark font-weight-bold" href="#">Cervezas <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link text-dark font-weight-bold" href="#">Vinos</a>
                    <a class="nav-item nav-link text-dark font-weight-bold" href="#">Blancas</a>
                    <a class="nav-item nav-link text-dark font-weight-bold" href="#">Aperitivos</a>
                </div>

                <form class="form-inline my-2 my-lg-0 mx-auto" action="shop.php" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Busqueda" aria-label="Search">
                    <button class="btn btn-search my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </form>

            </div>

        </div>




        <div class="col-4 text-center">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo    '<div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2 btn-nav" role="group" aria-label="First group">
                                <a href="perfil.php" class="btn btn-nav btn-user">Perfil</a>
                            </div>
                            <div class="btn-group mr-2 btn-nav" role="group" aria-label="Second group">
                                <a class="btn btn-warning" href="ShopViewCart.php">
                                    <i class="fas fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>'
                    ;
                //(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO'])
            } else {
                include "php/modal-login.php";
                include "php/modal-register.php";
            }
            ?>

        </div>


    </nav>
</header>