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

use function GuzzleHttp\Promise\all;

class InventoryStoreInController extends Controller
{
    public function store_in(){
        $grades = ProcessingGrade::all();
        $ppu = ProductionProcessingUnit::where('status','StoreIn')->with('production_processing_grades','production_processing_item')->latest()->paginate(5);
        // dd($ppu->toArray());
        return view('backend.production.inventory.store-in.index',compact('ppu','grades'));
    }
    public function bulk_storage(){
        $pack_size = ExportPackSize::all();
        $supply_item = SupplyItem::all();
        $processing_grade = ProcessingGrade::all();
        return view('backend.production.inventory.cold_storage.bulk_storage',compact('processing_grade','supply_item','pack_size'));
    }
    public function bulk_storage_datapass(Request $request){
        $processing_grades = ProductionProcessingGrade::with('production_processing_unit')->whereHas('production_processing_unit',function($q)use($request){
            $q->where('status','Bulk_storage')
            ->whereBetween('created_at',[Carbon::parse($request->to_date)->format('Y-m-d 00:00:00'),Carbon::parse($request->form_date)->format('Y-m-d 23:59:59')])
            ->where(function($q) use($request){
                if ($request->processing_type == "IQF") {
                    $q->whereIn('processing_name',['iqf','raw_iqf_shrimp','blanched_iqf_shrimp']);
                }elseif ($request->processing_type == "BLOCK") {
                    $q->whereIn('processing_name',['block_frozen','raw_bf_shrimp','semi_iqf']);
                }
                elseif ($request->processing_type == "VEGETABLE") {
                    $q->whereIn('processing_name',['vegetable_iqf','vegetable_block','semi_iqf']);
                }
                elseif ($request->processing_type == "DRYFISH") {
                    $q->whereIn('processing_name',['dry_fish']);
                }
                elseif ($request->processing_type == "SWEET") {
                    $q->whereIn('processing_name',['Sweet Desert']);
                }
            });
        })->get()->groupBy('batch_code');
        $process_data = $this->processBulkStorage($processing_grades);
        return $process_data;
    }
    public function processBulkStorage($data){
        $process_array=[];
        foreach ($data as $key => $processes) {
            $process_details = explode("#",$key);
            $item_name = null;
            $item_grade = null;
            $produced = 0;
            foreach ($processes as $key => $processing_grade) {
                $produced+=$processing_grade->final_weight;
            }
            if (count($process_details)== 6) {
                $item_name = $process_details[5];
                $item_grade = $process_details[4];
            }else{
                $item_name = $process_details[6];
                $item_grade = $process_details[5];
            }
            array_push($process_array,array('item_name'=>$item_name,'item_grade'=>$item_grade,'production_type'=>$process_details[0],'production_variant'=>$process_details[1],'produced'=>$produced,'reprocessed_in'=>0,'reprocessed_out'=>0,'local'=>0,'damage'=>0));
        }
        return $process_array;
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
        // dd($request->toArray());
        if ($request->inputs==null) {
            ProductionProcessingUnit::where('id',$request->production_processing_unit_id)
            ->update(
                ['StoreIn_datetime'=>Carbon::now(),'status'=>'Bulk_storage']
            );
        }
        if ($request->inputs!=null) {
            ProductionProcessingUnit::where('id',$request->production_processing_unit_id)
            ->update(
                ['StoreIn_datetime'=>Carbon::now(),'status'=>'Bulk_storage']
            );
            $ppu = ProductionProcessingUnit::with('production_processing_item')->where('id',$request->production_processing_unit_id)->first();
            // dd($ppu->toArray());
            foreach (json_decode($request->inputs) as $key => $input) {
                if ($input->status=="stay") {
                    $ppg=ProductionProcessingGrade::create([
                        'batch_code'=>$ppu->processing_name.'#'.$ppu->processing_variant.'#'.$ppu->item_id.'#'.$input->grade_id.'#'.$input->grade_name.'#'.$ppu->production_processing_item->name,
                        'grade_id' => $input->grade_id,
                        'grade_name' => $input->grade_name,
                        'grade_quantity' => $input->grade_weight,
                        'final_weight' => $input->grade_weight,
                        'production_processing_unit_id' => $request->production_processing_unit_id,
                        'grading_date'=>Carbon::now(),
                    ]); 
                }
                // dd($ppg->toArray());
            }  
        }  
        return redirect()->back()->withmsg('Successfully Moved To Bulk Storage');
    }
}
