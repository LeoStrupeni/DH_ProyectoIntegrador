<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('Title')</title>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">

</head>
<body>
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
            @if (isset($_SESSION['Usuario']))
                <div class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2 btn-nav" role="group" aria-label="First group">
                                <a href="perfil.php" class="btn btn-nav btn-user">Perfil</a>
                            </div>
                            <div class="btn-group mr-2 btn-nav" role="group" aria-label="Second group">
                                <a class="btn btn-warning" href="Carrito.php">
                                    <i class="fas fa-shopping-cart pt-1"></i>
                                </a>
                            </div>
                        </div>
                //(empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO'])
            @else
                @include('modals/modal-Login')
                <!--include('modals/modal-register') -->
            
            @endif
        </div>


    </nav>
</header>   

@yield('Contenido')

<footer>
    <div class="row mt-2 footer-1">
        <div class="list-group list-group-horizontal-lg m-auto text-center">
            
            @include('modals/modal-contacto')

            <button type="button" class="list-group-item btn-foot">
                <a href="faq.php" class="text-reset text-decoration-none">Preguntas Frecuentes</a>
            </button>
            <button type="button" class="list-group-item btn-foot">Politicas de Privacidad</button>
            <button type="button" class="list-group-item btn-foot">Terminos y Condiciones</button>
        </div>
    </div>
    <div class="row text-black footer-trademark justify-content-center">
        <small class="text-muted mt-4">
            © 2019 - Realizado por Leonardo, Santiago y Pablo
        </small>
    </div>
</footer>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
</html>