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

            <div class="modal-body">
                <div class="row mx-auto text-center">

                    <form action="{{route('queries.store')}}" method="POST" class="mx-auto">
                        @csrf
                        <div class="form-group">
                            <b>Dejanos tus datos y nos pondremos en contacto con vos</b>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="name" id="nombre" class="form-control" placeholder="Tu nombre"
                                required>
                                
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Tu email"
                                required>
                                
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input class="form-control" id="telefono" type="tel" name="phone" value=""
                                {{-- pattern="[1-9]{10}" title="Ingresá tu celular con el formato 3416772339" --}}
                                placeholder="Tu teléfono" required>
                                
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="porque"><b>Mensaje</b></label>
                            <textarea name="message" id="porque" class="form-control" rows="3"></textarea>
                            
                            @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="modal-footer mx-auto justify-content-center">
                            <button type="submit" class="btn btn-amarillo">Enviar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>