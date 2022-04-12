<?php

namespace App\Http\Controllers;

use App\Models\ProductionGeneralPurchaseQuotation;
use Illuminate\Http\Request;

class ProductionGeneralPurchaseQuotationController extends Controller
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
        
       // dd($request);

       $inputs = $request->except('_token');
        
        $request->provided_item = json_decode($request->provided_item);
        $quotation = ProductionGeneralPurchaseQuotation::create(['price'=>$request->peice,'speciality'=>$request->speciality,'remark'=>$request->remark]);
        // foreach ($data['item_id'] as $key => $item) {
            
        //     $production_requisition_id = $production_supply->id;
        // $production_item = ProductionPurchaseRequisitionItem::create(['production_purchase_requisition_item_id'=> $production_purchase_requisition_item_id);
        //}
        //dd($quotation->toArray());
        //$quotation->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionGeneralPurchaseQuotation  $productionGeneralPurchaseQuotation
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionGeneralPurchaseQuotation $productionGeneralPurchaseQuotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionGeneralPurchaseQuotation  $productionGeneralPurchaseQuotation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionGeneralPurchaseQuotation $productionGeneralPurchaseQuotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionGeneralPurchaseQuotation  $productionGeneralPurchaseQuotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionGeneralPurchaseQuotation $productionGeneralPurchaseQuotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionGeneralPurchaseQuotation  $productionGeneralPurchaseQuotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionGeneralPurchaseQuotation $productionGeneralPurchaseQuotation)
    {
        //
    }
}
