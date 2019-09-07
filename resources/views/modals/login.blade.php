<button type="button" class="btn btn-nav btn-user" data-toggle="modal" data-target="#modalLogin">
    Ingresar
</button>

<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="h3 m-auto">{{ __('Ingresa tus datos') }}</div>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <form action="{{ route('login') }}" class="form" method="POST">
                <div class="modal-body">
                    @csrf

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

                    <div class="form-group row">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label align-middle" for="remember">
                                    {{ __('Recordarme') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-3">
                            <button type="submit" class="btn btn-modal mr-1">
                                {{ __('Ingresar') }}
                            </button>

                            @if (Route::has('password.request'))
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalReset"
                                id="modalResetBtn">
                                {{ __('Olvidaste tu contraseña?') }}
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>

            <form action="{{ route('password.email') }}" class="form" method="POST" id="formReset">
                @csrf
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

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

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Enviar link para restablecer password') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>