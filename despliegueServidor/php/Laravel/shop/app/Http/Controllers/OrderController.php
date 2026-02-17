<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        $clients = Client::all();
        return view('index', compact('orders', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('order.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order($request->all());
        if (!$request->exists('date')) {
            $order->date = Carbon::now();;
        }
        $request->validate([
            'date' => 'required',
            'client_id' => 'required',
            'product_id' => 'required',
        ]);
        $order->save();
        return redirect()->route('index')->with('success', 'Pedido guardado');
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
        $order = Order::find($id);
        if ($order == null) {
            $message = "El pedido no existe";
        } else {
            Order::destroy($id);
            $message = "Pedido eliminado";
        }
        $orders = Order::all();
        return redirect()->route('index')->with('deleted', $message);
    }
}
