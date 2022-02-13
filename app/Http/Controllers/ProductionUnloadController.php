<?php

namespace App\Http\Controllers;

use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function GuzzleHttp\Promise\all;

class ProductionUnloadController extends Controller
{
    public function index()
    {
        // dd("this is good");
        return view('backend.production.unload.index');
    }
    public function unloadShow(Request $request)
    {
        $production_requistion = ProductionRequisition::with([
                                    'production_supplier'=>function($q){
                                        $q->with(['supplier_items']);
                                    },
                                    'production_requisition_items'=>function($q){
                                        $q->with(['grade']);
                                    }
                                ])
                                ->where('invoice_code',$request->invoice_no)
                                ->Where('status',"InProduction")->first();
        if ($production_requistion) {
            return view('backend.production.unload.unload_list',compact('production_requistion'));
        } else {
            return redirect()->back()->withMsg('Input Valid Code');
        }
    }
    public function store(Request $request)
    {
        ProductionRequisition::where('id',$request->requisition_id)->update(['receive_date'=>Carbon::now(),'status'=>'Received']);
        foreach ($request->id as $key => $id) {
            $item = ProductionRequisitionItem::where('id',$id)->update(['received_quantity'=>$request->received_quantity[$key],'received_remark'=>$request->received_remark[$key]]);
        }
        return redirect()->route('production-unload-index')->withMsg('Successfully Send to Chill Room');
    }
}
