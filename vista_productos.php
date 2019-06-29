
<?php require_once "shared/productos.php" ?>

<!DOCTYPE html >

<html lang="es" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">                        
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  <title>Vista de Productos</title>
</head>


<body>
        <div class="container">
        
            <?php require_once "shared/nav.php" ?>

            <?php require_once "shared/main.php" ?>
				
		</div>
                <div class="container">
				
                <div class="row productos" >
                <?php foreach ($productos as $producto){ ?>
                        <div class="col-md-6 col-lg-4 text-center"  ><a href="#" class="prueba" data-toggle="modal" data-target="#modalNombre">
                        <img alt="" src="images/<?=$producto["foto"]?>" class="img-fluid img-thumbnail"/>
                        <!-- <h2>
                        <?=$producto["nombreDelProducto"]?></h2>
                        </h2> -->
                        <p>
                        <?=$producto["descripcion"]?></p>
                        <p>
                        </a>
                        </p> <a href="#" class="btn btn-success" type="button">COMPRAR <?=$producto["precio"]?></a>
                    </div>
                    
				
                    <!-- Modal -->
                    
            <div class="modal fade" id="modalNombre" tabindex="-1" role="dialog" aria-labelledby="#exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?=$producto["nombreDelProducto"]?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
				  <div class="modal-body text-center" style="background-color:black;">
	
					<img alt="" src="images/<?=$producto["foto"]?>" class="img-fluid img-thumbnail"/>
					<p id="precio"><?=$producto["precio"]?></p>
					<p><?=$producto["descripcionLarga"]?></p>
					
					<div class="container">
 
					        
  <table class="table table-bordered">
    <thead>
      <tr>
        <td>Capacidad</td>
        <td><?=$producto["capacidad"]?></td>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>Añejamiento</td>
        <td><?=$producto["anejamiento"]?></td>
        </tr>
      <tr>
        <td>Graduación Alcohólica</td>
        <td><?=$producto["graduacionAlcoholica"]?></td>
        </tr>
      <tr>
        <td>Disponibilidad</td>
        <td><?=$producto["disponibilidad"]?></td>
        </tr>
    </tbody>
  </table>
</div>
</div>
				  
                  <div class="modal-footer align-middle">
                  <input type="number" class="btn btn-secondary align-middle" name="qty_89638" min="1" max="5" value="1">
                  <button type="button" class="btn btn-success align-middle">Añadir al Carrito</button>
                  </div>
                </div>
              </div>
			</div>
				
            <?php } ?>
                    
                <?php require_once "shared/footer.php" ?>

                <?php require_once "shared/bts-js.php" ?>
		</div>
				
</body>

</html>