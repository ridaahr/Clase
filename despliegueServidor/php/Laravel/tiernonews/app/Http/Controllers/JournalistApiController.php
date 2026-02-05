<?php

namespace App\Http\Controllers;

use App\Models\Journalist;
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
        //
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
}
