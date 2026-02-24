<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Passenger;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class FlightApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $flights = Flight::all();
        if (count($flights) > 0) {
            return response()->json([
                "message" => "ok",
                "data" => $flights
            ]);
        } else {
            return response()->json([
                "message" => "no flights",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
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
            $flight = Flight::create($request->all());
            return response()->json([
                "message" => "ok",
                "data" => $flight
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "flight not created",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $flight = Flight::find($id);
        if ($flight != null) {
            return response()->json([
                "message" => "ok",
                "data" => $flight
            ]);
        } else {
            return response()->json([
                "message" => "flight not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search($code)
    {
        $flight = Flight::where('code', '=', $code)->get();
        if (count($flight) > 0) {
            return response()->json([
                "message" => "ok",
                "data" => $flight
            ]);
        } else {
            return response()->json([
                "message" => "not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }

    public function assignFlight($idflight, $idpassenger)
    {
        try {
            $passenger = Passenger::findOrFail($idpassenger);
            $flight = Flight::findOrFail($idflight);
            $passenger->flight_id = $idflight;
            $passenger->update();
            return response()->json([
                "message" => "ok",
                "data" => $flight
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "not assigned",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
