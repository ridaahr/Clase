<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    //Eliminar los articulos que tengan ente min y max readers
    //para eliminar quiero hacer esto: http://127.0.0.1:8000/delete?minReaders=5&maxReaders=9
    //o esto: http://127.0.0.1:8000/delete?maxReaders=5, en este se eliminan
    //todos los articulos de menos de los readers indicados en minReaders
    public function deleteByReaders(Request $request)
    {
        if (isset($request->maxReaders)) {
            $minReaders = -1;
            if (isset($request->minReaders)) {
                $minReaders = $request->minReaders;
            }
            $num = Article::where('readers', '>', $minReaders)->where('readers', '<', $request->maxReaders)->count();
            Article::where('readers', '>', $minReaders)->where('readers', '<', $request->maxReaders)->delete();
            return response()->json([
                "message" => "Deleted",
                "data" => $num
            ]);
        }
    }
}
