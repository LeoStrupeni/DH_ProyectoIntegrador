@extends('layout')

@section('title', 'E-Commerce')

@section('content')

@section('js')
    <script src="{{ URL::asset('js/suscription-validation.js') }}"></script>    
@endsection

<div class="row">
    <div class="col p-0">
        <div id="carouselBebidas" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselBebidas" data-slide-to="0" class="active"></li>
                <li data-target="#carouselBebidas" data-slide-to="1"></li>
                <li data-target="#carouselBebidas" data-slide-to="2"></li>
                <li data-target="#carouselBebidas" data-slide-to="3"></li>
                <li data-target="#carouselBebidas" data-slide-to="4"></li>
                <li data-target="#carouselBebidas" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/storage/images/img0.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="/storage/images/img1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="/storage/images/img2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="/storage/images/img3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="/storage/images/img4.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="/storage/images/img5.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col p-0">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">Bienvenido a Capone!</h1>
                <p class="lead text-center">Capone es un punto de conexión para la comercializacion de bebidas alcohólicas que ni<a href="https://es.wikipedia.org/wiki/Eliot_Ness" class="text-decoration-none font-weight-bold"> Eliot Ness </a>podra resistir<br>
                Distinto tipos de vendedores podrán comunicarse y establecer negocio con otros, generando una oportunidad de ganancia para ambos sectores.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="row dataindex">

    @forelse ($products as $producto)

    <div class='col-10 col-sm-6 col-md-4 col-lg-3 mb-1'>
        <div class='card bg-transparent border border-dark rounded-lg'>
            <h4 class='text-center p-1 cut-text'> {{$producto->name}} </h4>
            <img title='{{$producto->name}}' alt='{{$producto->name}}'
                src='{{is_null($producto->image)?'/storage/images/Products/imgND.jpg':'/storage/images/Products/'.$producto->image}}'
                data-toggle='popover' data-trigger='hover' data-content='{{substr($producto->description, 0, 500)}}..'
                class='card-img p-1 img-fluid' style='z-index: 1;'>
            <div class='card-img-overlay text-right mt-5'>
                <h5>{{'$'. $producto->price}}</h5>
                <form method='GET' action='/detail'>
                    <input type='hidden' name='id' id='id' value='{{$producto->id}}'>
                    <button class='btn btn-warning w-50' type='submit' name='' value='' style='font-size:1vw;'>
                        + Detalles
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="alert alert-success w-100 text-center" role="alert">
        No Hay productos
    </div>

    @endforelse

    <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-1">
        <div>
            <button type="button" class="btn btn-newsletter shadow rounded-circle"
                data-pushbar-target="pushbar-newsletter">
                <i class="far fa-envelope text-white"></i>
            </button>

            <div data-pushbar-id="pushbar-newsletter" class="pushbar from_bottom pushbar-menu ">
                <div class="text-right mr-2">
                    <i data-pushbar-close class="fas fa-times"></i>
                </div>
                <form action="{{route('suscriptors.store')}}" class="form py-4 form-suscriptor" method="POST">
                    @csrf
                    <div class="text-center body-suscriptor">
                        <h4 class="pb-3">Registrate para recibir todas nuestras novedades</h4>

                        <div class="col-6 m-auto email-suscriptor-section">
                            <div class="form-group">
                                <input type="email" name="email" id="email-suscriptor" class="form-control text-center"
                                    placeholder="Ingresa tu email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-modal">Registrar</button>

                        @notify_css
                        @notify_js
                        @notify_render
                    </div>

                </form>
            </div>

        </div>
    </div>

</div>
@endsection