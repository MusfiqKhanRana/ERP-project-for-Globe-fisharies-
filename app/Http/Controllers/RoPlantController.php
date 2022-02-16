<?php

namespace App\Http\Controllers;

use App\Models\RoPlant;
use Illuminate\Http\Request;

class RoPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.production.production-data.ro-plant.index');
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
     * @param  \App\Models\RoPlant  $roPlant
     * @return \Illuminate\Http\Response
     */
    public function show(RoPlant $roPlant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoPlant  $roPlant
     * @return \Illuminate\Http\Response
     */
    public function edit(RoPlant $roPlant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoPlant  $roPlant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoPlant $roPlant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoPlant  $roPlant
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoPlant $roPlant)
    {
        //
    }
}
