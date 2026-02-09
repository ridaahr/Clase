<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Journalist;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class JournalistApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $errors = false;
        //validaciones:
        if (!isset($request->name)) {
            $errors = true;
        } elseif (!isset($request->password)) {
            $errors = true;
        }
        if (!$errors) {
            $j = new Journalist($request->all());
            //todo ver si existe el email
            $j->save();
            return response()->json($j);
        } else {
            return response()->json([
                "message" => "error",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //busco el journalist con ese id
        $j = Journalist::find($id);
        //devolverlo en formato json
        return response()->json($j);
        if ($j != null) {
            return response()->json([
                "message" => "Journalist found",
                "data" => $j
            ]);
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //request contiene el json de la petición post
        $j = Journalist::find($id);
        if ($j != null) {
            $j->name = $request->name;
            $j->surname = $request->surname;
            $j->email = $request->email;
            $j->update();
            return response()->json([
                "message" => "Updated",
                "data" => $j
            ]);
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $j = Journalist::find($id);
        if ($j != null) {
            $j->delete();
            return response()->json([
                "message" => "Deleted",
                "data" => $j
            ]);
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
    //para búsquedas
    public function search(Request $request)
    {
        Log::channel('stderr')->debug('VARIABLES DE BUSQUEDA', ['name' => $request->name]);
        //buscar por nombre en la bd;
        /*
        if (isset($request->name)) {
            $journalists = Journalist::where('name', $request->name)->get();
            return response()->json($journalists);
        }
        */
        /*
        if (isset($request->email)) {
            $journalists = Journalist::where('email', $request->email)->get();
            return response()->json($journalists);
        }
        */

        if (isset($request->minreaders) && isset($request->maxreaders)) {
            $articles = Article::where('readers', '>=', $request->minreaders)
                ->where('readers', '<=', $request->maxreaders)->get();
            return response()->json($articles);
        } else if (isset($request->minreaders)) {
            //devolver los que tenga mas de 10 readers
            $articles = Article::where(
                'readers',
                '>=',
                $request->minreaders
            )->get();
            return response()->json($articles);
        }
        //por nombre y email
        if (isset($request->name) && isset($request->email)) {
            $journalists = Journalist::where('name', $request->name)->where('email', $request->email)->get();
            return $journalists;
        }
        //por nombrre o apellido
        if (isset($request->name) && isset($request->surname)) {
            $journalists = Journalist::where('name', $request->name)->orwhere('surname', $request->surname)->get();
            return $journalists;
        }
    }
}
