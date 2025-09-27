<?php

namespace App\Http\Controllers\Vendor;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Order::get();
        return view('order.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Order::create($request->all());
       return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
       $order->delete();
       return redirect()->route('order.index');
    }
}
