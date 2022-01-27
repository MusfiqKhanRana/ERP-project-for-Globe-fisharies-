<?php

namespace App\Http\Controllers;

use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use Illuminate\Http\Request;

class ProductionRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $production_requisition = ProductionRequisition::with(['production_supplier',
        'production_requisition_items' => function($q){

        }
        ])->get();
        dd($production_requisition->toArray());   
        return view('backend.production.supply.requisition.list',compact('production_requisition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.production.supply.requisition.index');
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
        // dd($data);
        // dd(var_dump($data));
        $production_requisition = ProductionRequisition::create(['production_supplier_id' => $data['supplier_id'],'details' => $data['details']]);
        foreach (json_decode($request->products) as $key => $product) {
            // dd(var_dump($product));
            if ($product->status=="stay"){
                $production_requisition_item = ProductionRequisitionItem::create([
                    'production_requisition_id' => $production_requisition->id,
                    'supply_item_id' => $product->item_id,
                    'rate' => $product->rate,
                    'quantity' => $product->quantity,
                    'amount' => floatval($product->total_price),
                ]);
            }
            
        }
        // dd("good");
        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionRequisition  $productionRequisition
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionRequisition $productionRequisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionRequisition  $productionRequisition
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionRequisition $productionRequisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionRequisition  $productionRequisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionRequisition $productionRequisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionRequisition  $productionRequisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionRequisition $productionRequisition)
    {
        //
    }
}
