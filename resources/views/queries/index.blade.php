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
                <th>{{$query->name}}</th>
                <th>{{$query->created_at->format('d/m/Y')}}</th>
                <th>
                    <a href="mailto:{{$query->email}}">{{$query->email}}</a>
                </th>
                <th>{{$query->phone}}</th>
                <th>
                    @if ($query->is_registered == 1)
                    Si
                    @else
                    No
                    @endif
                </th>
                <th>{{substr($query->message, 0, 50)}}</th>
                <th>
                    <form action="{{route('queries.destroy', $query->id)}}" method="POST" class="form-queries">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger delete-query" value="Borrar">
                    </form>
                </th>
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

@section('js')
<script src="{{ URL::asset('js/deletions.js') }}"></script>
@endsection