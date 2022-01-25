<?php

namespace App\Http\Controllers;

use App\Models\ColdStorage;
use App\Models\TempTher;
use Illuminate\Http\Request;

class TempTherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cold_storages = ColdStorage::all();
        $items = TempTher::all();
        return view('backend.production.production-data.temp_thermocouple.index',compact('items','cold_storages'));
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
     * @param  \App\Models\TempTher  $tempTher
     * @return \Illuminate\Http\Response
     */
    public function show(TempTher $tempTher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TempTher  $tempTher
     * @return \Illuminate\Http\Response
     */
    public function edit(TempTher $tempTher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempTher  $tempTher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempTher $tempTher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TempTher  $tempTher
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempTher $tempTher)
    {
        //
    }
}
