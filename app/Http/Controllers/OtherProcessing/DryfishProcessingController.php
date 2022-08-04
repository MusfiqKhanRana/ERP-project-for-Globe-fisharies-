<?php

namespace App\Http\Controllers\OtherProcessing;

use App\Http\Controllers\Controller;
use App\Models\ProductionProcessingUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DryfishProcessingController extends Controller
{
    public function index(){
        $regular_count = ProductionProcessingUnit::select('id')->where('processing_name','dry_fish')
        ->where('processing_variant','regular')
        ->where('status','!=','StoreIn')
        ->where('status','!=','Bulk_storage')
        ->get()->count();
        return view('backend.production.dryfish_processing.index',compact('regular_count'));
    }
    public function regular_to_store(Request $request){
        // dd($request->toArray());
        ProductionProcessingUnit::where('id',$request->ppu_id)
        ->update(
            ['status'=>'StoreIn','Initial_weight'=>$request->sorting_weight,'initial_weight_datetime'=>Carbon::now(),'wastage_quantity'=>$request->wastage_quantity,'return_quantity'=>$request->return_quantity,'RandW_datetime'=>Carbon::now()]
        );
        return redirect()->back()->withmsg('Successfully Your Dry Fish Process is Done');
    }
}
