<?php

namespace App\Http\Controllers\Vendor;

use App\Models\order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendorId = auth()->guard('vendor')->id();
        $data = Order::whereHas('orderItems', function ($query) use ($vendorId) {
                    $query->where('vendor_id', $vendorId);
                })->get();
        return view('vendor.order.index',compact('data'));
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
       //
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
        return view('vendor.order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        if($request->status){
            foreach($request->status as $item=>$status){
                OrderItem::find($item)->update(['status'=>$status]);
            }
        }
        return redirect()->route('vendor.order.index');
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
