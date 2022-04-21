<?php

namespace App\Http\Controllers;

use App\Models\ProductionGeneralPurchaseQuotation;
use App\Models\ProductionPurchaseRequisitionItem;
use Illuminate\Http\Request;

class ProductionPurchaseRequisitionItemController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        ProductionPurchaseRequisitionItem::where('id',$request->requisition_item_id)->update(['item_id'=>$request->item,'item_type_id'=>$request->type,'item_unit_id'=>$request->unit,'demand_date'=>$request->demand_date,'quantity'=>$request->quantity,'specification'=>$request->specification,'remark'=>$request->remark]);
        return redirect()->back()->withmsg('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductionPurchaseRequisitionItem::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    // public function quotation_test($id){
    //     // dd($id);
    //     $purchase_item = ProductionPurchaseRequisitionItem::with([
    //         'production_general_purchase_quotation'=>function($q){
    //             $q->with('supplier');
    //         }

    //     ])->where('id',$id)->first();
    //     //dd($purchase_item->toArray());
    //     $general_purchase = ProductionGeneralPurchaseQuotation::get();
    //     return view('backend.production.general_purchase.quotation.show_quotation',compact('purchase_item','general_purchase'));
    // }
    public function delete($id)
    {
        ProductionPurchaseRequisitionItem::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
