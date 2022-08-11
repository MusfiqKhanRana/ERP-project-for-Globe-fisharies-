<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ExportPackSize;
use App\Models\FishGrade;
use App\Models\ProcessingGrade;
use App\Models\ProductionProcessingGrade;
use App\Models\ProductionProcessingUnit;
use App\Models\SupplyItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryStoreInController extends Controller
{
    public function store_in(){
        $grades = FishGrade::all();
        $ppu = ProductionProcessingUnit::where('status','StoreIn')->with('production_processing_grades','production_processing_item')->latest()->paginate(5);
        // dd($ppu->toArray());
        return view('backend.production.inventory.store-in.index',compact('ppu','grades'));
    }
    public function bulk_storage(){
        $pack_size = ExportPackSize::all();
        $supply_item = SupplyItem::all();
        $processing_grade = ProcessingGrade::all();
        $production_processing_unit = ProductionProcessingUnit::where('status','Bulk_storage')->with('production_processing_grades','production_processing_item')->get();
        //dd($production_processing_unit);
        // $process_production_unit = $this->getBulkStorage($production_unit);
        // return $process_production_unit;
        return view('backend.production.inventory.cold_storage.bulk_storage',compact('production_processing_unit','processing_grade','supply_item','pack_size'));
    }
    public function bulk_storage_datapass(Request $request){
            $production_processing_unit = ProductionProcessingUnit::where('status','Bulk_storage')
            ->where(function($q) use($request){
                if ($request->processing_type == "IQF") {
                    $q->whereIn('processing_name',['iqf','raw_iqf_shrimp','blanched_iqf_shrimp']);
                }elseif ($request->processing_type == "BLOCK") {
                    $q->whereIn('processing_name',['block_frozen','raw_bf_shrimp','semi_iqf']);
                }
            })
            ->with('production_processing_grades','production_processing_item')->get();
            return $production_processing_unit;
    }
    public function getBulkStorage($data)
    {
        // processing_type_array = ['']
        foreach ($data as $key => $process) {
            // if (condition) {
            //     # code...
            // }
            return $process;
        }
        return $data;
    }
    public function move_to_store(Request $request){
        // dd($request);
        if ($request->inputs==null) {
            ProductionProcessingUnit::where('id',$request->production_processing_unit_id)
            ->update(
                ['status'=>'Bulk_storage','store_in_status'=>'Bulk_storage']
            );
        }
        if ($request->inputs!=null) {
            ProductionProcessingUnit::where('id',$request->production_processing_unit_id)
            ->update(
                ['status'=>'Bulk_storage','store_in_status'=>'Bulk_storage']
            );
            foreach (json_decode($request->inputs) as $key => $input) {
                if ($input->status=="stay") {
                    ProductionProcessingGrade::create([
                        'grade_id' => $input->grade_id,
                        'grade_name' => $input->grade_name,
                        'grade_quantity' => $input->grade_weight,
                        'final_weight' => $input->grade_weight,
                        'production_processing_unit_id' => $request->grade_ppu_id,
                        'grading_date'=>Carbon::now(),
                    ]); 
                }
            }  
        }  
        return redirect()->back()->withmsg('Successfully Moved To Bulk Storage');
    }
}
