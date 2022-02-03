<?php

namespace App\Http\Controllers;

use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductionRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $production_requisition_pending_count = ProductionRequisition::select('id')->where('status','Pending')->count();
        $production_requisition_Confirm_count = ProductionRequisition::select('id')->where('status','Confirm')->count();
        $production_requisition_Approved_count = ProductionRequisition::select('id')->where('status','Approved')->count();
        $production_requisition = ProductionRequisition::with(['production_supplier',
            'production_requisition_items'=>function($q){
                $q->with(['grade']);
            }
        ])->where('status',$request->status)->latest()->paginate(10);
        // dd($production_requisition->toArray());   
        return view('backend.production.supply.requisition.list',compact('production_requisition','production_requisition_pending_count','production_requisition_Confirm_count','production_requisition_Approved_count'));
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
    public function changeStatus(Request $request)
    {
        // dd($request->all());
        if ($request->status=="Confirm") {
            ProductionRequisition::where('id',$request->id)->update(['status'=>"Confirm",'confirm_date'=>Carbon::now()]);
            return redirect()->back()->withMsg("Successfully send to Admin");
        }elseif($request->status=="Approved"){
            ProductionRequisition::where('id',$request->id)->update(['status'=>"Approved",'approved_date'=>Carbon::now()]);
            return redirect()->back()->withMsg("Successfully send to Approved List");
        }
        elseif($request->status=="Reject"){
            ProductionRequisition::where('id',$request->id)->update(['status'=>"Reject",'reject_date'=>Carbon::now()]);
            return redirect()->back()->withMsg("Successfully send to Reject List");
        }
        elseif($request->status=="Returned"){
            ProductionRequisition::where('id',$request->id)->update(['status'=>"Returned",'returned_date'=>Carbon::now()]);
            return redirect()->back()->withMsg("Successfully send to Return List");
        }
        elseif($request->status=="InProduction"){
            ProductionRequisition::where('id',$request->id)->update(['status'=>"InProduction",'in_production_date'=>Carbon::now()]);
            return redirect()->back()->withMsg("Successfully send to InProduction List");
        }
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
                    // 'amount' => floatval($product->total_price),
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
    public function destroy($id)
    {
        ProductionRequisition::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function requisition_product_delete($id)
    {
        DB::table('production_requisition_items')->where('id', '=',$id)->delete();
        return redirect()->back()->withmsg('Successfully Deleted');
    }
    
}
