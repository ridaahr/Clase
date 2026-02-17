<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class OrderApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json($orders);
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
        $errors = false;
        $date = Carbon::now();
        if ($request->exists('date')) {
            $date = $request->date;
        }
        if (!isset($request->client_id)) {
            $errors = true;
        } elseif (!isset($request->product_id)) {
            $errors = true;
        }
        if (!$errors) {
            $o = Order::create($request->all());
            return response()->json($o);
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
    public function show(string $id) {}

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
        $order = Order::find($id);
        if ($order != null) {
            $order->delete();
            return response()->json([
                "message" => "Deleted",
                "data" => $order
            ]);
        } else {
            return response()->json([
                "message" => "Not found",
                "data" => null
            ], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
