@extends('meta')

@section('layout')

@include('modals.age-alert')

<body>
    <div class="row mx-0">
        <div class="col p-0">
            <header>
                <nav class="navbar pt-0 nav-1 px-5 navbar-dark">
                    <span class="navbar-brand mb-0 h1 pb-0">
                        <a href="{{ url('/') }}" class="text-reset">Inicio</a>
                    </span>
                    <span class="navbar-text pb-0">Capone S.A</span>
                </nav>

                <nav class="navbar navbar-light nav-2 py-auto">
                    <div class="col-2 col-md-1">
                        <div>
                            <button class="navbar-toggler" data-pushbar-target="pushbar-menu">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div data-pushbar-id="pushbar-menu" class="pushbar from_left pushbar-menu">

                                <div class="text-right mr-2">
                                    <i data-pushbar-close class="fas fa-times"></i>
                                </div>

                                <h5 class="text-white text-center">Categorias</h5>
                                <div class="navbar-nav">

                                    @foreach ($categorias as $cat)
                                    <a class="nav-item text-dark font-weight-bold ml-3 pb-1"
                                        href="{{route('search','PM='.$cat->name)}}">{{$cat->name}}</a>
                                    @endforeach
                                    <hr>
                                    @if (Auth::check() && Auth::user()->hasRole('admin'))
                                    <a class="nav-item text-dark font-weight-bold ml-3 pb-1"
                                        href="{{route('suscriptors.index')}}">Suscriptores</a>
                                    <a class="nav-item text-dark font-weight-bold ml-3 pb-1"
                                        href="{{route('queries.index')}}">Consultas</a>
                                    <a class="nav-item text-dark font-weight-bold ml-3 pb-1"
                                        href="{{route('users.index')}}">Usuarios</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-10 col-sm-10 col-lg-6 text-center">
                        <div class="row">
                            <div class="col-10">
                                <form class="form-inline my-2 my-lg-0" action="{{route('search')}}" method="GET">
                                    <input class="form-control paramBusquedajs" type="search"
                                        placeholder="Encontra lo que buscas" aria-label="Search" name="PM" list="PM"
                                        required>
                                    <datalist id="PM" class="busquedajs"></datalist>
                                    <button class="btn btn-search ml-1" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="col-2 add-clear my-2 my-lg-0">

                            </div>
                        </div>

                    </div>


                    <div class="col-12 col-sm-12 col-lg-5 text-center">
                        @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            <div class="justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group mr-2 btn-nav" role="group" aria-label="First group">
                                    <a href="{{route('users.edit', Auth::user()->id)}}"
                                        class="btn btn-nav btn-user">Perfil</a>
                                </div>
                                <div class="btn-group mr-2 btn-nav" role="group" aria-label="Second group">
                                    <a class="btn btn-warning" href="{{route('shopcart')}}">
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
        <div class="row footer-1">
            <div class="list-group list-group-horizontal-lg m-auto text-center">
                @include('modals.contact')
                <div class="list-group-item btn-foot">
                    <a href="{{route('faq')}}" class="text-reset text-decoration-none">Preguntas Frecuentes</a>
                </div>

                @include('modals.policies')
                @include('modals.conditions')
            </div>
        </div>
        <div class="row text-black footer-trademark justify-content-center">
            <small class="text-muted mt-4">
                © 2019 - Realizado por Leonardo, Santiago y Pablo
            </small>
        </div>
    </footer>


    <!-- Scripts -->
    @notify_js
    @notify_render
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ URL::asset('js/clear.js') }}"></script>
    <script src="{{ URL::asset('js/app.js') }}" defer></script>
    <script src="{{ URL::asset('js/search.js') }}"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <script src="{{ URL::asset('js/modals.js') }}"></script>
    <script src="{{ URL::asset('js/register-validation.js') }}"></script>
    <script src="{{ URL::asset('js/login-validation.js') }}"></script>
    <script src="{{ URL::asset('js/contact-validation.js') }}"></script>
    <script src="{{ URL::asset('js/age-alert.js') }}"></script>

    @yield('js')

    <script>
        $(function() {
        $('[data-toggle="popover"]').popover()
    });
    </script>
    <script>
        var pushbar = new Pushbar({
            blur: true,
            overlay: true,
        });        
    </script>

    <script>
        function valideKey(evt){
            var code = (evt.which) ? evt.which : evt.keyCode;
            if(code==8) {
                //backspace
                return true;
            } else if(code>=48 && code<=57) {
                //is a number
                return true;
            } else {
                return false;
            }
        }
    </script>

</body>
@endsection