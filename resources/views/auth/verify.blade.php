@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu direccion de correo electronico') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Un link de confirmacion ha sido enviado a tu casilla de correo') }}
                    </div>
                    @endif

                    {{ __('Antes de proceder, por favor verifica tu correo') }}
                    {{ __('Si no recibiste el correo, por favor') }}, <a
                        href="{{ route('verification.resend') }}">{{ __('clickea aqui para volver a enviar') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection