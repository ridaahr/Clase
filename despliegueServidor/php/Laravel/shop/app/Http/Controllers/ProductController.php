<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
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
        $p = Product::find($id);
        return view('product.show', compact('product'));
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


    public function search() {
        return view('product.search');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function showProducts(Request $request)
    {
        if (isset($request->minPrice) && isset($request->maxPrice) && !isset($request->size)) {
            $products = Product::where('price', '>=', 'minPrice')
            ->where('price', '<=', 'maxPrice');
        } elseif (!isset($request->minPrice) && isset($request->maxPrice) && isset($request->size)) {
            $products = Product::where('size', '=', 'size')
            ->where('price', '<=', 'maxPrice');
        } elseif (isset($request->minPrice) && !isset($request->maxPrice) && isset($request->size)) {
            $products = Product::where('size', '=', 'size')
            ->where('price', '>=', 'minPrice');
        } else {
            $message = "Tienes que rellenar al menos dos campos";
            $products = [];
        }
        return view("product.search", compact($products))->with('error', $message);
    }
}
