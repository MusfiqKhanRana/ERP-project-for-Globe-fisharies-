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
        $items = SupplyItem::with('grade')->get();
        $suppliers = ProductionSupplier::get();
        // return $suppliers;
        $grades = FishGrade::get();
        return view('backend.production.supply.production_supplier.index',compact('items','suppliers','grades'));
    }
    public function getSupplierItems($id)
    {
        $items = ProductionSupplier::with(['supplier_items'])->where('id',$id)->first();
        return $items->supplier_items;
    }
    public function getSupplierItemsGrade($id)
    {
        $grades = FishGrade::find($id);
        return $grades;
    }
    public function AllSupplier()
    {
        $items = ProductionSupplier::where('activated',"=",1)->get();
        return $items;
    }

    public function getSupplier($id)
    {
        $items = ProductionSupplier::find($id);
        return $items;
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
        $Supplier = ProductionSupplier::create(['name' => $data['supplier_name'],'phone' => $data['supplier_mobile'],'address' => $data['supplier_address'],'email' => $data['supplier_email'],]);
        // foreach (json_decode($request->provided_item) as $key => $item) {
        //     // dd(var_dump($product->amount_discount));
        //     if ($item->status=="stay"){
        //         $production_supplier_item = ProductionSupplierItem::create([
        //             'production_supplier_id' => $Supplier->id,
        //             'supply_item_id' => $item->item_id,
        //             'rate' => $item->rate
        //         ]);
        //     }
            
        // }
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
    public function destroy($id)
    {
        // dd($id);
        ProductionSupplier::find($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function activate($id){
        // dd($id);
        ProductionSupplier::where('id', $id)
        ->update(
            ['activated'=>'1']
        );
        return redirect()->back()->withMsg("Successfully Activated");
    }
    public function deactivate($id){
        // dd($id);
        ProductionSupplier::where('id', $id)
        ->update(
            ['activated'=>'0']
        );
        return redirect()->back()->withMsg("Successfully Deactivated");
    }
}
