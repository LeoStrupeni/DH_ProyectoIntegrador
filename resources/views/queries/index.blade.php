@extends('layout')

@section('title', 'Consultas')

@section('js')
<script src="{{ URL::asset('js/deletions.js') }}"></script>
@endsection

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
                <td>{{substr($query->message, 0, 50)}}</td>
                <td>
                    <form action="{{route('queries.destroy', $query->id)}}" method="POST" class="form-queries">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger delete-query" value="Borrar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row text-center mx-auto mt-1">
        <div class="col-md-6 offset-5">
            {{$queries->links()}}
        </div>
    </div>
</div>
@endsection