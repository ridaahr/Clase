<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('index', compact('authors'));
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
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $a = Author::find($id);
        return view('author.edit', compact('a'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }

    public function incrementRest($incr)
    {
        try {
            $authors = Author::all();
            foreach ($authors as $author) {
                $author->age += $incr;
                $author->save();
            }

            return response()->json([
                "data" => $authors
            ]);
        } catch (Exception $e) {
            return response()->json([
                "data" => [],
                "message" => "not updated"
            ], 400);
        }
    }


    /* public function incrementRest($incr)
    {
        try {
            Author::query()->increment('age', $incr);

            return response()->json([
                "data" => Author::all()
            ]);
        } catch (Exception $e) {
            return response()->json([
                "data" => [],
                "message" => "not updated"
            ], 400);
        }
    } */

    public function showBetweenAges(Request $request)
    {
        if (!isset($request->minimum) || !isset($request->maximum)) {
            $message = 'Faltan datos';
            $authors = [];
        } else {
            $authors = Author::where('age', '>', $request->minimum)
                ->where('age', '<', $request->maximum)->get();
                if (count($authors) > 0) {
                    $message = 'Se han encontrado estos autores';
                } else {
                    $message = 'No se han encontrado autores';
                }
        }
        return view('author.ages', compact('authors', 'message'));
    }
}
