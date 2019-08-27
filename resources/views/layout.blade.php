@extends('meta')

@section('layout')

<body>
    <div class="row mx-0">
        <div class="col p-0">
            <header>
                <nav class="navbar pt-0 nav-1 px-5 navbar-dark">
                    <span class="navbar-brand mb-0 h1 pb-0">
                        <a href="{{ url('/') }}" class="text-reset">Inicio</a>
                    </span>
                    <span class="navbar-text pb-0">Lorem Ipsum</span>
                </nav>

                <nav class="navbar navbar-light nav-2 py-auto">
                    <div class="col-3 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                        <div class="text-center">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navBebidas" aria-controls="navBebidas" aria-expanded="false"
                                aria-label="Toggle navigation">
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
                        <form class="form-inline my-2 my-lg-0 mx-auto" action="{{route('search')}}" method="post">
                            @csrf
                            <input class="form-control mr-sm-2" type="search" placeholder="Búsqueda" aria-label="Search"
                                name="ParamBusqueda" required>
                            <button class="btn btn-search my-2 my-sm-0" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 text-center">
                        @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            <div class="justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2 btn-nav" role="group" aria-label="First group">
                                <a href="{{route('home')}}" class="btn btn-nav btn-user">Perfil</a>
                                </div>
                                <div class="btn-group mr-2 btn-nav" role="group" aria-label="Second group">
                                <a class="btn btn-warning" href="{{--route('shopping')--}}">
                                        <i class="fas fa-shopping-cart pt-1"></i>
                                    </a>
                                </div>
                                <div class="btn-group mr-2 btn-nav" role="group" aria-label="Second group">
                                    <a href="{{route('logout')}}" class="btn btn-nav btn-danger">Logout</a>
                                </div>
                            </div>
                            @else
                            <div class="justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                                    @include('modals.login')
                                @if (Route::has('register'))
                                    @include('modals.register')
                                @endif
                            </div>
                            @endauth
                        </div>
                        @endif
                    </div>
                </nav>
            </header>
        </div>
    </div>

    <main class="container">
        @yield('content')
    </main>

    <footer class="container">
        <div class="row mt-2 footer-1">
            <div class="list-group list-group-horizontal-lg m-auto text-center">
                @include('modals.contact')
                <button type="button" class="list-group-item btn-foot">
                    <a href="{{--route('faq')--}}" class="text-reset text-decoration-none">Preguntas Frecuentes</a>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        $(function() {
        $('[data-toggle="popover"]').popover()
    });
    </script>
</body>
@endsection