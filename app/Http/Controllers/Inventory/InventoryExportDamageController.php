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
        $batch_code = null;
        if ($grade) {
            $batch_code = $request->processing_type.'#'.$request->processing_variant.'#'.$request->item_id.'#'.$request->processing_grade_id.'#'.$grade->name;
          // dd('iqf batch');
        }else {
             
            $request->processing_type.'#'.$request->processing_variant.'#'.$request->item_id.'#'.$request->block_size.'#'.$request->fish_grade;
        }
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
        $damage->block_size = $request->block_size;
        $damage->block_quantity = $request->block_quantity;
        $damage->fish_grade = $request->fish_grade;
        $damage->damage_form = $request->damage_form;
        $damage->batch_code = $batch_code;
        $damage->save();

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
