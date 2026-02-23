<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class TestApiController extends Controller
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
        try {
            $test = Test::create($request->all());
            return response()->json([
                "message" => "OK",
                "data" => $test
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "ERROR"/* . $e->getMessage()*/,
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $test = Test::find($id);
        if ($test != null) {
            return response()->json([
                "data" => $test
            ]);
        } else {
            return response()->json([
                "data" => "Not found"
            ]);
        }
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
        {
        $test = Test::find($id);
        if ($test != null) {
            $test->name = $request->name;
            $test->numberQuestions = $request->numberQuestions;
            $test->type = $request->type;
            $test->subject_id = $request->subject_id;
            $test->update();
            return response()->json([
                "message" => "Updated",
                "data" => $test
            ]);   //200 OK
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $test = Test::find($id);
        if ($test != null) {
            Test::destroy($id);
            return response()->json([
                "message" => "Eliminado",
                "data" => $test
            ]);   //200 OK
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    public function searchMinMax(Request $request)
    {
        $tests = Test::where("numberQuestions", ">=", $request->min)
        ->where("numberQuestions", "<=", $request->max)
        ->get();
        return response()->json($tests);
    }

    public function searchType(Request $request)
    {
        $test = Test::where("type", "=", $request->type)
        ->get();
        return response()->json($test);
    }
}
