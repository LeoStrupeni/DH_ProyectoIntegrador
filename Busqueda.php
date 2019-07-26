<?php
include 'global/config.php';
include 'global/conexion.php';
include 'php/validaciones.php';


    if($_POST){
        $_SESSION['ParametroBusqueda']=$_POST['ParamBusqueda'];
    }   

    $param = $_SESSION['ParametroBusqueda'];
    
    $articulosXpagina=24;

    if(!$_GET){
        header('location:Busqueda.php?pagina=1');
    }

    $iniciar= ($_GET['pagina']-1)*$articulosXpagina;
    
    $sentencia=$pdo->prepare('SELECT * FROM productos P 
                                LEFT JOIN prod_categorias C ON p.Categoria = c.idCategoria
                                LEFT JOIN prod_marcas M ON P.Marcas_idMarcas = M.idMarcas
                                WHERE Name LIKE "%'. $param .'%" '. 
                                'OR Descripcion LIKE "%'. $param .'%" '. 
                                'OR c.Nombre LIKE "%'. $param .'%" '. 
                                'OR M.Nombre LIKE "%'. $param .'%"
                                LIMIT :inicio,:narticulos
                                ');
    $sentencia->bindparam(':inicio',$iniciar, PDO::PARAM_INT);   
    $sentencia->bindparam(':narticulos',$articulosXpagina, PDO::PARAM_INT);   
    $sentencia->execute();   
    $listaProductos=$sentencia->fetchall(PDO::FETCH_ASSOC);  
    

    $sentenciaTotal=$pdo->prepare('SELECT * FROM productos P 
                                LEFT JOIN prod_categorias C ON p.Categoria = c.idCategoria
                                LEFT JOIN prod_marcas M ON P.Marcas_idMarcas = M.idMarcas
                                WHERE Name LIKE "%'. $param .'%" '. 
                                'OR Descripcion LIKE "%'. $param .'%" '. 
                                'OR c.Nombre LIKE "%'. $param .'%" '. 
                                'OR M.Nombre LIKE "%'. $param .'%"');    
    $sentenciaTotal->execute();   
    $totalProductos=$sentenciaTotal->rowCount();
    
    $paginas=ceil($totalProductos/$articulosXpagina); 


?>

<!DOCTYPE html>

<html lang="es" dir="ltr">

<?php
$nombre = "Search";
require_once "shared/head.php"
?>

<body>
    <?php require_once "shared/navbar.php" ?>
    <div class="container">
        <br>
        <?php if (!empty($_SESSION['mensaje'])) : ?>
            <div class="alert alert-secondary">
                <?=$_SESSION['mensaje']?>
                <a href="carrito.php" class="badge badge-success"> Ver Carrito</a>

            </div>
        <?php endif; ?>

        <!-- Averiguar como vaciar en este punto la $_SESSION['mensaje'] -->

        <div class="row" style="min-height:400px;">
            <?php if (count($listaProductos)==0) :?>
            
            <div class="alert alert-secondary w-100 h-25 text-center h4" role="alert">
                No se Encontro ningun producto!
            </div>
            
            <?php endif;?>
            <?php foreach ($listaProductos as $producto) :?>
                <div class="col-10 col-sm-6 col-md-4 col-lg-3 mb-1">
                    <div class="card bg-transparent border border-dark rounded-lg"> 
                        <h4 class="text-center p-1 cut-text"> <?=$producto['Name']?></h4>
                        <img title = "<?=$producto['Name']?>" alt="<?=$producto['Name']?>" 
                        src=<?php if(is_file('images/Bebidas/'.$producto['imagen'].'.jpg')){
                                    echo 'images/Bebidas/'.$producto['imagen'].'.jpg';
                                } else {echo 'images/Bebidas/imgND.jpg';}?> 
                        data-toggle="popover" data-trigger="hover" data-content="<?=substr($producto['Descripcion'],0,500).'...'?>"
                        class="card-img p-1" style="z-index: 10;"> 
                        <div class="card-img-overlay text-right mt-5">
                            <h4><?="$ ".$producto['Precio']?></h4>
                            <form method="get" action="Busqueda.php">

                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" min="1" class="text-right w-25" value="1" id="cantidad" name="cantidad" required>
                                </div>
                                <input type="hidden" name="id" id="id" value="<?= $producto['idProductos'] ?>">
                                <button class="btn btn-success w-50 mb-1" type="submit" name="btnAccion" value="Agregar">
                                    Agregar
                                </button>
                            </form>
                            <form method="get" action="detalles.php">
                                <input type="hidden" name="id" id="id" value="<?= $producto['idProductos'] ?>">
                                <button class="btn btn-warning w-50" type="submit" name="" value="">
                                    + Detalles
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- <pagination class="pagination-sm" total-items="1000" items-per-page="10"> </pagination>  -->
        
        <?php if (count($listaProductos)>0) :?>

        <nav aria-label="Page navigation example" max-size="10">
            <ul class="pagination justify-content-center">
                <li class="page-item <?= $_GET['pagina']<=1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="Busqueda.php?pagina=<?=$_GET['pagina']-1?>">Anterior</a>
                </li>
                
                <?php 
                if($_GET['pagina']>5){
                    echo '<li class="page-item">
                            <a class="page-link" href="Busqueda.php?pagina=1">1</a>
                          </li>
                          <li class="page-item disabled">
                            <a class="page-link" href="#">...</a>  
                          </li>';
                }
                ?>

                <?php for($i=($_GET['pagina']<3? 0 : $_GET['pagina']-3) ; $i< ($paginas>6 ? $_GET['pagina']+2 : $paginas) ; $i++):?>
                    <li class="page-item <?= $_GET['pagina']==$i+1 ? 'active' : '' ?>">
                        <a class="page-link" href="Busqueda.php?pagina=<?=$i+1?>"><?=$i+1?></a>
                    </li>
                <?php endfor;?>

                <?php 
                if($paginas>5){
                    echo '  <li class="page-item">
                                <a class="page-link" href="#">...</a> 
                            </li>   
                            <li class="page-item">
                                <a class="page-link" href="Busqueda.php?pagina='.$paginas.'">'.$paginas.'</a>
                            </li>';
                }
                ?>

                <li class="page-item <?= $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">
                    <a class="page-link" href="Busqueda.php?pagina=<?=$_GET['pagina']+1?>">Proxima</a>
                </li>
            </ul>
        </nav>
    </div>


    <nav class="navbar fixed-bottom navbar-expand-md navbar-dark bg-dark">
        <p class="navbar-brand">Filtros</p>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Marca
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tipo
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Graduacion
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Origen
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Precio
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
            <div class="btn-group dropup m-1">
                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Volumen
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
    </nav>
    
    <?php endif;?>
    
    <?php require_once "shared/footer.php" ?>

    <?php require_once "shared/bts-js.php" ?>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        });
    </script>

</body>

</html>