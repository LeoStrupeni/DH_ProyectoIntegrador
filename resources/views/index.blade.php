@extends('layout')

@section('title', 'E-Commerce')

@section('content')

<div class="row">
    <div class="col p-0">
        <div id="carouselBebidas" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselBebidas" data-slide-to="0" class="active"></li>
                <li data-target="#carouselBebidas" data-slide-to="1"></li>
                <li data-target="#carouselBebidas" data-slide-to="2"></li>
                <li data-target="#carouselBebidas" data-slide-to="3"></li>
                <li data-target="#carouselBebidas" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
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
            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col p-0">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">Lorem ipsum</h1>
                <p class="lead text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus odit
                    voluptatem quos veritatis voluptate cum doloribus placeat facilis tenetur repellendus, alias non.
                    Animi eligendi repellat, sint sapiente officiis molestias dolor.</p>
            </div>
        </div>
    </div>
</div>


<div class="row">

    @forelse ($products as $producto)
    <div class="col-10 col-sm-6 col-md-4 col-lg-3 m-auto p-1">
        <div class="card bg-transparent mb-1 border border-dark rounded-lg">
            <img title="{{$producto->name}}" alt="{{$producto->name}}"
                src="{{is_null($producto->image)?'/storage/images/Products/imgND.jpg':'/storage/images/Products/'.$producto->image}}"
                data-toggle="popover" data-trigger="hover" data-content="{{substr($producto->description, 0, 500)}}.."
                class="card-img p-1 img-fluid" style="z-index: 10;">
            <div class="card-img-overlay text-right">
                <form method="get" action="">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{$producto->id}}">
                    <button class="btn btn-warning w-50" type="submit" name="" value="" style="font-size:1vw;">
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

            <div data-pushbar-id="pushbar-newsletter" class="pushbar from_bottom pushbar-menu nav-2">
                <form action="{{route('suscriptors.store')}}" class="form py-4" method="POST">
                    @csrf
                    <div class="text-center">
                        <h4 class="pb-3">Registrate para recibir todas nuestras novedades</h4>

                        <div class="col-6 m-auto">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control text-center"
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