<!DOCTYPE html>
<html lang="en">

<?php 
        $nombre = "Perfil User";
        include ("head.php") ?>
<body>


<body class="pt-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <img src="images/profile-placeholder.png" alt="Perfil"
                    class="img-fluid mx-auto d-block rounded-circle perfil">
            </div>
            <div class="col-sm-12">
                <h1 class="text-center">Hola, $USERNAME</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab"
                            aria-controls="billing" aria-selected="false">Facturacion</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form class="mt-1" action="">
                            <div class="form-group">
                                <label for="username">Nombre de Usuario</label>
                                <input class="form-control" type="text" placeholder="Username" readonly>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" placeholder="Su nombre...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="apellido">Apellido</label>
                                    <input type="text" class="form-control" placeholder="Su apellido...">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email" class="form-control" placeholder="nombre@email.com">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tel">Numero de telefono</label>
                                    <input type="tel" name="" id="" class="form-control" placeholder="+549...">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="imagen-perfil">Foto de perfil</label>
                                <input type="file" class="form-control-file">
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="billing" role="tabpanel" aria-labelledby="billing-tab">
                        <form action="" class="mt-1">
                            <div class="form-group">
                                <label for="tipo-comerciante">Tipo de Comerciante</label>
                                <select class="custom-select">
                                    <option selected>Tipo...</option>
                                    <option value="1">Minorista</option>
                                    <option value="2">Mayorista</option>
                                    <option value="2">Consumidor final</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="direccion-envio">Direccion de facturacion</label>
                                <input type="text" name="" id="" placeholder="Direccion..." class="form-control">
                                <small class="form-text text-muted">Solamente aplicable como direccion de
                                    facturacion!</small>
                            </div>
                            <div class="form-group">
                                <label for="tarjetas">Tarjetas asociadas</label>
                                <input type="text" name="" id="" placeholder="Mostrar tarjetas asociadas..."
                                    class="form-control">
                            </div>
                    </div>

                    </form>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-6 text-center mb-2">
                <button type="button" class="btn btn-success">Guardar</button>
            </div>
            <div class="col-md-6 text-center">
                <button type="button" class="btn btn-danger">Descartar</button>
            </div>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>