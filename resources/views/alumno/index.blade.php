@extends('template.base')

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{$alumno->id}}</td>
            <td>{{$alumno->nombre}}</td>
            <td>{{$alumno->apellidos}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('alumno.show', $alumno->id)}}" class="btn btn-sm btn-primary">Ver</a>
                    <a href="{{route('alumno.edit', $alumno->id)}}" class="btn btn-sm btn-secondary">Editar</a>
                    <!-- <form action="{{route('alumno.destroy', $alumno->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                    </form> -->
                    <a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-title="{{$alumno->nombre}}" data-delurl="{{route('alumno.destroy', $alumno->id)}}">Eliminar</a>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <th colspan="4">Alumnos en total: {{$alumnos->count()}}</th>
    </tfoot>
</table>
<div class="modal" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar alumno</h5>
            </div>
            <div class="modal-body">
                <p>¿Seguro que quieres borrar el alumno <b id="deleteTitle">No name</b>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button form="alumnoDeleter" type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<form id="alumnoDeleter" action="" method="post">
    @csrf
    @method('delete')
</form>
@endsection