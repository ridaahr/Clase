<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar autores y comments para evitar N+1 queries
        $posts = Post::with(['author', 'comments'])->get();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::all(); // para seleccionar autor
        return view('post.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // antes de guardar hago validaciones
        $request->validate([
            "title" => "required|string|min:5|max:255",
            "content" => "required|string|min:15",
            "author_id" => "required|exists:authors,id"
        ]);

        // creo el post con los datos del request
        $p = new Post($request->all());

        // guardo en la bd
        $p->save();

        return redirect()->route("index")->with('result', 'Post creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $authors = Author::all();
        return view('post.edit', compact('post', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validaciones
        $request->validate([
            "title" => "required|string|min:5|max:255",
            "content" => "required|string|min:15",
            "author_id" => "required|exists:authors,id",
        ]);

        // Actualizar (sin fill)
        $post->title = $request->title;
        $post->content = $request->content;
        $post->author_id = $request->author_id;
        $post->save();

        return redirect()->route("index")->with("result", "Post actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function createRest(Request $request)
    {
        try {
            $post = Post::create($request->all());
            return response()->json([
                "message" => "created",
                "data" => $post
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "not created",
                "data" => ''
            ], 400);
        }
    }
}
