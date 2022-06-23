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
use Illuminate\Database\Eloquent\Builder;
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
        $requisition=ProductionPurchaseRequisition::with([
            // 'production_requisition_item'=>function($q){
            //     $q->where('status','ConfirmQuotation');
            // }
            'departments','users','production_requisition_item'])
        ->whereHas('production_requisition_item',function($q){
            $q->where('status','ConfirmQuotation');
        })
        ->get();
        // dd($requisition->toArray());
        $dept = Department::all();
        // dd($requisition->toArray());
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
        $purchase_requisition = ProductionPurchaseRequisition::get();
        $purchase_item = ProductionPurchaseRequisitionItem::with([
            'production_general_purchase_quotation'=>function($q){
                $q->where('status','InQuotation')->with('supplier');
            },
            'production_purchase_requisition'=>function($q){
                $q->with('users','departments');
            }

        ])->where('id',$id)->first();
        //dd( $purchase_item->toArray());
        return view('backend.production.general_purchase.quotation.show_quotation',compact('purchase_item','purchase_requisition'));
    }
   
    public function confirmqQuotation(Request $request){
        // dd($request);
        // $data = $request->all();
        //dd($data);
        $confirm= ProductionPurchaseRequisitionItem::where('id',$request->requisition_item_id)->update(['status'=>'ConfirmQuotation']);
        //dd($confirm);
        $check = ProductionPurchaseRequisitionItem::where('production_purchase_requisition_id',$request->requisition_id)->get();
        $count = 0;
        foreach ($check as $key => $value) {
            if ($value->status != 'ConfirmQuotation') {
                $count+=1;
            }
        }
        if ($count==0) {
            ProductionPurchaseRequisition::where('id',$request->requisition_id)->update([
                'status' => 'ConfirmQuotation'
            ]);
        }
        return redirect()->route('production-purchase-quotation')->withmsg('Successfully Confirmed Quotation');
    }
    public function showcs(Request $request, $id){
        // dd($id);
        ProductionGeneralPurchaseQuotation::where('production_purchase_requisition_item_id',$id)->update(['status'=>'InCS']);
        // return ProductionPurchaseRequisitionItem::with(['production_general_purchase_quotation'])->get();
        $purchase_requisition = ProductionGeneralPurchaseQuotation::get();
        $cs_item = ProductionPurchaseRequisitionItem::with([
            'production_general_purchase_quotation'=>function($q){
                $q->where('status','InCS')->with('supplier');
            },
            'production_purchase_requisition'=>function($q){
                $q->with('users','departments');
            }

        ])->where('id',$id)->first();
    //    dd($cs_item);
        return view('backend.production.general_purchase.cs.cs_list_show',compact('cs_item'));
    }
    public function shownegotiation(Request $request, $id){
        // dd($id);
        // return ProductionPurchaseRequisitionItem::with(['production_general_purchase_quotation'])->get();
        $purchase_requisition = ProductionGeneralPurchaseQuotation::get();
        $cs_item = ProductionPurchaseRequisitionItem::with([
            'production_general_purchase_quotation'=>function($q){
                $q->where('status','InNegotiation')->with('supplier');
            },
            'production_purchase_requisition'=>function($q){
                $q->with('users','departments');
            }

        ])->where('id',$id)->first();
    //    dd($cs_item->toArray());
        return view('backend.production.general_purchase.production_purchase_negotiation.show',compact('cs_item'));
    }
    public function quotation_delete($id){
        // dd($id);
        ProductionGeneralPurchaseQuotation::where('id',$id)->update(['status'=>'Reject']);
        return redirect()->back()->withmsg('Successfully Deleted Quotation');
    }
    public function quotation_confirm(Request $request){
        // dd($request->all());
        // $variable=ProductionGeneralPurchaseQuotation::where('production_purchase_requisition_item_id',$request->item_id)->get();
        // // dd($variable->toArray());
        // $itemTypes = [];
        // foreach ($variable as $key => $value) {
        //     // dd($value);
        //     array_push($itemTypes,$value->id); 
        // }
        // dd($itemTypes);

        // ProductionGeneralPurchaseQuotation::whereIn('production_purchase_requisition_item_id',$itemTypes)->update(['status'=>'Reject']);
        ProductionGeneralPurchaseQuotation::where('id',$request->quotation_id)->update(['status'=>'InPurchase']);
        ProductionPurchaseRequisitionItem::where('id',$request->item_id)->update([
            'confirm_rate'=>$request->nego_price,
            'supplier_info' => $request->supplier_info,
            'status'=>'InPurchase'
       ]);
       return redirect()->route('production-quotation-confirmquotation');
    }
}

