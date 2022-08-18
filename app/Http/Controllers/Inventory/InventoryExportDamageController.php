<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\InventoryExportDamage;
use App\Models\ProcessingGrade;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class InventoryExportDamageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = ProcessingGrade::where('id',$request->processing_grade_id)->first();
        //dd($request->toArray());
        $damage = new InventoryExportDamage();
        $damage->processing_type = $request->processing_type;
        $damage->processing_variant = $request->processing_variant;
        $damage->item_id = $request->item_id;
        $damage->processing_grade_id = $request->processing_grade_id;
        $damage->damage_quantity = $request->damage_quantity;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/export/damage/'. $filename;
            Image::make($image)->save($location);
            $damage->image =  $filename;
        }
        $damage->remark = $request->remark;
        $damage->damage_form = $request->damage_form;
        $damage->batch_code = $request->processing_type.'#'.$request->processing_variant.'#'.$request->item_id.'#'.$request->processing_grade_id.'#'.$grade->name;
        $damage->save();

        return redirect()->back()->withMsg('Successfully Created');
   
    }

    public function DamageBulkStore(Request $request)
    {
       // dd($request->toArray);
        $grade = ProcessingGrade::where('id',$request->processing_grade_id)->first();
        // dd($grade->name);
        $bulk = new InventoryExportDamage();
        $bulk->processing_type = $request->processing_type;
        $bulk->processing_variant = $request->processing_variant;
        $bulk->item_id = $request->item_id;
        $bulk->batch_code = $request->processing_type.'#'.$request->processing_variant.'#'.$request->item_id.'#'.$request->processing_grade_id.'#'.$grade->name;
        $bulk->processing_grade_id = $request->processing_grade_id;
        $bulk->damage_quantity = $request->damage_quantity;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/export/damage/'. $filename;
            Image::make($image)->save($location);
            $bulk->image =  $filename;
        }
        $bulk->remark = $request->remark;
        $bulk->damage_form = $request->damage_form;
        $bulk->save();

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
