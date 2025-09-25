<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Devfaysal\BangladeshGeocode\Models\Division;
use Devfaysal\BangladeshGeocode\Models\District;
use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function register(){
        $divisions = Division::all();
        $districts = District::all();
        return view('vendor.register', compact('divisions', 'districts'));
    }

    public function store(Request $request){

        try{
            $request->validate([
                'owner_name' => 'required|string|max:255',
                'username' => 'required|unique:vendors,username',
                'store_contact' => 'required|string|max:20|unique:vendors,owner_contact',
                'password' => 'required|string|min:3|confirmed',
                'division_id' => 'required|exists:divisions,id',
                'district_id' => 'required|exists:districts,id'
            ]);

            $request->merge([
                'password' => bcrypt($request->password)
            ]);

            $vendor=Vendor::create($request->all());

            if($vendor){
                // return redirect()->route('vendor.register')->with('success', 'Vendor registered successfully.');
                auth()->guard('vendor')->login($vendor);
                return redirect()->intended(route('vendor.dashboard'));
            }else{
                return back()->with('error', 'Failed to register vendor. Please try again.');
            }
        }catch(\Exception $e){
            return $e->getMessage();
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function login(){
        return view('vendor.login');
    }

    public function checkLogin(Request $request){
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        if(auth()->guard('vendor')->attempt($credentials)){
            return redirect()->intended(route('vendor.dashboard'));
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }
}
