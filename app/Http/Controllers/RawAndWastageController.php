<?php

namespace App\Http\Controllers;

use App\Models\RawAndWastage;
use Illuminate\Http\Request;

class RawAndWastageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.raw_product_wastage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RawAndWastage  $rawAndWastage
     * @return \Illuminate\Http\Response
     */
    public function show(RawAndWastage $rawAndWastage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RawAndWastage  $rawAndWastage
     * @return \Illuminate\Http\Response
     */
    public function edit(RawAndWastage $rawAndWastage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RawAndWastage  $rawAndWastage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawAndWastage $rawAndWastage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RawAndWastage  $rawAndWastage
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawAndWastage $rawAndWastage)
    {
        //
    }
}
