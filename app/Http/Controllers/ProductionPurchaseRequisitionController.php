<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ProductionPurchaseItem;
use App\Models\ProductionPurchaseRequisition;
use App\Models\ProductionPurchaseRequisitionItem;
use App\Models\ProductionPurchaseType;
use Illuminate\Http\Request;

class ProductionPurchaseRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisition=ProductionPurchaseRequisition::with('items')->get();
        dd($requisition->toArray());
        return view('backend.production_purchase_requisition.index',compact('requisition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProductionPurchaseType::all();
        $dept = Department::all();
        return view('backend.production_purchase_requisition.create',compact('dept','types'));
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
        // $data = $request->all();
        // dd($data);
        // unset($data['_token']);
        $production_purchase_requisition = ProductionPurchaseRequisition::create(['department'=>$request->department,'requested_by'=>$request->requested_by,'remark'=>$request->remark]);
        // $data = $request->all();
        foreach (json_decode($request->products) as $key => $value) {
            // dd($value);
            $production_purchase_requisition_id = $production_purchase_requisition->id;
            $item=ProductionPurchaseRequisitionItem::create(['production_purchase_requisition_id'=>$production_purchase_requisition_id,'item_id'=>$value->item_id,'item_name'=>$value->item_name,'item_type_id'=>$value->item_type_id,'item_type_name'=>$value->item_type_name,'item_unit_id'=>$value->item_unit_id,'item_unit_name'=>$value->item_unit_name,'demand_date'=>$value->demand_date,'image'=>$value->image,'quantity'=>$value->quantity,'specification'=>$value->specification,'remark'=>$value->remark]);
        }
        return redirect()->back()->withmsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionPurchaseRequisition  $productionPurchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item= ProductionPurchaseItem::with('productionpurchaseunit')->where('procution_purchase_type_id',$id)->get();
        return($item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionPurchaseRequisition  $productionPurchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionPurchaseRequisition $productionPurchaseRequisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionPurchaseRequisition  $productionPurchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionPurchaseRequisition $productionPurchaseRequisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionPurchaseRequisition  $productionPurchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionPurchaseRequisition $productionPurchaseRequisition)
    {
        //
    }
}
