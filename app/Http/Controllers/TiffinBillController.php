<?php

namespace App\Http\Controllers;

use App\Models\TiffinBill;
use Illuminate\Http\Request;

class TiffinBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TiffinBill::get();
        return view('backend.employee.tiffin.index',compact('items'));
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
     * @param  \App\Models\TiffinBill  $tiffinBill
     * @return \Illuminate\Http\Response
     */
    public function show(TiffinBill $tiffinBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TiffinBill  $tiffinBill
     * @return \Illuminate\Http\Response
     */
    public function edit(TiffinBill $tiffinBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TiffinBill  $tiffinBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TiffinBill $tiffinBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TiffinBill  $tiffinBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiffinBill $tiffinBill)
    {
        //
    }
}
