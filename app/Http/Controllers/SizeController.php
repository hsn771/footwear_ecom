<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=size::all();
        return view('size.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         size::create($request->all());
        return redirect()->route('size.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(size $size)
    {
        return view('size.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, size $size)
    {
        $size->update($request->all());
        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(size $size)
    {
        $size->delete();
        return redirect()->back();
    }
}
