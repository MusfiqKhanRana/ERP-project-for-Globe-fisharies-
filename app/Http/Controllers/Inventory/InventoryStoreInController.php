<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\FishGrade;
use App\Models\ProductionProcessingGrade;
use App\Models\ProductionProcessingUnit;
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
        $grades = FishGrade::all();
        $production_unit = ProductionProcessingUnit::where('status','Bulk_storage')->with('production_processing_grades','production_processing_item')
        ->get();
        $process_production_unit = $this->getBulkStorage($production_unit);
        return $process_production_unit;
        // return view('backend.production.inventory.cold_storage.bulk_storage',compact('ppu','grades'));
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
                ProductionProcessingGrade::create([
                    'grade_id' => $input->grade_id,
                    'grade_name' => $input->grade_name,
                    'grade_quantity' => $input->grade_weight,
                    'production_processing_unit_id' => $request->grade_ppu_id,
                    'grading_date'=>Carbon::now(),
                ]); 
            }  
        }  
        return redirect()->back()->withmsg('Successfully Moved To Bulk Storage');
    }
}
