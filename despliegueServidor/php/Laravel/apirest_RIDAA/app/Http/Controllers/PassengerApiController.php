<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class PassengerApiController extends Controller
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
        try {
            Passenger::findOrFail($id)->update($request->all());
            $passengerU = Passenger::find($id);
            return response()->json([
                "message" => "ok",
                "data" => $passengerU
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "not update",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $passenger = Passenger::find($id);
        if ($passenger != null) {
            $passenger->delete();
            return response()->json([
                "message" => "ok",
                "data" => $passenger
            ]);
        } else {
            return response()->json([
                "message" => "passenger not deleted",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    public function searchByAge(Request $request)
    {
        if (isset($request->age) && isset($request->ageMax)) {
            $passengers = Passenger::where('age', '>=', $request->age)
                ->where('age', '<=', $request->ageMax)->get();
            if (count($passengers) > 0) {
                return response()->json([
                    "message" => "ok",
                    "data" => $passengers
                ]);
            } else {
                 return response()->json([
                    "message" => "no passengers found",
                    "data" => null
                ], JsonResponse::HTTP_NOT_FOUND);
            }
        } elseif (isset($request->age) && !isset($request->ageMax)) {
            $passengers = Passenger::where('age', '>=', $request->age)->get();
            if (count($passengers) > 0) {
                return response()->json([
                    "message" => "ok",
                    "data" => $passengers
                ]);
            } else {
                 return response()->json([
                    "message" => "no passengers found",
                    "data" => null
                ], JsonResponse::HTTP_NOT_FOUND);
            }
        } elseif (!isset($request->age) && isset($request->ageMax)) {
            $passengers = Passenger::where('age', '<=', $request->ageMax)->get();
            if (count($passengers) > 0) {
                return response()->json([
                    "message" => "ok",
                    "data" => $passengers
                ]);
            } else {
                 return response()->json([
                    "message" => "no passengers found",
                    "data" => null
                ], JsonResponse::HTTP_NOT_FOUND);
            }
        }
    }
}
