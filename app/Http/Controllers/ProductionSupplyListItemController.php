<?php

namespace App\Http\Controllers;

use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use App\Models\ProductionSupplyListItem;
use Illuminate\Http\Request;

class ProductionSupplyListItemController extends Controller
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
        $invoice_code = random_int(100000, 999999);
        // dd($data);
        $production_supply = ProductionRequisition::create(['invoice_code'=>$invoice_code,'remark' => $data['remark'],'expected_date'=>$data['expected_date'],'production_supplier_id'=>$data['production_supplier_id']]);
        foreach ($data['item_id'] as $key => $item) {
            // dd($item);
            // dd($data['rate'][$key]);
            $production_requisition_id = $production_supply->id;
            
            $production_requisition_item=ProductionRequisitionItem::create(['production_requisition_id'=> $production_requisition_id,'supply_item_id'=>$item,'rate'=>$data['rate'][$key],'quantity'=>$data['qty'][$key]]);
            //dd($production_requisition_item);
        }
        $production = ProductionSupplyListItem::where('id',$data['id'][$key])->update(['status'=>"Done"]);
            //dd($production);
        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionSupplyListItem  $productionSupplyListItem
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionSupplyListItem $productionSupplyListItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionSupplyListItem  $productionSupplyListItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionSupplyListItem $productionSupplyListItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionSupplyListItem  $productionSupplyListItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionSupplyListItem $productionSupplyListItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionSupplyListItem  $productionSupplyListItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionSupplyListItem $productionSupplyListItem)
    {
        //
    }
}
