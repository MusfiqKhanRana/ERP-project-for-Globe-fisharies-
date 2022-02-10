<?php

namespace App\Http\Controllers;

use App\Models\ProductionRequisition;
use Illuminate\Http\Request;

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
            dd("this is good");
        }
    }
}
