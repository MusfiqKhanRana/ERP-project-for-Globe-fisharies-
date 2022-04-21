<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\ProductionGeneralPurchaseQuotation;
use App\Models\ProductionPurchaseItem;
use App\Models\ProductionPurchaseRequisition;
use App\Models\ProductionPurchaseRequisitionItem;
use App\Models\ProductionPurchaseType;
use App\Models\ProductionPurchaseUnit;
use App\Models\ProductionRequisition;
use App\Models\ProductionSupplier;
use Illuminate\Http\Request;

class ProductionGeneralPurchaseQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = ProductionSupplier::all();
        $addquotation = ProductionGeneralPurchaseQuotation::select('id','status')->where('status','AddQuotation');
        $showquotation = ProductionGeneralPurchaseQuotation::select('id','status')->where('status','ShowQuotation');
        $show_quotation = ProductionGeneralPurchaseQuotation::all();
        $purchase_requisition = ProductionPurchaseRequisition::get();
        return view('backend.production.general_purchase.quotation.show_quotation',compact('show_quotation','purchase_requisition','showquotation','addquotation','supplier','productionpurchase'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $general_purchase = ProductionGeneralPurchaseQuotation::get();
        // return view('backend.production.general_purchase.cs.cs_list',compact('general_purchase'));
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

       $data = $request->all();
        //dd($data);
        $request->provided_item = json_decode($request->provided_item);
        foreach ( $request->provided_item as $key => $value) {
           // dd($value);
            $quotation = ProductionGeneralPurchaseQuotation::create(['supplier_id'=>$value->supplier_id,'price'=>$value->price,'speciality'=>$value->speciality,'production_purchase_requisition_id'=>$data['requisition_id'],'production_purchase_requisition_item_id'=>$data['requisition_item_id']]);

        }
        ProductionPurchaseRequisitionItem::where('id',$data['requisition_item_id'])->update(['status'=>"ShowQuotation",'remark'=>$data["remark"]]);
        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionGeneralPurchaseQuotation  $productionGeneralPurchaseQuotation
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionGeneralPurchaseQuotation $productionGeneralPurchaseQuotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionGeneralPurchaseQuotation  $productionGeneralPurchaseQuotation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionGeneralPurchaseQuotation $productionGeneralPurchaseQuotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionGeneralPurchaseQuotation  $productionGeneralPurchaseQuotation
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        ProductionGeneralPurchaseQuotation::whereId($id)
        ->update([
            'price' => $request->price,
            'speciality' => $request->speciality,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionGeneralPurchaseQuotation  $productionGeneralPurchaseQuotation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductionGeneralPurchaseQuotation::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function quotation(){
        return view('backend.production.general_purchase.quotation.add_quotation');
    }
    public function confirmquotation(Request $request){
        $requisition=ProductionPurchaseRequisition::with(['items','departments','users'])->latest()->paginate(10);
        $dept = Department::all();
        //dd($requisition);
        //$general_purchase = ProductionGeneralPurchaseQuotation::get();
        return view('backend.production.general_purchase.cs.cs_list',compact('requisition','dept'));
    }
    public function status_addquotation($id){
        // dd($id);
        $add= ProductionPurchaseRequisitionItem::where('id',$id)->update(['status'=>'AddQuotation']);
        return redirect()->back()->withmsg('Successfully Add Quotation');
    }
    public function status_showquotation($id){
        // dd($id);
        $show= ProductionPurchaseRequisitionItem::where('id',$id)->update(['status'=>'ShowQuotation']);
        return redirect()->back()->withmsg('Successfully Add Quotation');
    }
    
    public function quotation_test(Request $request, $id){
        $requisition=ProductionPurchaseRequisition::with(['items','departments','users'])->where('status',$request->status)->latest()->paginate(10);
        $purchase_requisition = ProductionPurchaseRequisition::get();
        $purchase_item = ProductionPurchaseRequisitionItem::with([
            'production_general_purchase_quotation'=>function($q){
                $q->with('supplier');
            },
            'production_purchase_requisition'=>function($q){
                $q->with('departments','users');
            }

        ])->where('id',$id)->first();
        dd( $purchase_item->toArray());
        return view('backend.production.general_purchase.quotation.show_quotation',compact('purchase_item','purchase_requisition','requisition'));
    }
   
    public function confirmqQuotation(Request $request){
        //dd($request);
        $data = $request->all();
        //dd($data);
        $confirm= ProductionPurchaseRequisitionItem::where('id',$data['requisition_item_id'])->update(['status'=>'ConfirmQuotation']);
        //dd($confirm);
        return redirect()->route('production-quotation-confirmquotation')->withmsg('Successfully Confirmed Quotation');
    }
    public function showcs($id){
        $purchase_requisition = ProductionPurchaseRequisition::get();
        //$general_purchase = ProductionGeneralPurchaseQuotation::get();
        $cs_item = ProductionPurchaseRequisitionItem::with([
            'production_general_purchase_quotation'=>function($q){
                $q->with('supplier');
            }

        ])->where('id',$id)->first();
        //dd( $cs_item);
        return view('backend.production.general_purchase.cs.cs_list_show',compact('cs_item','purchase_requisition'));
    }
    
}

