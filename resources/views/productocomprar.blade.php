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
    <h5 class="card-header">Comprar Producto!</h5>
    <div class="card-body">
      <p class="card-text">
          <div class="alert alert-success" role="alert">
              Estas seguro de comprar este producto?
              <table class="table table-sm table-hover table-bordered" style="background-color: white">
                  <thead>
                      <th>barracodigo</th>
                      <th>descripcion</th>
                      <th>precio</th>
                      <th>stock</th>
                      <th>moneda</th>
                  </thead>
                  <tbody>
                      <tr>
                          <td>{{$loResponseConsultaUno->barracodigo}}</td>
                          <td>{{$loResponseConsultaUno->descripcion}}</td>
                          <td>{{$loResponseConsultaUno->precioventa}}</td>
                          <td>{{$loResponseConsultaUno->stock}}</td>
                          <td>
                            @if ($loResponseConsultaUno->moneda == 1)
                                <span class="fas fa-dollar-sign"></span> Dólares
                            @elseif ($loResponseConsultaUno->moneda == 2)
                                <span class="fas fa-coins"></span> Bolivianos
                            @else
                                Moneda Desconocida
                            @endif
                        </td>
                      </tr>
                  </tbody>
              </table>
              <hr>
              <form action="logicaProductoComprar" method="POST">
                  @csrf
                  @method('POST')
                  <input type="hidden" name="idAdicional" value="{{ $loResponseConsultaUno->id }}">
                  <input type="hidden" name="barracodigo" value="{{ $loResponseConsultaUno->barracodigo }}">
                  <input type="hidden" name="descripcion" value="{{ $loResponseConsultaUno->descripcion }}">
                  <input type="hidden" name="precioventa" value="{{ $loResponseConsultaUno->precioventa }}">
                  <input type="hidden" name="moneda" value="{{ $loResponseConsultaUno->moneda }}">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" required>
                <label for="">Telefono</label>
                <input type="number" name="telefono" class="form-control" required>
                <label for="">PedidoID</label>
                <input type="number" name="pedidoid" class="form-control" required>
                <a href="{{"indexproduct"}}" class="btn btn-warning"> <span class="fas fa-undo-alt">Cancelar Compra</span></a>
                  <button class="btn btn-success" style="background-color: #28a745;">
                  <img src="https://media.licdn.com/dms/image/C4E1BAQEdV_TnfsxniA/company-background_10000/0/1584487555666/pagofacilbolivia_cover?e=2147483647&v=beta&t=DAZMbUpIEhR0W3udoaw_3UnIhqEVgKWIqRXISP_fqDc" alt="Pago Fácil" style="width: 100px; height: 100px; margin-right: 10px;">
                  <span class="fas fa-money-bill-wave">Comprar con Pago Facil</span></button>
              </form>
          </div>
      </p>
    </div>
  </div>

</body>
</html>
