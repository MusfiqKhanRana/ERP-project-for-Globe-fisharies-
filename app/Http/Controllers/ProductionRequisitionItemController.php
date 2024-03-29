<?php

namespace App\Http\Controllers;

use App\Models\ProductionPurchaseRequisitionItem;
use App\Models\ProductionRequisitionItem;
use Illuminate\Http\Request;

class ProductionRequisitionItemController extends Controller
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
        $data = $request->all();
        ProductionPurchaseRequisitionItem::where('id',$data['requisition_item_id'])->update(['status'=>"ConfirmQuotation"]);
        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionRequisitionItem  $productionRequisitionItem
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionRequisitionItem $productionRequisitionItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionRequisitionItem  $productionRequisitionItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionRequisitionItem $productionRequisitionItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionRequisitionItem  $productionRequisitionItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionRequisitionItem $productionRequisitionItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionRequisitionItem  $productionRequisitionItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductionRequisitionItem::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
