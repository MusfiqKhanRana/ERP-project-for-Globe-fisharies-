<?php

namespace App\Http\Controllers;

use App\Models\ProductionSupplier;
use App\Models\ProductionSupplyList;
use App\Models\ProductionSupplyListItem;
use Illuminate\Http\Request;

class ProductionSupplyListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supply_lists = ProductionSupplyList::with(['production_supply_list_items'=>function($q){
            $q
            ->where('status','NotDone');
        },
        ])->latest()->get();
        $production_supply_list_items = ProductionSupplyListItem::get();
        // dd($supply_lists);
        return view('backend.production.supply.requisition.production_supply_list',compact('supply_lists','production_supply_list_items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$lists = ProductionSupplyList::with("production_supply_list_items")->where('id',$id)->get();
        $supply_list_items = ProductionSupplyListItem::get();
        //dd($lists->toArray());
        return view('backend.production.supply.requisition.production_add_supply',compact('supply_list_items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->toArray());
        $data = $request->all();
        $production_supply = ProductionSupplyList::create(['expected_date'=>$data['expected_date'],'remark' => $data['remark']]);
        foreach (json_decode($request->products) as $key => $product) {
            //dd(($product));
            if ($product->status=="stay"){
                $production_supply_item = ProductionSupplyListItem::create([
                    'production_supply_list_id' => $production_supply->id,
                    'item_id' => $product->item_id,
                    'grade_id' => $product->item_grade_id,
                    'grade_name' => $product->item_grade_name,
                    'quantity' => $product->quantity,
                    'status' => 'NotDone',
                ]);
            
            }
            
        }
        // dd("good");
        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionSupplyList  $productionSupplyList
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionSupplyList $productionSupplyList)
    {
        
    }
    public function addSupplyPage($id)
    {
        $supplier = ProductionSupplier::all();
        $lists = ProductionSupplyList::with("production_supply_list_items")->where('id',$id)->first();
        $supply_list_items = ProductionSupplyListItem::get();
        //dd($lists->toArray());
         return view('backend.production.supply.requisition.production_add_supply',compact('lists','supply_list_items','supplier'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionSupplyList  $productionSupplyList
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionSupplyList $productionSupplyList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionSupplyList  $productionSupplyList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionSupplyList $productionSupplyList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionSupplyList  $productionSupplyList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionSupplyList $productionSupplyList)
    {
        //
    }

    public function supply_items(Request $request)
    {
        $process_array = [];
        $id = $request->id;
        $items = ProductionSupplyListItem::with('pack')->find($id);
        return $items;
    }
}
