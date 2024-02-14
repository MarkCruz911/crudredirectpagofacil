@extends('layout/plantilla')



@section("tituloPagina","Crear un nuevo registro")


@section('contenido')
<div class="card">
  <h5 class="card-header">Actualizar Nueva Producto</h5>
  <div class="card-body">
    <p class="card-text">
        <form action="{{route('personas.update', $personas->id )}}"method="POST">
            @csrf
            @method('PUT')
            <label for="">Apellido Paterno</label>
            <input type="text" name="paterno" class="form-control" required value="{{$personas->paterno}}">
            <label for="">Apellido Materno</label>
            <input type="text" name="materno" class="form-control" required value="{{$personas->materno}}">
            <label for="">Nombre</label>
            <input type="text" name="nombre" class="form-control" required value="{{$personas->nombre}}">
            <label for="">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required value="{{$personas->fecha_nacimiento}}">
            <br>
            <a href="{{route("personas.index")}}" class="btn btn-warning"> <span class="fas fa-undo-alt">Volver</span></a>
            <button class="btn btn-primary"><span class="fas fa-user-edit">Actualizar</span></button>
        </form>
    </p>
  </div>
</div>
@endsection
