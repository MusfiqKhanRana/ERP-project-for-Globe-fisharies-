<?php

namespace App\Http\Controllers;

use App\Models\SupplyItem;
use Illuminate\Http\Request;

class SupplyItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SupplyItem::get();
        return view('backend.production.supply.supply_product.index',compact('items'));
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
        $create = SupplyItem::create($request->all());
        return redirect()->back()->withMsg("Successfully Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplyItem  $supplyItem
     * @return \Illuminate\Http\Response
     */
    public function show(SupplyItem $supplyItem)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplyItem  $supplyItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplyItem $supplyItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupplyItem  $supplyItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplyItem $supplyItem)
    {
        $supplyItem
        ->update($request->all());
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplyItem  $supplyItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplyItem $supplyItem)
    {
        $supplyItem->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
