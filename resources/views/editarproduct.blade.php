<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <title>@yield('tituloPagina')</title>
</head>
<body>
<div class="card">
    <h5 class="card-header">Actualizar Producto</h5>
    <div class="card-body">
      <p class="card-text">
          <form action="updateproduct" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" name="idAdicional" value="{{ $loProduct->id }}">
              <label for="">Barra de codigo</label>
              <input type="text" name="barracodigo" class="form-control" value="{{$loProduct->barracodigo}}">
              <label for="">Descripcion</label>
              <input type="text" name="descripcion" class="form-control" value="{{$loProduct->descripcion}}">
              <label for="">Precio de Compra</label>
              <input type="number" name="preciocompra" class="form-control" required value="{{$loProduct->preciocompra}}">
              <label for="">Precio de Venta</label>
              <input type="number" name="precioventa" class="form-control" required value="{{$loProduct->precioventa}}">
              <label for="">Stock</label>
              <input type="number" name="stock" class="form-control" required value="{{$loProduct->stock}}">
              <br>
              <a href="{{"indexproduct"}}" class="btn btn-warning"> <span class="fas fa-undo-alt">Volver</span></a>
              <button class="btn btn-primary"><span class="fas fa-user-edit">Actualizar</span></button>
          </form>
      </p>
    </div>
  </div>
</body>
</html>
