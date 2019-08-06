<?php
// include 'global/config.php';
// include 'global/conexion.php';

if($_SERVER['REQUEST_METHOD']=='POST'){ 
    
    $query="SELECT `idMarcas` FROM `prod_marcas` where `Nombre` = :marca";
    $sentencia=$pdo->prepare($query);
    $sentencia->bindparam(':marca',$_POST['marca']);   
    $sentencia->execute(); 
    $idMarca=$sentencia->fetch(PDO::FETCH_ASSOC);

    $query="SELECT idCategoria FROM `prod_categorias` WHERE `Nombre` = :subcategoria";
    $sentencia=$pdo->prepare($query);
    $sentencia->bindparam(':subcategoria',$_POST['subcategoria']);   
    $sentencia->execute(); 
    $idSubcategoria=$sentencia->fetch(PDO::FETCH_ASSOC);

    // var_dump($idMarca);
    // var_dump($idSubcategoria);
    // var_dump($_POST);
    // var_dump($_FILES);exit;

    $statement = $pdo->prepare(
    'INSERT INTO `productos_usuarios`
        (`idProductos`, `IdUsuario`, `Name`, `Descripcion`, `Precio`, `Graduacion`, `Origen`, `imagen`, 
        `Anio`, `Volumen`, `Marcas_idMarcas`, `Categoria`) 
    VALUES (NULL,"1",:NOMBRE,:DESCRIPCION,:PRECIO,:GRADUACION,:ORIGEN,:IMAGEN,
        :ANIO,:VOLUMEN,:MARCA,:CATEGORIA)');

    $statement ->execute(array(
    ':NOMBRE'=>$_POST['nombre'],
    ':DESCRIPCION'=>$_POST['descripcion'],
    ':PRECIO'=>$_POST['precio'],
    ':GRADUACION'=>$_POST['graduacion'],
    ':ORIGEN'=>$_POST['Origen'],
    ':ANIO'=>$_POST['anio'],
    ':VOLUMEN'=>$_POST['volumen'],
    ':IMAGEN'=>$_FILES['foto']['name'],
    ':MARCA'=>$idMarca['idMarcas'],
    ':CATEGORIA'=>$idSubcategoria['idCategoria']
    ));

    $query="SELECT max(`idProductos`) as ID FROM `productos_usuarios`";
    $sentencia=$pdo->query($query);
    $id=$sentencia->fetch(PDO::FETCH_ASSOC);

    if($_FILES) {
        if($_FILES["foto"]["error"] != 0) {
            echo "Hubo un error en la carga. Error numero: ".$_FILES["foto"]["error"]."<br>";
        } else {
            $ext = pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png") {
                echo "La extension de la imagen ".$ext." no se puede cargar. Solo puede carga jpg, jpeg o png.";
            } else {
                move_uploaded_file ($_FILES["foto"]["tmp_name"],"images/productosUsuarios/ImgProducto".$id['ID'].".jpg");
            };
        };
    };

    header('Location: perfil.php');
}
?>

    <?php
        $query="SELECT distinct `Nombre` FROM `prod_marcas`";
        $sentencia=$pdo->query($query);  
        $listaMarcas=$sentencia->fetchall(PDO::FETCH_ASSOC);  

        $query="SELECT `Nombre` FROM `prod_categorias` 
            WHERE `idCategoria` IN (SELECT DISTINCT `idCategoriaPadre` FROM `prod_categorias`)";
        $sentencia=$pdo->query($query);   
        $listaCatPadre=$sentencia->fetchall(PDO::FETCH_ASSOC);  
        
        $query="SELECT `Nombre`,`idCategoriaPadre` FROM `prod_categorias` 
                WHERE `idCategoria` NOT IN (SELECT DISTINCT `idCategoriaPadre` FROM `prod_categorias`)";
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

<div class="my-2">
    <div class="card">
        <div class="header mt-4">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 m-0">
                        <div class="form-group row">
                            <label class="col-md-2 control-label text-right cut-text m-0 p-1">Nombre:</label>
                            <input type="text" class="col-md-10 form-control" name="nombre" required>
                        </div>
                    </div>

                    <div class="col-md-4 p-0 m-0">
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right cut-text m-0 p-1">Precio:</label>
                            <input type="number" class="col-md-6 form-control text-center" name="precio" required>
                        </div>
                    </div>

                    <div class="col-md-2 p-0 m-0">
                        <div class="form-group row">
                            <label class="col-md-3 control-label text-right cut-text m-0 p-1">Año:</label>
                            <input type="number" min="1990" max="<?=date("Y");?>" value="<?=date("Y");?>" class="col-md-5 form-control" name="anio">
                        </div>
                    </div>
               </div>
        
                <div class="col-12 form-group">
                    <label class="control-label">Descripcion del Producto: </label>
                    <textarea class="form-control" name="descripcion" rows="5"></textarea>
                </div>


                <div class="row">
                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1">Marca:</label>
                            <select class="col-md-6 custom-select custom-select-sm" name="marca" required>
                                <option selected></option>
                                <?php foreach ($listaMarcas as $marca) :?>
                                <option value="<?=$marca['Nombre']?>"><?=$marca['Nombre']?></option>
                                <?php endforeach;?> 
                            </select>
                        </div>
                    </div>

                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1">Categoria:</label>
                            <select class="col-md-6 custom-select custom-select-sm" name="categoria" required>
                                <option selected></option>
                                <?php foreach ($listaCatPadre as $catPadre) :?>
                                <option value="<?=$catPadre['Nombre']?>"><?=$catPadre['Nombre']?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>


                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1">Subcategoria:</label>
                            <select class="col-md-6 custom-select custom-select-sm" name="subcategoria" required>
                                <option selected></option>
                                <?php foreach ($listaSubCat as $subCat) :?>
                                <option value="<?=$subCat['Nombre']?>"><?=$subCat['Nombre']?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1">Graduacion:</label>
                            <select class="col-md-6 custom-select custom-select-sm" name="graduacion" required>
                                <option selected></option>
                                <?php foreach ($graduaciones as $graduacion) :?>
                                <option value="<?=$graduacion['GRAD']?>"><?=$graduacion['GRAD']." %"?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>

                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1">Origen:</label>
                            <select class="col-md-6 custom-select custom-select-sm" name="Origen" required>
                                <option selected></option>
                                <?php foreach ($origenes as $origen) :?>
                                <option value="<?=$origen['Origen']?>"><?=$origen['Origen']?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>

                    <div class="col-8 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-4 control-label text-right cut-text m-0 p-1">Volumen:</label>
                            <select class="col-md-6 custom-select custom-select-sm" name="volumen" required>
                                <option selected></option>
                                <?php foreach ($volumenes as $volumen) :?>
                                <option value="<?=$volumen['Volumen']?>"><?=$volumen['Volumen']." ml"?></option>
                                <?php endforeach;?>  
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row ml-5">
                    Select a file: <input type="file" name="foto" class="col-4 form-control-file">
                </div>

                <div class="row">
                    <div class="col text-center my-2">
                        <button type="submit" class="btn btn-danger btn-lg">Agregar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>