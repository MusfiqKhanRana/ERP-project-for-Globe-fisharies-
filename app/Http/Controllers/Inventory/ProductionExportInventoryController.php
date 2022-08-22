<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ProcessingBlock;
use App\Models\ProcessingGrade;
use App\Models\ProductionExportInventory;
use App\Models\SupplyItem;
use Illuminate\Http\Request;

class ProductionExportInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $block = ProcessingBlock::where('id',$request->block_size)->first();
        //dd($request->toArray());
        $item = SupplyItem::where('id',$request->item_id)->first();
        $grade = ProcessingGrade::where('id',$request->processing_grade_id)->first();
        //dd($request->toArray());
        $batch_code = null;
        if ($grade) {
            $batch_code = $request->processing_type.'#'.$request->processing_variant.'#'.$request->item_id.'#'.$request->processing_grade_id.'#'.$grade->name.'#'.$item->name;
          // dd('iqf batch');
        }else {
            $batch_code = $request->processing_name.'#'.$request->processing_variant.'#'.$request->item_id.'#'.$block->id.'#'.$request->block_size.'#'.$item->name;
        }
        $inventory = new ProductionExportInventory();
        $inventory->storage_name = $request->storage_name;
        $inventory->processing_name = $request->processing_name;
        $inventory->processing_variant = $request->processing_variant;
        $inventory->item_id = $request->item_id;
        $inventory->batch_code = $batch_code;
        $inventory->processing_grade_id = $request->processing_grade_id;
        $inventory->export_pack_size_id = $request->export_pack_size_id;
        $inventory->transfer_qty_ctn = $request->transfer_qty_ctn;
        $inventory->block_quantity = $request->block_quantity;
        $inventory->fish_grade = $request->fish_grade;
        $inventory->block_size = $request->block_size;
        $inventory->transfer_qty_kg = $request->transfer_qty_kg;
        $inventory->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
