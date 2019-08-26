<button type="button" class="btn btn-newsletter shadow rounded-circle" data-toggle="modal" data-target="#modalNewsletter">
    <i class="far fa-envelope text-white"></i>
</button>

<div class="modal fade" id="modalNewsletter" tabindex="-1" role="dialog" aria-labelledby="modalNewsletter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalNewsletter">Newsletter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="index.php" class="form" method="post">

                <div class="modal-body text-center">

                    <h6 class="pb-3">Registrate para recibir todas nuestras novedades</h6>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                </div>

                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-modal">Registrar</button>
                </div>

            </form>

        </div>
    </div>
</div>