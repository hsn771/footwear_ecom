<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function register(){
        return view('vendor.register');
    }
}
