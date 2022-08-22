<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ExportPackSize;
use App\Models\ProcessingBlock;
use App\Models\ProcessingBlockSize;
use App\Models\ProcessingGrade;
use App\Models\ProductionExportInventory;
use App\Models\SupplyItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExportInventoryController extends Controller
{
    public function Storage1(){
        $fish_size = ProcessingBlockSize::all();
        $block_size = ProcessingBlock::all();
        $pack_size = ExportPackSize::all();
        $supply_item = SupplyItem::all();
        $processing_grade = ProcessingGrade::all();
        return view('backend.production.inventory.cold_storage.export_storage_1',compact('processing_grade','supply_item','pack_size','block_size','fish_size'));
    }

    public function Storage2(){
        $fish_size = ProcessingBlockSize::all();
        $block_size = ProcessingBlock::all();
        $pack_size = ExportPackSize::all();
        $supply_item = SupplyItem::all();
        $processing_grade = ProcessingGrade::all();
        return view('backend.production.inventory.cold_storage.export_storage_2',compact('processing_grade','supply_item','pack_size','block_size','fish_size'));
    }
    public function exportData(Request $request)
    {
        // return $request->all();
        $data = ProductionExportInventory::where('storage_name',$request->data_for)
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
        })
        ->get()->groupBy('batch_code');
        $process_data = $this->processBulkStorage($data);
        return $process_data;
    }
    public function processBulkStorage($data){
        $process_array=[];
        foreach ($data as $key => $processes) {
            $process_details = explode("#",$key);
            $item_name = null;
            $item_grade = null;
            $produced = 0;
            // return $processes;
            foreach ($processes as $key => $processing_grade) {
                $produced+=$processing_grade->transfer_qty_kg;
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
}
