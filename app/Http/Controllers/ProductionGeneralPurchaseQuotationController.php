<?php

namespace App\Http\Controllers;

use App\Models\ProductionGeneralPurchaseQuotation;
use App\Models\ProductionPurchaseRequisition;
use App\Models\ProductionPurchaseRequisitionItem;
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
        $supplier = ProductionSupplier::all();
        $addquotation = ProductionGeneralPurchaseQuotation::select('id','status')->where('status','AddQuotation');
        $showquotation = ProductionGeneralPurchaseQuotation::select('id','status')->where('status','ShowQuotation');
        $show_quotation = ProductionGeneralPurchaseQuotation::all();
        $purchase_requisition = ProductionPurchaseRequisition::get();
        return view('backend.production.general_purchase.quotation.show_quotation',compact('show_quotation','purchase_requisition','showquotation','addquotation','supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $general_purchase = ProductionGeneralPurchaseQuotation::get();
        return view('backend.production.general_purchase.quotation.show_quotation',compact('general_purchase'));
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
        //dd($data);
        $request->provided_item = json_decode($request->provided_item);
        foreach ( $request->provided_item as $key => $value) {
           // dd($value);
            $quotation = ProductionGeneralPurchaseQuotation::create(['supplier_id'=>$value->supplier_id,'price'=>$value->price,'speciality'=>$value->speciality,'production_purchase_requisition_id'=>$data['requisition_id'],'production_purchase_requisition_item_id'=>$data['requisition_item_id'],'remark'=>$data['remark']]);

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
    public function confirmquotation(){
        $general_purchase = ProductionGeneralPurchaseQuotation::get();
        return view('backend.production.general_purchase.cs.cs_list_show',compact('general_purchase'));
    }
    public function status_addquotation($id){
        // dd($id);
        $add= ProductionPurchaseRequisitionItem::where('id',$id)->update(['status'=>'AddQuotation']);
        return redirect()->back()->withmsg('Successfully Add Quotation');
    }
    public function status_showquotation($id){
        // dd($id);
        $show= ProductionPurchaseRequisitionItem::where('id',$id)->update(['status'=>'ShowQuotation']);
        return redirect()->back()->withmsg('Successfully Add Quotation');
    }
    // public function status_confirmquotation($id){
    //     // dd($id);
    //     $confirm= ProductionPurchaseRequisitionItem::where('id',$id)->update(['status'=>'ConfirmQuotation']);
    //     return redirect()->back()->withmsg('Successfully Add Quotation');
    // }
}
