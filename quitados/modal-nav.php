<!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

        <!--Modal cascading tabs-->
        <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link  " data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                Register</a>
            </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
            <!--Panel 7-->
            <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

            <!--Body-->
            <div class="modal- ">
                <div class="container">
                    <div class="card bg-black">
                        <div class="row no-gutters">
                            <div class="col-md-6">
                                <img src="images/Bienvenida.jpg" class="card-img" alt="...">
                            </div>
                            <div class="col-md-6 m-auto">
                                <form action="index.php" class="text-light form" method="POST">
                                    <div class="form-group">
                                        <label for="email">EMAIL</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">CONTRASEÑA</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                    </div>
                                    <div>
                                        <input type="checkbox" name="Recordar" value="recuerdo" checked>Recordame
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-secondary active">ENTRAR</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <div class="options text-center text-md-right mt-1">
                <a href="#" class="blue-text">Olvido su contraseña?</a>
                </div>
                <button type="button" class="btn btn-secondary waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>

            </div>
            <!--/.Panel 7-->

            <!--Panel 8-->
            <div class="tab-pane fade" id="panel8" role="tabpanel">

            <!--Body-->
            <div class="modal-body">
                <?php require_once "register.php";?>
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>
            </div>
            <!--/.Panel 8-->
        </div>

        </div>
    </div>
    <!--/.Content-->
    </div>
</div>
<!--Modal: Login / Register Form-->

<div class="text-center">
    <a href="" class="btn btn-secondary" data-toggle="modal" data-target="#modalLRForm">Login / Register</a>
</div>        


</div>