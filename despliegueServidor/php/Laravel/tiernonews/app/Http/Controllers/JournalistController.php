<?php

namespace App\Http\Controllers;

use App\Models\Journalist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JournalistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //todo
        //return "estoy en el index del JournalistController";
        //1. Buscar todos los journalists de la bd
        $journalists = Journalist::all();
        $saludo = "sete";
        //return $journalists;

        //2. devolver una vista que los contenga
        return view('journalist.index', compact("journalists"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // devuelvo una vista con un formulario de creación
        return view('journalist.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return "ahora te lo guardo";
        //use Illuminate\Support\Facades\Log;
        Log::channel('stderr')->debug("Variable request: ", [$request->name, $request->password]);
        //todo $fillable
        $j = new Journalist($request->all());
        $j->save();
        //Para crear el index tengo que buscar los periodistas primero
        $journalists = Journalist::all();
        return view('journalist.index', compact("journalists"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //busco en la bbdd a ese periodista
        $journalist = Journalist::find($id);
        //devuelvo una vista con la información del periodista
        return view('journalist.show', compact("journalist"));
    }

    /**
     * Show the form for editing the journalist.
     * Va a devolver una vista con un formulario rellenado con los datos del periodista en cuestión, y un botón de Actualizar.
     */
    public function edit(string $id)
    {
        //busco el periodista en la bbdd
        $journalist = Journalist::find($id);
        //comprobar errores si no existe

        //
        return view("journalist.edit", compact("journalist"));
    }

    /**
     * Update the journalist in storage.
     * Recibe en la petición POST (o PUT) los datos del periodista que queremos editar y lo lleva a la bd
     */
    public function update(Request $request, string $id)
    {
        //Voy a actualizar todo menos la contraseña
        //busco en la bbdd el journalist con ese id
        $journalist = Journalist::find($id);
        //actualizo los campos correspondientes
        $journalist->name = $request->name; //en el request esta lo nuevo
        $journalist->surname = $request->surname; //en el request esta lo nuevo
        $journalist->email = $request->email; //en el request esta lo nuevo
        //hago el update
        $journalist->update();
        //devuelvo al show
        //lo voy a buscar pero solo para comprobar que se ha actualizado
        //$journalist = Journalist::find($id);
        return view('journalist.show', compact("journalist"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sayName($name){
        return "hola $name";
    }
}