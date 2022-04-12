<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ProductionPurchaseItem;
use App\Models\ProductionPurchaseRequisition;
use App\Models\ProductionPurchaseRequisitionItem;
use App\Models\ProductionPurchaseType;
use App\Models\ProductionPurchaseUnit;
use App\Models\ProductionRequisitionItem;
use App\Models\ProductionSupplier;
use App\Models\ProductionSupplyList;
use Illuminate\Http\Request;

class ProductionPurchaseRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suppliers = ProductionSupplier::get();
        $pendingcount = ProductionPurchaseRequisition::select('id','status')->where('status','Pending')->count();
        $confirmcount = ProductionPurchaseRequisition::select('id','status')->where('status','Confirm')->count();
        $types = ProductionPurchaseType::all();
        $requisition_item = ProductionPurchaseItem::all();
        $requisition_unit = ProductionPurchaseUnit::all();
        // $requisition=ProductionPurchaseRequisition::where('status','Pending')->with('items','departments','users')->get();
        $requisition=ProductionPurchaseRequisition::with(['items','departments','users'])->where('status',$request->status)->latest()->paginate(10);
        $dept = Department::all();
       
         //dd($supply_lists->toArray());
        return view('backend.production.general_purchase.production_purchase_requisition.index',compact('requisition','dept','types','requisition_item','requisition_unit','confirmcount','pendingcount','suppliers'));
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
        return view('backend.production.general_purchase.production_purchase_requisition.create',compact('dept','types'));
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
        $requisition_code = random_int(100000, 999999);
        $production_purchase_requisition = ProductionPurchaseRequisition::create(['department'=>$request->department,'requested_by'=>$request->requested_by,'remark'=>$request->remark,'requisition_code'=>$requisition_code]);
        // $data = $request->all();
        foreach (json_decode($request->products) as $key => $value) {
            // dd($value);
            $production_purchase_requisition_id = $production_purchase_requisition->id;
            $item=ProductionPurchaseRequisitionItem::create(['production_purchase_requisition_id'=>$production_purchase_requisition_id,'item_id'=>$value->item_id,'item_name'=>$value->item_name,'item_type_id'=>$value->item_type_id,'item_type_name'=>$value->item_type_name,'item_unit_id'=>$value->item_unit_id,'item_unit_name'=>$value->item_unit_name,'demand_date'=>$value->demand_date,'image'=>$value->image,'quantity'=>$value->quantity,'specification'=>$value->specification,'remark'=>$value->remark]);
        }
        return redirect()->route('production-purchase-requisition.index');
        // return redirect('backend.production.general_purchase.production_purchase_requisition.index')->withmsg('Successfully Created');
        // return view('backend.production.general_purchase.production_purchase_requisition.index');
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
    public function update(Request $request, $id)
    {
        // dd($request);
        $update= ProductionPurchaseRequisition::where('id',$id)->update(['department'=>$request->department,'remark'=>$request->remark]);
        return redirect()->back()->withmsg('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionPurchaseRequisition  $productionPurchaseRequisition
     * @return \Illuminate\Http\Response
     */
    public function print($id){
        // dd($id);
        $requisition=ProductionPurchaseRequisition::where('id',$id)->with('items','departments','users')->first();
        // dd($requisition->toArray());
        return view('backend.production.general_purchase.production_purchase_requisition.purchase_requisition_print',compact('requisition'));
    }
    public function destroy($id)
    {
        // dd($id);
        $delete= ProductionPurchaseRequisition::where('id',$id)->update(['status'=>'Reject']);
        return redirect()->back()->withmsg('Successfully Deleted');
    }
    public function status_confirm($id){
        // dd($id);
        $confirm= ProductionPurchaseRequisition::where('id',$id)->update(['status'=>'Confirm']);
        return redirect('backend.production.general_purchase.quotation.index')->withmsg('Successfully Confirmed Quotation');
    }
    public function status_quotation($id){
        // dd($id);
        $confirm= ProductionPurchaseRequisition::where('id',$id)->update(['status'=>'Quotation']);
        return redirect()->back()->withmsg('Successfully Confirmed Quotation');
    }
    public function status_purchased(Request $request){
        // dd($request->all());
        $data = $request->except(['_token']);
        $confirm= ProductionPurchaseRequisition::where('id',$request->requisition_id)->update(['status'=>'Purchased']);
        foreach ($data['supplier_info'] as $key => $value) {
            // dd($value);
            $supplier_info = $data['supplier_info'][$key];
            $id = $data['id'][$key];
            ProductionPurchaseRequisitionItem::where('id', $id)->update(['supplier_info'=>$supplier_info]);
        }
        return redirect()->back()->withmsg('Successfully Purchase Confirmed');
    }
    public function order(){
        $requisition=ProductionPurchaseRequisition::where('status','Confirm')->Orwhere('status','Purchased')->with('items','departments','users')->get();
        // dd($requisition->toArray());
        return view('backend.production.general_purchase.production_purchase_requisition.order',compact('requisition'));
    }

    public function ch_list(){
        $dept = Department::all();
        $types = ProductionPurchaseType::all();
        $requisition_item = ProductionPurchaseItem::all();
        $requisition_unit = ProductionPurchaseUnit::all();
        $requisition=ProductionPurchaseRequisition::where('status','Pending')->with('items','departments','users')->get();
        return view('backend.production.general_purchase.ch.ch_list',compact('requisition','types','requisition_item','requisition_unit','dept'));
    }
    public function ChItemList(){
        $dept = Department::all();
        $types = ProductionPurchaseType::all();
        $requisition_item = ProductionPurchaseItem::all();
        $requisition_unit = ProductionPurchaseUnit::all();
        $requisition=ProductionPurchaseRequisition::where('status','Pending')->with('items','departments','users')->get();
        return view('backend.production.general_purchase.ch.ch_item_list',compact('requisition','types','requisition_item','requisition_unit','dept'));
    }
    public function quotation(){
        $requisition=ProductionPurchaseRequisition::where('status','Quotation')->with('items','departments','users')->get();
        $supplier = ProductionSupplier::get();
        return view('backend.production.general_purchase.quotation.index',compact('supplier','requisition'));
    }

    public function add_quotation_data_pass(Request $request){
        //return $request;
       $quotation_data = ProductionPurchaseRequisition::where('id','requisition_id')->with('items','departments','users','demand_date')->get();
       dd( $quotation_data->toArray);
    }
    // public function quotation_list(){
    //     $requisition=ProductionPurchaseRequisition::where('status','Confirm')->Orwhere('status','Purchased')->with('items','departments','users')->get();
    //     dd($requisition->toArray());
    //     return view('backend.production.general_purchase.quotation.index',compact('requisition'));
    // }

}