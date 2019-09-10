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
                    <form action="{{route('suscriptors.destroy', $suscriptor->id)}}" method="POST"
                        class="form-suscriptor">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger delete-suscriptor" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row text-center mx-auto mt-1">
        <div class="col-md-6 offset-5">
            {{$suscriptors->links()}}
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/deletions.js') }}"></script>
@endsection