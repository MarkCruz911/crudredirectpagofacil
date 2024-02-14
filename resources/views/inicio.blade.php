@extends('layout/plantilla')

@section('tituloPagina','Crud con laravel 8')

@section('contenido')
<div class="row">
   <div class="card">

  <div class="card">
  <h5 class="card-header">Crud con laravel 8 y mysql</h5>
  <div class="card-body">
    <div class="row">
        <div class="col-sm-12">
            @if($mensaje=Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{$mensaje}}
            </div>
            @endif
        </div>
    </div>
  <p>
    <a href="{{route("personas.create")}}" class="btn btn-primary"><span class="fas fa-user-plus"></span> Agregar Nuevo Producto</a>
  </p>
  <hr>
        <h5 class="card-title text-center">Listado de productos en el sistema</h5>
        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Nombre</th>
                        <th>Fecha nacimiento</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                        <tr>
                            <td>{{$item->paterno}}</td>
                            <td>{{$item->materno}}</td>
                            <td>{{$item->nombre}}</td>
                            <td>{{$item->fecha_nacimiento}}</td>
                            <td>
                                <form action="{{route('personas.edit',$item->id)}}" method='GET'>
                                    <button class="btn btn-warning btn-sm">
                                        <span class="fas fa-user-edit">Editar</span>
                                    </button>
                                </form>
                            </td>

                            <td>
                                <form action="{{route('personas.show',$item->id)}}" method='GET'>
                                    <button class="btn btn-danger btn-sm">
                                        <span class="fas fa-user-times">Eliminar</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>

            </div>
            <div class="row">
                    <div class="col-sm-12">
                        {{$datos->links()}}
                    </div>
            </div>
        </p>
    </div>
    </div>
</div>
</div>

@endsection




