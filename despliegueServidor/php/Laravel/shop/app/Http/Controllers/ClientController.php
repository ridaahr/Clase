<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'address' => 'min:5',
        ]);
        $c = new Client($request->all());
        $c->save();
        return redirect()->route('index')->with('success', 'Cliente guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::find($id);
        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('client.edit', compact('client'));
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
        $c = Client::find($id);
        if ($c == null) {
            $message = "El cliente no existe";
        } else {
            $c->orders()->delete();
            Client::destroy($id);
            $message = "Cliente " . $c->name . " eliminado";
        }
        return redirect()->route('index')->with('deleted', $message);
    }
}
