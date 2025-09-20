<?php

namespace App\Http\Controllers;

use App\Models\product_size_stock;
use App\Models\product;
use App\Models\size;
use Illuminate\Http\Request;


class ProductSizeStockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=product_size_stock::all();
        return view('product_size_stock.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product=product::all();
        $size=size::all();
        return view('product_size_stock.create',compact('product', 'size'));
        // return view('product_size_stock.create',compact('size'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  product_size_stock::create($input);
        // return redirect()->route('product_size_stock.index');

        product_size_stock::create($request->all());
        return redirect()->route('product_size_stock.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(product_size_stock $product_size_stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product_size_stock $product_size_stock)
    {
        $product=product::all();
        $size=size::all();
        return view('product_size_stock.edit',compact('product', 'size','product_size_stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product_size_stock $product_size_stock)
    {
         $product_size_stock->update($request->all());
        return redirect()->route('product_size_stock.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product_size_stock $product_size_stock)
    {
        $product_size_stock->delete();
        return redirect()->back();
    }
}
