
<script src="{{ URL::asset('js/register-validation.js') }}"></script>


<button type="button" class="btn btn-nav btn-user" data-toggle="modal" data-target="#modalRegister" id="button-register">
    Registrar
</button>

<div class="modal fade bd-example-modal-lg" id="modalRegister" tabindex="-1" role="dialog"
    aria-labelledby="modalRegisterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="h3 m-auto">{{ __('Ingresa tus datos') }}</div>
                <button type="button" class="close ml-0" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body body-register">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="form-register">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Nombre') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Apellido') }}</label>

                        <div class="col-md-6">
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="personal_id"
                            class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Documento') }}</label>

                        <div class="col-md-6">
                            <input id="personal_id" type="number"
                                class="form-control @error('personal_id') is-invalid @enderror" name="personal_id"
                                value="{{ old('personal_id') }}" required autocomplete="personal_id" autofocus>

                            @error('personal_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Correo Electronico') }}</label>

                        <div class="col-md-6">
                            <input id="email-register" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="country" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Pais') }}</label>

                        <div class="col-md-6">
                            <select name="country" id="country"
                                class="form-control @error('country') is-invalid @enderror" required
                                autocomplete="country" autofocus>
                            </select>

                            @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday"
                            class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Fecha de nacimiento') }}</label>

                        <div class="col-md-6">
                            <input id="birthday" type="date"
                                class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                                value="{{ old('fecnac') }}" required autocomplete="birthday">

                            @error('birthday')
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
                            <input id="password-register" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                            class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Confirmar contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="avatar"
                            class="col-md-4 col-form-label text-md-right font-weight-bold">{{ __('Imagen de perfil') }}</label>

                        <div class="col-md-6">
                            <input id="avatar" type="file"
                                class="form-control-file @error('avatar') is-invalid @enderror" name="avatar"
                                value="{{ old('avatar') }}" required autocomplete="avatar" autofocus>
                                <small  class="form-text text-muted text-left">
                                    Formatos admitidos: JPG, PNG, JPEG
                                </small>

                            @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 mx-auto text-center">
                            <button type="submit" class="btn btn-modal">
                                {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>

                </form>

            
            </div>
        </div>
    </div>
</div>