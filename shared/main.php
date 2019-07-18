<div class="row">
    <div class="col p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/img1.gif" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="images/img1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="images/img2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="images/img3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="images/img4.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption"></div>
                </div>
                <div class="carousel-item">
                    <img src="images/img5.jpg" class="d-block w-100" alt="...">
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
                <p class="lead text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus odit voluptatem quos veritatis voluptate cum doloribus placeat facilis tenetur repellendus, alias non. Animi eligendi repellat, sint sapiente officiis molestias dolor.</p>
            </div>
        </div>
    </div>
</div>

<?php 
    $sentencia=$pdo->prepare('SELECT * FROM productos where idProductos<9');
    $sentencia->execute();
    $listaProductos=$sentencia->fetchall(PDO::FETCH_ASSOC);               
?>


<div class="row">
    <?php foreach ($listaProductos as $producto) :?>
        <div class="col-10 col-sm-6 col-md-4 col-lg-3 border border-dark rounded-lg m-auto p-1">
            <div class="card bg-transparent mb-2">
                <img title = "<?=$producto['Name']?>" alt="<?=$producto['Name']?>" src=<?='images/Bebidas/'.$producto['imagen']?> class="card-img m-auto">
                <div class="card-img-overlay text-right">
                    <form method="get" action="detalles.php">
                        <input type="hidden" name="id" id="id" value="<?=$producto['idProductos']?>">
                        <button class="btn btn-warning" type="submit" name="" value="">
                            + Detalles
                        </button>
                    </form>                               
                </div>
            </div>
        </div>
    <?php endforeach;?>
    

</div>