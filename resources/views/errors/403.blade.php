@extends('layout')

@section('title', 'Acceso restringido')

@section('content')
<div class="row justify-content-center">
    <h1 class="display-4 text-center mt-4">Lo siento, no tenes el permiso suficiente</h1>
</div>
<div class="row justify-content-center">
    <button class="btn btn-warning mt-4">
        <a href="{{url()->previous()}}" class="text-reset">Volver</a>
    </button>
</div>

@endsection