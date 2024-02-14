<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{

    public function ListarProductos(Request $toRequest)
    {   $loEjecutarConsulta;
        $llResultados=false;
        $llAlmacenadoUno=Session::get('llAlmacenado', true);
        $llDescripcionUno=Session::get('llDescripcion',true);
        try {
            $lcConsultaProductos = "";

            if (isset($toRequest->tnId) && $toRequest->tnId > 0) {
                $lcConsultaProductos = "SELECT * FROM products WHERE barracodigo = $toRequest->tnId ORDER BY barracodigo DESC";
            } else {
                $lcConsultaProductos = "SELECT * FROM products ORDER BY barracodigo DESC";
            }

        $loEjecutarConsulta = DB::select($lcConsultaProductos);


        if(empty($loEjecutarConsulta)){
            $llResultados=true;
        }else{
            $llResultados=false;
        }

        } catch (\Throwable $th) {
            //print_r("Ingreso al catch", $th);
            $llResultados=true;
        }

        return view('inicioproduct',compact('loEjecutarConsulta','llResultados','llAlmacenadoUno','llDescripcionUno'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Pagina de inicio
        //$datos = Products::orderBy('barracodigo','desc');


        $lcConsultaProductos = "SELECT * FROM products ORDER BY barracodigo DESC";
        $loEjecutarConsulta = DB::select($lcConsultaProductos);

        print_r($loEjecutarConsulta);
        //return view('inicioproduct',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function almacenarEnLaBaseDatos(Request $toRequest)
    {
        try {
            $llAlmacenado=false;
            $llDescripcion=false;
            $llResultados=true;

            $barracodigo = $toRequest->post('barracodigo');
            $descripcion = $toRequest->post('descripcion');
            $preciocompra = $toRequest->post('preciocompra');
            $precioventa = $toRequest->post('precioventa');
            $stock = $toRequest->post('stock');
            $estado = 1;
            $moneda=2;
            print_r($barracodigo);
            print_r($descripcion);
            print_r($preciocompra);
        $loProductoAlmacenar = "";
        if($barracodigo>0 && isset($barracodigo)){
            if(isset($descripcion)&&!empty(trim($descripcion))){

                    $lcIntroducirProductos = "INSERT INTO products (barracodigo,descripcion,preciocompra,precioventa,stock,estado,moneda) VALUES (
                        '{$barracodigo}',
                        '{$descripcion}',
                        '{$preciocompra}',
                        '{$precioventa}',
                        '{$stock}',
                        '{$estado}',
                        '{$moneda}'
                                        )";

                    $loEjecutarInsert = DB::insert($lcIntroducirProductos);
                    $lcConsultaProductos = "SELECT * FROM products ORDER BY barracodigo DESC";
                    $llAlmacenado=true;

                    print_r("se alamaceo a la base de datos: ");
                    $llResultados=false;
                    $llDescripcion=true;


            }else{
                $llAlmacenado=true;
                print_r("No llegó la barra de codigo");
            }

        }else{
            $llDescripcion=true;
            print_r("No llegó la barra de codigo");
        }
    } catch (\Throwable $th) {
        print_r($th);
    }
    Session::flash('llAlmacenado',$llAlmacenado);
    Session::flash('llDescripcion',$llDescripcion);
    return redirect("/indexproduct");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProduct(Request $request)
    {
        return view('agregarproduct');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function showProduct(Request $toRequest)
    {
        //$personas = Personas::find($id);
        $lnIdProducto=$toRequest->input('idAdicional');
        print_r($toRequest->input('idAdicional'));
        $lcConsultaProductos = "SELECT * FROM products WHERE id = $lnIdProducto";
        print_r($lcConsultaProductos);
        $loResponseConsulta = DB::select($lcConsultaProductos);
        $loResponseConsultaUno=$loResponseConsulta[0];
        print_r("/////////////////////////////////////////////");
        print_r($loResponseConsultaUno);
        print_r("/////////////////////////////////////////////");
        print_r($loResponseConsulta);
        return view("eliminarProduct",compact('loResponseConsultaUno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */

    public function editProduct(Request $toRequest)
    {
        try{
            $llActualizar=false;
            print_r($toRequest->input('idAdicional'));
            $lnIdProducto=$toRequest->input('idAdicional');
            $lcConsultaProductos = "SELECT * FROM products WHERE id = $lnIdProducto";
            print_r($lcConsultaProductos);
            $loProduct = DB::select($lcConsultaProductos);
        if (count($loProduct) > 0) {
            $loProduct=$loProduct[0];
            print_r($loProduct);
            $llActualizar=true;
            //Session::flash('llAtualizar',$llActualizar);
        }else{
            return redirec('indexproduct');
        }

        }catch (\Throwable $th){
            print_r($th);
        }

        return view('editarproduct', compact('loProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $toRequest)
    {
        try {
            $llAlmacenado=false;
            $llDescripcion=false;
            $llResultados=true;

            print_r($toRequest->input('idAdicional'));
            $lnIdProducto=$toRequest->input('idAdicional');

            $barracodigo = $toRequest->post('barracodigo');
            $descripcion = $toRequest->post('descripcion');
            $preciocompra = $toRequest->post('preciocompra');
            $precioventa = $toRequest->post('precioventa');
            $stock = $toRequest->post('stock');

            print_r($barracodigo);
            print_r($descripcion);
            print_r($preciocompra);
        $loProductoAlmacenar = "";
        if($barracodigo>0 && isset($barracodigo)){
            if(isset($descripcion)&&!empty(trim($descripcion))){

                $lcActualizarProducto = "UPDATE products SET
                barracodigo = '{$barracodigo}',
                descripcion = '{$descripcion}',
                preciocompra = '{$preciocompra}',
                precioventa = '{$precioventa}',
                stock = '{$stock}'
                WHERE id = {$lnIdProducto}";

                    $loEjecutarInsert = DB::update($lcActualizarProducto);
                    //$lcConsultaProductos = "SELECT * FROM products ORDER BY barracodigo DESC";
                    $llAlmacenado=true;
                    print_r("se alamaceo a la base de datos: ");
                    $llResultados=false;
                    $llDescripcion=true;

            }else{
                $llAlmacenado=true;
                print_r("No llegó la barra de codigo");
            }

        }else{
            $llDescripcion=true;
            print_r("No llegó la barra de codigo");
        }

    } catch (\Throwable $th) {
        print_r($th);
    }
    Session::flash('llAlmacenado',$llAlmacenado);
    Session::flash('llDescripcion',$llDescripcion);
    return redirect("/indexproduct");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroyProduct(Request $toRequest)
    {
        try {
            print_r($toRequest->input('idAdicional'));

            $lnIdProducto=$toRequest->input('idAdicional');
            $estado=0;
                $lcActualizarProducto = "UPDATE products SET
                estado = '{$estado}'
                WHERE id = {$lnIdProducto}";
                print_r("antes del update");
                $loEjecutarInsert = DB::update($lcActualizarProducto);
                print_r("se elimino");
                    //$lcConsultaProductos = "SELECT * FROM products ORDER BY barracodigo DESC";
                $llAlmacenado=true;

    } catch (\Throwable $th) {
        print_r($th);
    }
    return redirect("/indexproduct");
    }


    public function verProductoComprar(Request $toRequest)
    {
                //$personas = Personas::find($id);
                $lnIdProducto=$toRequest->input('idAdicional');
                print_r($toRequest->input('idAdicional'));
                $lcConsultaProductos = "SELECT * FROM products WHERE id = $lnIdProducto";
                print_r($lcConsultaProductos);
                $loResponseConsulta = DB::select($lcConsultaProductos);
                $loResponseConsultaUno=$loResponseConsulta[0];
                print_r("/////////////////////////////////////////////");
                print_r($loResponseConsultaUno);
                print_r("/////////////////////////////////////////////");
                print_r($loResponseConsulta);
                return view("productocomprar",compact('loResponseConsultaUno'));
    }

    public function logicaProductoComprar(Request $toRequest)
    {

        try {
        $lnIdProducto=$toRequest->input('idAdicional');
        $lcBarraCodigo=$toRequest->input('barracodigo');
        $lcProducto=$toRequest->input('descripcion');
        $lnPrecio=$toRequest->input('precioventa');
        $lnMoneda=$toRequest->input('moneda');
        $lcEmail = $toRequest->post('email');
        $lnTelefono = $toRequest->post('telefono');
        $lnPedidoID = $toRequest->post('pedidoid');
        $lcParametro1="https://midominio.com/callback";
        $lcParametro2="https://midominio.com/return";
        $lnCantidad = 1;
        $lnPrecio=$lnPrecio*$lnCantidad;
        $lnSerial=1;
        $lnDescuento=0;
        $lnTotal=$lnPrecio-$lnDescuento;
        $lcTokenServicio="51247fae280c20410824977b0781453df59fad5b23bf2a0d14e884482f91e09078dbe5966e0b970ba696ec4caf9aa5661802935f86717c481f1670e63f35d5041c31d7cc6124be82afedc4fe926b806755efe678917468e31593a5f427c79cdf016b686fca0cb58eb145cf524f62088b57c6987b3bb3f30c2082b640d7c52907";
        $tcCommerceID="d029fa3a95e174a19934857f535eb9427d967218a36ea014b70ad704bc6c8d1c";
        $lcTokenSecret="9E7BC239DDC04F83B49FFDA5";
        $lnLinkPago=0;
        $lcParametro4="11";

        $laListaProductos=array();
        $laProductoDetalles=array(
        "Serial" => $lnSerial,
        "Producto" => $lcProducto,
        'Cantidad' => $lnCantidad,
        "Precio" => $lnPrecio,
        "Descuento" => $lnDescuento,
        "Total" => $lnTotal);

        array_push($laListaProductos, $laProductoDetalles);
        $lcParametro3 = json_encode($laListaProductos);
        print_r("lcParametro3");
        print_r($lcParametro3);

    } catch (\Throwable $th) {
        print_r("ingreso al primer catch");
        print_r($th);
    }


    try{
        print_r("00000");
        $lcCadenaAFirmar = "$lcTokenServicio|$lcEmail|$lnTelefono|$lnPedidoID|$lnTotal|$lnMoneda|$lcParametro1|$lcParametro2|$lcParametro3|$lcParametro4";
        $lcFirma=hash('sha256',$lcCadenaAFirmar);
        print_r($lcFirma);
        print_r("111111");
        $lcDatosPago="$lcFirma|$lcEmail|$lnTelefono|$lnPedidoID|$lnTotal|$lnMoneda|$lcParametro1|$lcParametro2|$lcParametro3|$lcParametro4";
        print_r("22222");
        $lnSizeDatosPago = strlen($lcDatosPago);
        print_r("33333");
        $lcDatosPagoEncrypt = str_pad($lcDatosPago, ($lnSizeDatosPago + 8 - ($lnSizeDatosPago % 8)), "\0");
        print_r("44444");
        $tcParametros =   openssl_encrypt($lcDatosPagoEncrypt, "DES-EDE3", $lcTokenSecret, OPENSSL_ZERO_PADDING);
        print_r("555555");
        //$tcCommerceID="8c1f1046219ddd216a023f792356ddf127fce372a72ec9b4cdac989ee5b0b455";
        $tcParametrosDos = base64_encode($tcParametros);
        print_r("66666");
        //$laData['tcCommerceID'] = $tcCommerceID;
        print_r("55555");
        print_r($tcParametros);
        //$tcParametros="dGJSQlNYSjFITzFJc2FZeDE0dXFSZzhOb1ZCMFJXYkpwY2hzUWlRYjBFNTQ3akJqTlAxZzJ3YWRYL0V2bGkwQ0d5Q0tNZ1VhRU5rYmJrTGN0Syt0cEpDV09QUGpYaVF0U3JWeUxOL3pLejFuQWsremhOQ1Z0QlljbFJGaFowc3BLeWZkN3U2MmRSa1ZIRDV4WjVSVjZqbUdRaWRiNElPbXJ4MWRXUmlEUkhYOHRsdFNZN3dPVlZNbmJRR3F4QTltVGVVUE12L2xlTk5rU0p4NFJOQjhRUWJtQzBlZ2YvcDdxdTF0MDdWQWlpb0hzZE9OeTBkMHBuR0NUVWJTTzFRMDlFS29Kd2JJbDdqVExnb3NuTGJoZXg2MzRWdEloNXhBdy9peWZ0YlFxUTlVeXMzR2NQblAyOXdOaE9SK1BXRUY5RVJvRXpheGxEaTdDeTUvQ0t3S3FGOGxuRHU3d2p6RFhaWFVSd0lqL1Q3amZ4djFDelk0cHVFRmhIVlVBYXJObmlrUDZPNWtNaFhDRGRtRlB3Y3pWSXk0UU5lLzBDQ05UejNIUEVWY3pSd2I0NWpaell1STZ3T3NhMjI3dkxDdTJrYUxpTGw0YUFoa1ZTa0NUbmNnUVh2bzEvMmdMYXdyd3h5Z3BQTnpCRVk9";

        return view('pagofacil', compact('tcParametrosDos', 'tcCommerceID'));
        //return redirect("https://checkout.pagofacil.com.bo/es/pay?tcParametros=$tcParametros&tcCommerceID=$tcCommerceID");

    }catch(\Throwable $th){
        print_r("ingreso al segundo catch");
        print_r($th);
        return null;
    }

    }

}
