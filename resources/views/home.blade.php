@extends('layout')

@section('content')
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Bienvenido {{\Auth::user()->name}}</div>

            <div class="card-body text-center">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                Estas logueado!
                <div>
                    <button type="button" class="btn btn-primary mx-2 p-1 mt-2">
                        <a href="/" class="text-decoration-none text-reset">
                            {{ __('Ir a inicio') }}
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection