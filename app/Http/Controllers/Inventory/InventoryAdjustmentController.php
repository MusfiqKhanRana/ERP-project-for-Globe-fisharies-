<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ExportPackSize;
use App\Models\InventoryAdjustment;
use App\Models\ProcessingBlock;
use App\Models\ProcessingBlockSize;
use App\Models\ProcessingGrade;
use App\Models\SupplyItem;
use Illuminate\Http\Request;

class InventoryAdjustmentController extends Controller
{
    function index(Request $request){
        // dd($request->status);
        $mc_sizes = ExportPackSize::all();
        $items = SupplyItem::all();
        $grades = ProcessingGrade::all();
        $blocks = ProcessingBlock::all();
        $sizes = ProcessingBlockSize::all();
        $adjustments=InventoryAdjustment::with('SupplyItem','Grade','Block','Block_size','MC_size')->where('status',$request->status)->get();
        // dd($adjustments->toArray());
        $confirmcount = InventoryAdjustment::select('id','status')->where('status','Confirm')->count();
        $pendingcount = InventoryAdjustment::select('id','status')->where('status','Pending')->count();
        return view('backend.production.inventory.inventory_adjustment.list',compact('adjustments','confirmcount','pendingcount','mc_sizes','items','grades','blocks','sizes'));
    }
    function create(){
    $mc_sizes = ExportPackSize::all();
    $items = SupplyItem::all();
    $grades = ProcessingGrade::all();
    $blocks = ProcessingBlock::all();
    $sizes = ProcessingBlockSize::all();
    return view('backend.production.inventory.inventory_adjustment.create',compact('mc_sizes','items','grades','blocks','sizes'));
   }
   function delete(Request $request){
        InventoryAdjustment::whereId($request->id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
   }
   function confirm(Request $request){
        InventoryAdjustment::whereId($request->id)->update([
            'status'=>'Confirm'
        ]);
        return redirect()->back()->withMsg("Successfully Confirmed");
    }
   function store(Request $request){
        // dd($request->toArray());
        InventoryAdjustment::create([
            'adj_type'=>$request->adj_type,
            'adj_name'=>$request->adj_name,
            'target_storage'=>$request->target_storage,
            'production_date'=>$request->production_date,
            'receiver_name'=>$request->receiver_name,
            'invoice_no'=>$request->invoice_no,
            'adjustment_date'=>$request->adjustment_date,
            'supplier_item_id'=>$request->item,
            'type'=>$request->type,
            'variant'=>$request->variant,
            'processing_grade_id'=>$request->grade,
            'processing_block_id'=>$request->block_id,
            'processing_block_size_id'=>$request->block_size_id,
            'export_pack_size_id'=>$request->mc_size,
            'mc_quantity'=>$request->mc_quantity,
            'quantity'=>$request->quantity,
            'remark'=>$request->remark
        ]);
        return redirect()->back()->withMsg('Successfully Created');
   }
}
