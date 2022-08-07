<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\SalesContract;
use App\Models\SalesContractItem;
use Illuminate\Http\Request;

class PackingListController extends Controller
{
    public function index(Request $request)
    {
        $packing_status = null;
        if ($request->status == "Approved"){
            $packing_status = 'Approved';
        }else{
            $packing_status = 'Pending';
        }
        $pending_count = SalesContract::select('id','status')->where('status','Approved')->where('packing_status','Pending')->count();
        $approved_count = SalesContract::select('id','packing_status')->where('packing_status','Approved')->count();
        $sale_contracts = SalesContract::where('status',"Approved")->where(function($q) use($packing_status){
            if ($packing_status) {
                $q->where('packing_status',$packing_status);
            }
        })
        ->with(['sales_contract_items','export_buyer','advising_bank','documents'])->get();
       //dd($sale_contracts);
        return view('backend.export_management.packing_list',compact('sale_contracts','pending_count','approved_count'));
    }
    public function packing_list($id)
    {
        
        $sale_contract = SalesContract::where('id',$id)->update(['packing_status'=>'Approved']);
        //dd($sale_contract);
        return redirect()->back()->withMsg('Successfully Approver');
    }

    public function ProductionDateSave(Request $request, $id)
    {
        
        $production_date = SalesContract::find($id);
        //dd($production_date);
        $production_date->packing_production_date = $request->packing_production_date;
        $production_date->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    public function PackingExpiryDate(Request $request, $id)
    {
        
        $expiry_date = SalesContractItem::find($id);
        $expiry_date->expiry_date = $request->expiry_date;
        $expiry_date->save();

        return redirect()->back()->withMsg('Successfully Created');
    }


    public function packingGrossWeight(Request $request, $id)
    {
        $grossWeight = SalesContract::where('id',$id)->update(['packing_gross_weight'=>$request->packing_gross_weight]);
        return redirect()->back()->withMsg('Successfully Created');
    }

    public function PrintPacking($id){
        $data = SalesContract::with(['sales_contract_items','export_buyer','advising_bank'])->where('id',$id)->first();
        // dd($sale_contracts->toArray());
        return view('backend.export_management.packing_list.print_packing',compact('data'));
    }
}
