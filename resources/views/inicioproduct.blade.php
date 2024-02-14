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

<div class="row">
   <div class="card">
  <div class="card">
  <h5 class="card-header">Crud de mis productos</h5>
  <div class="card-body">
    <div class="row">
        <div class="col-sm-12">
        </div>
    </div>
  <hr>

  <p>
    <a href="{{"viewstore"}}" class="btn btn-primary"><span class="fas fa-user-plus"></span> Agregar Nuevo Producto</a>
  </p>

        <h5 class="card-title text-center">Listado de productos en el sistema </h5>
        @if ($llResultados){
            <h5>no hay datos</h5>
        }@else
            <h5>Si hay Datos</h5>
        @endif
        @if ($llAlmacenadoUno)

        @else
            <h5>NO SE SE GUARDARON LOS DATOS, YA QUE NO ENVIO BARRA DE CODIGO</h5>
        @endif
        @if ($llDescripcionUno)

        @else
            <h5>NO SE SE GUARDARON LOS DATOS, YA QUE NO ENVIO LA DESCRIPCION</h5>
        @endif
        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm ">
                    <thead>
                        <th>Barra Codigo</th>
                        <th>Descripcion</th>
                        <th>Precio Compra</th>
                        <th>Precio Venta</th>
                        <th>Stock</th>
                        <th>Mondena</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <th>Comprar Con Pago Facil</th>
                    </thead>
                    <tbody>
                        @foreach ($loEjecutarConsulta as $item)
                        @if ($item->estado==1)
                        <tr>
                            <td>{{$item->barracodigo}}</td>
                            <td>{{$item->descripcion}}</td>
                            <td>{{$item->preciocompra}}</td>
                            <td>{{$item->precioventa}}</td>
                            <td>{{$item->stock}}</td>
                            <td>
                                @if ($item->moneda == 1)
                                    <span class="fas fa-dollar-sign"></span> Dólares
                                @elseif ($item->moneda == 2)
                                    <span class="fas fa-coins"></span> Bolivianos
                                @else
                                    Moneda Desconocida
                                @endif
                            </td>

                            <td>
                                <form action="viewEdit" method='GET'>
                                    <input type="hidden" name="idAdicional" value="{{ $item->id }}">
                                    <button class="btn btn-warning btn-sm">
                                        <span class="fas fa-user-edit">Editar</span>
                                    </button>
                                </form>
                            </td>

                            <td>
                                <form action="showProduct" method='GET'>
                                    <input type="hidden" name="idAdicional" value="{{ $item->id }}">
                                    <button class="btn btn-danger btn-sm">
                                        <span class="fas fa-user-times">Eliminar</span>
                                    </button>
                                </form>
                            </td>

                            <td>
                                <form action="showProductComprar" method='GET'>
                                    <input type="hidden" name="idAdicional" value="{{ $item->id }}">
                                    <button class="btn btn-success btn-sm">
                                        <span class="fas fa-money-bill-wave">Vender</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <hr>

            </div>

        </p>
    </div>
    </div>
</div>
</div>
</body>
</html>




