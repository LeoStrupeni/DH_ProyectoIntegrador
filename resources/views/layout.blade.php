<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="row">
        <div class="col p-0">
            <header>
                <nav class="navbar pt-0 nav-1 px-5 navbar-dark">
                    <span class="navbar-brand mb-0 h1 pb-0">
                        <a href="{{ url('/home') }}" class="text-reset">Inicio</a>
                    </span>
                    <span class="navbar-text pb-0">Lorem Ipsum</span>
                </nav>
            
                <nav class="navbar navbar-light nav-2 py-auto">
                    <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-2">
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
                        </div>
                    </div>
                            
                    <div class="col-9 col-sm-9 col-md-5 col-lg-5 col-xl-6 text-center">
                        <form class="form-inline my-2 my-lg-0 mx-auto" action="Search" method="post">
                            @csrf
                            <input class="form-control mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Search" name="ParamBusqueda" required>
                            <button class="btn btn-search my-2 my-sm-0" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 text-center">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
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
                                @else
                                <div>boton login</div>
                                @endauth
                            </div>
                        @endif
                    </div>                
                </nav>
            </header> 
        </div>
    </div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

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


        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
        <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
        </script>

    </div>
</body>
</html>
