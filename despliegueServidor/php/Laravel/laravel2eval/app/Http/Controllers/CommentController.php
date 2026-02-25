<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
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
    public function create(Post $post)
    {
        return view('comment.create', compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validaciones
        $request->validate([
            "content" => "required|string|min:3",
            "post_id" => "required|exists:posts,id",
        ]);

        // crear comment (sin fill)
        $c = new Comment();
        $c->content = $request->content;
        $c->post_id = $request->post_id;
        $c->save();

        // redirige donde quieras (yo te lo dejo a index)
        return redirect()->route('index')->with('result', 'Comentario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $post = $comment->post;
        return view('comment.edit', compact('comment', 'post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            "content" => "required|string|min:3",
        ]);

        // actualizar (sin fill)
        $comment->content = $request->content;
        $comment->save();

        return redirect()->route('index')->with('result', 'Comentario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function deleteByPostId(string $id) {
        $post = Post::find($id);
        if ($post != null) {
            $post->comments()->delete();
            $message = "Comentarios del post " . $post->title . " eliminados";
        } else {
            $message = "No se encuentra el post";
        }
        return redirect()->route('author.edit', $post->author_id)->with('result', $message);
    }
}
