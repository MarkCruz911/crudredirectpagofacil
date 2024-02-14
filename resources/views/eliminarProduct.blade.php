<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <title>@yield('tituloProductosss')</title>
  </head>
  <body>
<div class="card">
    <h5 class="card-header">Eliminar un Producto!</h5>
    <div class="card-body">
      <p class="card-text">
          <div class="alert alert-danger" role="alert">
              Estas seguro de eliminar este Producto?
              <table class="table table-sm table-hover table-bordered" style="background-color: white">
                  <thead>
                      <th>barracodigo</th>
                      <th>descripcion</th>
                      <th>preciocompra</th>
                      <th>precioventa</th>
                      <th>stock</th>
                      <th>estado</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td>{{$loResponseConsultaUno->barracodigo}}</td>
                          <td>{{$loResponseConsultaUno->descripcion}}</td>
                          <td>{{$loResponseConsultaUno->preciocompra}}</td>
                          <td>{{$loResponseConsultaUno->precioventa}}</td>
                          <td>{{$loResponseConsultaUno->stock}}</td>
                          <td>{{$loResponseConsultaUno->estado}}</td>
                      </tr>
                  </tbody>
              </table>
              <hr>
              <form action="destroyProduct" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="idAdicional" value="{{ $loResponseConsultaUno->id }}">
              <a href="{{"indexproduct"}}" class="btn btn-warning"> <span class="fas fa-undo-alt">Volver</span></a>
                  <button class="btn btn-danger"> <span class="fas fa-user-times">Eliminar</span></button>
              </form>
          </div>
      </p>
    </div>
  </div>

</body>
</html>

