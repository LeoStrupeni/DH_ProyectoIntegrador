@extends('layout')

@section('title', 'Consultas')

@section('content')
<div class="table-responsive-md h-100">
    <table class="table table-hover flex-grow-1">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de envio</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Usuario registrado</th>
                <th scope="col">Mensaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($queries as $query)
            <tr>
                <th scope="row">{{$query->id}}</th>
                <td>{{$query->name}}</td>
                <td>{{$query->created_at->format('d/m/Y')}}</td>
                <td>
                    <a href="mailto:{{$query->email}}">{{$query->email}}</a>
                </td>
                <td>{{$query->phone}}</td>
                <td>
                    @if ($query->is_registered == 1)
                    Si
                    @else
                    No
                    @endif
                </td>
                <td>{{$query->message}}</td>
                <td>
                    <form action="{{route('queries.destroy', $query->id)}}" method="POST">
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