<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Journalist;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        //2. devolver una vista que los contenga
        return view('article.index', compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $journalists = Journalist::all();
        return view('article.create', compact('journalists'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //todo $fillable
        $a = new Article($request->all());
        //antes de guardar hago validaciones
        $request->validate([
            "title" => "required|min:5",
            "content" => "min:15|required",
            "readers" => "",
            "journalist_id" => 'required|exists:journalists,id'
        ]);
        //guardo en la bd
        $a->save();
        return redirect()->route("article.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //no hace falta porque ya tengo el artículo
        //$article = Article::find($id);
        //devuelvo una vista con la información del periodista
        return view('article.show', compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //busco el artículo en la bbdd
        $article = Article::find($id);
        //comprobar errores si no existe
        $journalists = Journalist::all();
        //
        return view("article.edit", compact("article", "journalists"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Voy a actualizar todo menos la contraseña
        //busco en la bbdd el journalist con ese id
        $article = Article::find($id);
        //actualizo los campos correspondientes
        $article->title = $request->title; //en el request esta lo nuevo
        $article->content = $request->content; //en el request esta lo nuevo
        $article->readers = $request->readers; //en el request esta lo nuevo
        //hago el update
        $article->update();
        //devuelvo al show
        //lo voy a buscar pero solo para comprobar que se ha actualizado
        //$journalist = Journalist::find($id);
        return view('article.show', compact("article"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $a = Article::find($id);
        if ($a == null) {
            $message = "El artículo no existe";
        } else {
            //eliminamos
            Article::destroy($id);
            $message = "Artículo " . $a->title . " eliminado";
        }
        //devolvemos al index con un mensajito
        $articles = Article::all();
        return redirect()->route('article.index')->with('deleted', $message);
    }
}
