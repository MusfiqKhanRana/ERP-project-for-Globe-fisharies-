<?php

namespace App\Http\Controllers;

use App\Models\ProductionGeneralPurchaseQuotation;
use App\Models\ProductionPurchaseRequisition;
use App\Models\ProductionRequisition;
use App\Models\ProductionSupplier;
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
        $add_quotation = ProductionGeneralPurchaseQuotation::select('id','status')->where('status','AddQuotation');
        $show_quotation = ProductionGeneralPurchaseQuotation::select('id','status')->where('status','ShowQuotation');
        $show_quotation = ProductionGeneralPurchaseQuotation::all();
        $purchase_requisition = ProductionPurchaseRequisition::get();
        return view('backend.production.general_purchase.quotation.show_quotation',compact('show_quotation','purchase_requisition','show_quotation','add_quotation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $requisition=ProductionPurchaseRequisition::where('status','Quotation')->with('items','departments','users')->get();
        $supplier = ProductionSupplier::get();
        return view('backend.production.general_purchase.quotation.add_quotation',compact('supplier','requisition'));
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

       $data = $request->all();
        
        $request->provided_item = json_decode($request->provided_item);
        $quotation = ProductionGeneralPurchaseQuotation::create(['supplier_id'=>$request->supplier_id,'price'=>$request->price,'speciality'=>$request->speciality,'remark'=>$request->remark]);
        // dd($quotation);
        foreach ($data as $key => $item) {
            $requisition_id = $quotation->id;
            
            $production_requisition_item=ProductionGeneralPurchaseQuotation::create(['requisition_id'=> $requisition_id]);

       }

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
    public function quotation(){
        return view('backend.production.general_purchase.quotation.add_quotation');
    }
}
