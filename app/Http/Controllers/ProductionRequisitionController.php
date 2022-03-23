<?php

namespace App\Http\Controllers;

use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use App\Models\SupplyItem;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\helpers\helpers;
use App\Models\FishGrade;
use Helper;

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
        $production_requisition = ProductionRequisition::with([
            'production_supplier'=>function($q){
                $q->with(['supplier_items']);
            },
            'production_requisition_items'=>function($q){
                $q->with(['grade']);
            }
        ])->where('status',$request->status)->latest()->paginate(10);
        //  dd($production_requisition->toArray());   
        return view('backend.production.supply.requisition.list',compact('production_requisition','production_requisition_pending_count','production_requisition_Confirm_count','production_requisition_Approved_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supply_item = SupplyItem::with('grade')->get();
        return view('backend.production.supply.requisition.index',compact('supply_item'));
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
            ProductionRequisition::where('id',$request->id)->update(['status'=>"Reject",'reject_date'=>Carbon::now(),'reject_note'=>$request->reject_note]);
            return redirect()->back()->withMsg("Successfully send to Reject List");
        }
        elseif($request->status=="Returned"){
            ProductionRequisition::where('id',$request->id)->update(['status'=>"Returned",'returned_date'=>Carbon::now(),'return_note'=>$request->return_note]);
            return redirect()->back()->withMsg("Successfully send to Return List");
        }
        elseif($request->status=="InProduction"){
            ProductionRequisition::where('id',$request->id)->update(['status'=>"InGateman",'in_gateman_date'=>Carbon::now()]);
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
        // $invoice_code = Helper::IDGenerator(new ProductionRequisition, 'invoice_code', 5, 'Requisition');
        $invoice_code = random_int(100000, 999999);
        dd($data);
        // dd(var_dump($data));
        $production_requisition = ProductionRequisition::create(['production_supplier_id' => $data['supplier_id'],'invoice_code'=>$invoice_code,'details' => $data['details']]);
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
    public function requisitionPrint($id){
        $data=ProductionRequisition::with(['supplier'=>function($q){
            $q->with(['phone','name']);      
        }
         ])->where('id',$id)->first();
     //    dd($data->toArray());
        return view('backend.production.supply.requisition.print_requisition',compact('data'));
     }
     public function getRequisitionItems($id)
     {
         return $id;
         $items = ProductionRequisitionItem::with(['requisition_items'])->where('id',$id)->first();
         return $items->requisition_items;
     }
     public function getRequisitionItemsGrade($id)
     {
         $grades = FishGrade::find($id);
         return $grades;
     }
}
