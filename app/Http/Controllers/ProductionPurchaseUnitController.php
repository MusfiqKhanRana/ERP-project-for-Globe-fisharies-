<?php

namespace App\Http\Controllers;

use App\Models\ProductionPurchaseUnit;
use Illuminate\Http\Request;

class ProductionPurchaseUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $inputs = $request->except('_token');
        $this->validate($request,array(
           'name' => 'min:2|max:191',
        ));
        $users = new ProductionPurchaseUnit();
        $users->name = $request->name;
        $users->save();

        return redirect()->route('user-type.index')->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionPurchaseUnit  $productionPurchaseUnit
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionPurchaseUnit $productionPurchaseUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionPurchaseUnit  $productionPurchaseUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionPurchaseUnit $productionPurchaseUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionPurchaseUnit  $productionPurchaseUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ProductionPurchaseUnit::whereId($id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionPurchaseUnit  $productionPurchaseUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductionPurchaseUnit::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
