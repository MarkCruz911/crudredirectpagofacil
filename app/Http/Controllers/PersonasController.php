<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{

    public function index()
    {
        //Pagina de inicio
        $datos = Personas::orderBy('paterno','desc')->paginate(2);
        return view('inicio',compact('datos'));
    }

    public function create()
    {
        //El formulario donde nosotros agregamos datos

        return view('layout/agregar');
    }

    public function store(Request $request)
    {
        //Sirve para guardar datos en la base de datos
        print_r($_POST);

        $personas = new Personas();
        $personas->paterno=$request->post('paterno');
        $personas->materno=$request->post('materno');
        $personas->nombre=$request->post('nombre');
        $personas->fecha_nacimiento=$request->post('fecha_nacimiento');
        $personas->save();
        return redirect()->route("personas.index")->with("success", "Agregado correctamente!");
    }

    public function show($id)
    {
        //Servirá para obtener un registro de nuestra tabla
        $personas = Personas::find($id);
        return view("eliminar", compact('personas'));
    }

    public function edit($id)
    {
        //Este metodo sirve para traer datos que se van a editar
        //Y los coloca en un formulario
        $personas = Personas::find($id);
        return view("actualizar", compact('personas'));
    }

    public function update(Request $request, $id)
    {
        $personas = Personas::find($id);
        $personas->paterno=$request->post('paterno');
        $personas->materno=$request->post('materno');
        $personas->nombre=$request->post('nombre');
        $personas->fecha_nacimiento=$request->post('fecha_nacimiento');
        $personas->save();
        return redirect()->route("personas.index")->with("success", "Editado con exito");
        //Este metodo actualiza los datos en la base de datos
    }

    public function destroy($id)
    {
        //Elimina un registro
        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success","Producto Eliminado con exito!");
    }
}
