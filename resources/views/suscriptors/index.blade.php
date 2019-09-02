@extends('layout')

@section('title', 'Suscriptores')

@section('content')

<div class="table-responsive-md">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha de suscripcion</th>
                <th scope="col">Es activo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suscriptors as $suscriptor)
            <tr>
                <th scope="row">{{$suscriptor->id}}</th>
                <td>{{$suscriptor->email}}</td>
                <td>{{$suscriptor->created_at}}</td>
                <td>
                    @if ($suscriptor->is_active)
                    Si
                    @else
                    No
                    @endif
                </td>
                <td>
                    <form action="{{route('suscriptors.destroy', $suscriptor->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@notify_css
@notify_js
@notify_render
@endsection