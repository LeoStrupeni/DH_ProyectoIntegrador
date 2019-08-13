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
                                LEFT JOIN prod_categorias C ON p.Categoria = c.ID
                                LEFT JOIN prod_marcas M ON P.Marcas_idMarcas = M.ID
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
                                LEFT JOIN prod_categorias C ON p.Categoria = c.ID
                                LEFT JOIN prod_marcas M ON P.Marcas_idMarcas = M.ID
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
                        class="card-img p-1 img-fluid" style="z-index: 10;"> 
                        <div class="card-img-overlay text-right mt-5">
                            <h5><?="$ ".$producto['Precio']?></h5>
                            <form method="get" action="Busqueda.php">

                                <div class="form-group">
                                    <label for="cantidad" style="font-size:1vw;">Cantidad</label>
                                    <input type="number" min="1" class="text-right w-25" value="1" id="cantidad" name="cantidad" required>
                                </div>
                                <input type="hidden" name="id" id="id" value="<?= $producto['ID'] ?>">
                                <button class="btn btn-success w-50 mb-1" type="submit" name="btnAccion" value="Agregar" style="font-size:1vw;">
                                    Agregar
                                </button>
                            </form>
                            <form method="get" action="detalles.php">
                                <input type="hidden" name="id" id="id" value="<?= $producto['ID'] ?>">
                                <button class="btn btn-warning w-50" type="submit" name="" value="" style="font-size:1vw;">
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


    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <p class="navbar-brand">Filtros</p>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php
                $query="SELECT distinct `Nombre` FROM `prod_marcas`";
                $sentencia=$pdo->query($query);  
                $listaMarcas=$sentencia->fetchall(PDO::FETCH_ASSOC);  

                $query="SELECT `Nombre` FROM `prod_categorias` 
                    WHERE `ID` IN (SELECT DISTINCT `IDPadre` FROM `prod_categorias`)";
                $sentencia=$pdo->query($query);   
                $listaCatPadre=$sentencia->fetchall(PDO::FETCH_ASSOC);  
                
                $query="SELECT `Nombre`,`IDPadre` FROM `prod_categorias` 
                        WHERE `ID` NOT IN (SELECT DISTINCT `IDPadre` FROM `prod_categorias`)";
                $sentencia=$pdo->query($query);   
                $listaSubCat=$sentencia->fetchall(PDO::FETCH_ASSOC);  

                $query="SELECT DISTINCT ROUND(`Graduacion`*100,0) as GRAD
                        FROM `productos` WHERE `Graduacion` IS NOT NULL ORDER BY GRAD";
                $sentencia=$pdo->query($query); 
                $graduaciones=$sentencia->fetchall(PDO::FETCH_ASSOC);  

                $query="SELECT DISTINCT `Origen` FROM `productos` WHERE `Origen` IS NOT NULL ORDER BY `Origen`";
                $sentencia=$pdo->query($query); 
                $origenes=$sentencia->fetchall(PDO::FETCH_ASSOC);  
                

                $query="SELECT DISTINCT `Volumen` from productos WHERE `Volumen` IS NOT NULL ORDER BY `Volumen`";
                $sentencia=$pdo->query($query);
                $volumenes=$sentencia->fetchall(PDO::FETCH_ASSOC);  
            ?>

            <form action="" method="">
                <div class="form-group row">
                    <div class="col-2">
                        <input list="marca" placeholder="Marca" class="w-100 rounded">
                        <datalist id="marca">
                            <?php foreach ($listaMarcas as $marca) :?>
                            <option value="<?=$marca['Nombre']?>">
                            <?php endforeach;?> 
                        </datalist> 
                    </div>

                    <div class="col-2">
                        <select class="custom-select custom-select-sm" name="categoria">
                            <option selected>Categoria</option>
                            <?php foreach ($listaCatPadre as $catPadre) :?>
                            <option value="<?=$catPadre['Nombre']?>"><?=$catPadre['Nombre']?></option>
                            <?php endforeach;?>  
                        </select>
                    </div>
                   
                    <div class="col-2">
                        <select class="custom-select custom-select-sm" name="subcategoria">
                            <option selected>Sub Categoria</option>
                            <?php foreach ($listaSubCat as $subCat) :?>
                            <option value="<?=$subCat['Nombre']?>"><?=$subCat['Nombre']?></option>
                            <?php endforeach;?>  
                        </select>
                    </div>

                    <div class="col-2">
                        <select class="custom-select custom-select-sm" name="graduacion">
                            <option selected>Graduacion</option>
                            <?php foreach ($graduaciones as $graduacion) :?>
                            <option value="<?=$graduacion['GRAD']?>"><?=$graduacion['GRAD']." %"?></option>
                            <?php endforeach;?>  
                            </select>
                    </div>

                    <div class="col-2">
                        <select class="custom-select custom-select-sm" name="graduacion">
                            <option selected>Origen</option>
                            <?php foreach ($origenes as $origen) :?>
                            <option value="<?=$origen['Origen']?>"><?=$origen['Origen']?></option>
                            <?php endforeach;?>  
                            </select>
                    </div>

                    <div class="col-2">
                        <select class="custom-select custom-select-sm" name="graduacion">
                            <option selected>Volumen</option>
                            <?php foreach ($volumenes as $volumen) :?>
                            <option value="<?=$volumen['Volumen']?>"><?=$volumen['Volumen']." ml"?></option>
                            <?php endforeach;?>  
                            </select>
                    </div>

                </div>
            </form>
       
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