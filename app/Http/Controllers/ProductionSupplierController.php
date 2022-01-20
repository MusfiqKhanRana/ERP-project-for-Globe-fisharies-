<?php

namespace App\Http\Controllers;

use App\Models\FishGrade;
use App\Models\ProductionSupplier;
use App\Models\ProductionSupplierItem;
use App\Models\Supplier;
use App\Models\SupplyItem;
use Illuminate\Http\Request;

class ProductionSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SupplyItem::get();
        $suppliers = ProductionSupplier::get();
        $grades = FishGrade::get();
        return view('backend.production.supply.production_supplier.index',compact('items','suppliers','grades'));
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
        // dd($request->all());
        $data = $request->all();
        $Supplier = Supplier::create(['supplier_name' => $data['supplier_name'],'supplier_mobile' => $data['supplier_mobile'],'supplier_address' => $data['supplier_address'],'supplier_email' => $data['supplier_email'],]);
        foreach (json_decode($request->provided_item) as $key => $item) {
            // dd(var_dump($product->amount_discount));
            if ($item->status=="stay"){
                $production_supplier_item = ProductionSupplierItem::create([
                    'production_supplier_id' => $Supplier->id,
                    'supply_item_id' => $item->item_id,
                    'grade_id' => $item->grade_id,
                    'rate' => $item->rate
                ]);
            }
            
        }
        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionSupplier  $productionSupplier
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionSupplier $productionSupplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionSupplier  $productionSupplier
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionSupplier $productionSupplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionSupplier  $productionSupplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionSupplier $productionSupplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionSupplier  $productionSupplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionSupplier $productionSupplier)
    {
        //
    }
}
