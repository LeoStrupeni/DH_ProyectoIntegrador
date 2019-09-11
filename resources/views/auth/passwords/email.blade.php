<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalReset" id="modalResetBtn">
    {{ __('Olvidaste tu contraseña?') }}
</button>

<div class="modal fade" id="modalReset" tabindex="-2" role="dialog" aria-labelledby="modalReset" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="h3 m-auto">{{ __('Reiniciar Password') }}</div>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form action="{{ route('password.email') }}" class="form" method="POST">
                @csrf
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Correo electronico') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" data-dismiss="modal">
                                {{ __('Enviar link para restablecer password') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>