<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ExportPackSize;
use App\Models\ProcessingBlock;
use App\Models\ProcessingBlockSize;
use App\Models\ProcessingGrade;
use App\Models\SupplyItem;
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
}
