<button type="button" class="list-group-item btn-foot" data-toggle="modal" data-target="#modalContacto">
    Contacto
</button>

<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContactoTitulo"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modalContacto">Contactate con nosotros</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body body-contact">
                <div class="row mx-auto text-center">

                    <form action="{{route('queries.store')}}" method="POST" class="mx-auto form-contacto">
                        @csrf
                        <div class="form-group">
                            <b>Dejanos tus datos y nos pondremos en contacto con vos</b>
                        </div>
                        <div class="form-group">
                            <label for="nombre" class="font-weight-bold">Nombre</label>
                            <input type="text" name="name" id="nombre-contact" class="form-control"
                                placeholder="Tu nombre" required>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" name="email" id="email-contact" class="form-control"
                                placeholder="Tu email" required>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="font-weight-bold">Teléfono</label>
                            <input class="form-control" id="telefono-contact" type="tel" name="phone" value=""
                                {{-- pattern="[1-9]{10}" title="Ingresá tu celular con el formato 3416772339" --}}
                                placeholder="Tu teléfono" required>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="porque" class="font-weight-bold">Mensaje</label>
                            <textarea name="message" id="message-contact" class="form-control" rows="3"></textarea>

                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="modal-footer mx-auto justify-content-center">
                            <button type="submit" class="btn btn-amarillo font-weight-bold">Enviar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>