<?php

namespace App\Http\Controllers;

use App\Models\ProductionPurchaseType;
use Illuminate\Http\Request;

class ProductionPurchaseTypeController extends Controller
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
           'name' => 'min:4|max:191',
        ));
        $users = new ProductionPurchaseType();
        $users->name = $request->name;
        $users->save();

        return redirect()->route('user-type.index')->withMsg('Successfully Created');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionPurchaseType  $productionPurchaseType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionPurchaseType $productionPurchaseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionPurchaseType  $productionPurchaseType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionPurchaseType $productionPurchaseType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionPurchaseType  $productionPurchaseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ProductionPurchaseType::whereId($id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionPurchaseType  $productionPurchaseType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductionPurchaseType::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
