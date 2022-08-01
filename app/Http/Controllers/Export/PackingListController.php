<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use App\Models\SalesContract;
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
        // dd($request->all());
        //dd('good');
        $pending_count = SalesContract::select('id','packing_status')->where('packing_status','Pending')->count();
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
}
