<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\BulkReprocessed;
use App\Models\ExportPackSize;
use App\Models\InventoryExportDamage;
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
        $date_from = Carbon::parse($request->to_date)->format('Y-m-d 00:00:00');
        $date_to = Carbon::parse($request->form_date)->format('Y-m-d 23:59:59');
        $data = ProductionExportInventory::with('export_pack_size')->where('storage_name',$request->data_for)
        ->whereBetween('created_at',[$date_from,$date_to])
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
        ->get()->groupBy('export_batch_code');
        $process_data = $this->processBulkStorage($data,$date_from,$date_to);
        return $process_data;
    }
    public function processBulkStorage($data,$date_from,$date_to){
        $process_array=[];
        foreach ($data as $key => $processes) {
            // return $key;
            $process_details = explode("#",$key);
            $item_name = null;
            $item_grade = null;
            $produced = 0;
            $reprocessed_out_count= 0;
            $damage_count = 0;
            // return $process_details;
            foreach ($processes as $key => $processing_grade) {
                $produced+=$processing_grade->transfer_qty_kg;
            }
            if (count($process_details)== 7) {
                $item_name = $process_details[5];
                $item_grade = $process_details[4];
            }else{
                $item_name = $process_details[6];
                $item_grade = $process_details[5];
            }
            $reprocessed_out = BulkReprocessed::whereBetween('created_at',[$date_from,$date_to])->where('export_batch_code',$key)->where('reprocessed_form',"Export-1")->select('id','reprocessed_quantity')->get();
            $damages = InventoryExportDamage::whereBetween('created_at',[$date_from,$date_to])->where('export_batch_code',$key)->where('damage_form',"Export-1")->select('id','damage_quantity')->get();
            // return $damages;
            foreach ($reprocessed_out as $reprocess) {
                $reprocessed_out_count+=$reprocess->reprocessed_quantity;
            }
            foreach ($damages as $damage) {
                $damage_count+=$damage->damage_quantity;
            }
            array_push($process_array,array('item_name'=>$item_name,'item_grade'=>$item_grade,'production_type'=>$process_details[0],'production_variant'=>$process_details[1],'ctn_size'=>$process_details[6],'produced'=>$produced,'ctn_weight'=>$processes[0]->export_pack_size,'reprocessed_in'=>0,'reprocessed_out'=>$reprocessed_out_count,'local'=>0,'damage'=>$damage_count));
        }
        return $process_array;
    }
}
