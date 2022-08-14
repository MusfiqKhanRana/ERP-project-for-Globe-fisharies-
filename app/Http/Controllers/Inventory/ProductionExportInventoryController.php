<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\ProcessingGrade;
use App\Models\ProductionExportInventory;
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
        //dd($request->toArray);
        $grade = ProcessingGrade::where('id',$request->processing_grade_id)->first();
        // dd($grade->name);
        $inventory = new ProductionExportInventory();
        $inventory->storage_name = $request->storage_name;
        $inventory->processing_name = $request->processing_name;
        $inventory->processing_variant = $request->processing_variant;
        $inventory->item_id = $request->item_id;
        $inventory->batch_code = $request->processing_name.'.'.$request->processing_variant.'.'.$request->item_id.'.'.$request->processing_grade_id.'.'.$grade->name;
        $inventory->processing_grade_id = $request->processing_grade_id;
        $inventory->export_pack_size_id = $request->export_pack_size_id;
        $inventory->transfer_qty_ctn = $request->transfer_qty_ctn;
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
