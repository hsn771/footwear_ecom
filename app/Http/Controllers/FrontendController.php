<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function welcome() {
        $products = \App\Models\Product::all();
        return view ('welcome', compact('products'));
    }

    function man() {
        return view ('man');
    }
    function productdescription($id) {
        $product = \App\Models\Product::find($id);
        return view ('productdescription', compact('product'));
    }
}
