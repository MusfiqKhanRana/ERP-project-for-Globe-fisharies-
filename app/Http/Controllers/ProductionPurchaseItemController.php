<?php

namespace App\Http\Controllers;

use App\Models\ProductionPurchaseItem;
use App\Models\ProductionPurchaseType;
use App\Models\ProductionPurchaseUnit;
use Illuminate\Http\Request;

class ProductionPurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $production_purchase_unit = ProductionPurchaseUnit::all();
        $production_purchase_type = ProductionPurchaseType::all();
        $production_purchase_item = ProductionPurchaseItem::with('productionpurchasetype','productionpurchaseunit')->get();
        // return $production_purchase_item;
        return view('backend.production.general_purchase.production_purchase_item.index',compact('production_purchase_unit','production_purchase_type','production_purchase_item'));
    }

    public function GeneralStock(){
        return view('backend.production.general_purchase.general_stock.index');
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
        $this->validate($request,array(
           'name' => 'min:2|max:191',
        ));
        $users = new ProductionPurchaseItem();
        $users->name = $request->name;
        $users->procution_purchase_type_id = $request->procution_purchase_type_id;
        $users->production_purchase_unit_id = $request->procution_purchase_unit_id;
        $users->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionPurchaseItem  $productionPurchaseItem
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionPurchaseItem $productionPurchaseItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionPurchaseItem  $productionPurchaseItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionPurchaseItem $productionPurchaseItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionPurchaseItem  $productionPurchaseItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        ProductionPurchaseItem::whereId($id)
        ->update([
            'name' => $request->name,
            'procution_purchase_type_id' => $request->procution_purchase_type_id,
            'production_purchase_unit_id' => $request->production_purchase_unit_id,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionPurchaseItem  $productionPurchaseItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductionPurchaseItem::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
