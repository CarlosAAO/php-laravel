@extends('layouts.app')

@section('content')
<div class="container">

    @if(Session::has('mensaje'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ Session::get('mensaje')  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    
    @endif

<br>
<a href="{{ url('empleado/create') }}" class="btn btn-success"> Crear Empleado </a>
<br>
<br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $e)
        <tr>
            <td>{{ $e->id }}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$e->Foto}}" width="60" alt="">
            </td>
            <td>{{ $e->Nombre }}</td>
            <td>{{ $e->ApellidoPaterno }}</td>
            <td>{{ $e->ApellidoMaterno }}</td>
            <td>{{ $e->Correo }}</td>
            <td>
                <a href="{{ url('/empleado/'.$e->id.'/edit') }}" class="btn btn-warning"> Editar </a> 
                 |
                <form action="{{ url('/empleado/'.$e->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger" type="submit"  onclick="return confirm('Deseas Borrar?')" value="Borrar">
                </form>
        
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
</div>
@endsection

