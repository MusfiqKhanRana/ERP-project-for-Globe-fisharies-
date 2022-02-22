<?php

namespace App\Http\Controllers;

use App\Models\RoPlant;
use App\Models\RoPlantReport;
use Illuminate\Http\Request;

class RoPlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ro_plants = RoPlant::with('reports')->latest()->paginate(4);
        // dd($ro_plants->toArray());
        return view('backend.production.production-data.ro-plant.index',compact('ro_plants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.production.production-data.ro-plant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $ro_plant= RoPlant::create(['date'=>$request->date,'shift'=>$request->shift]);
        foreach (json_decode($request->reports) as $key => $value){
            $ro_plants_id = $ro_plant->id;
            // dd($value);
            RoPlantReport::create(['ro_plants_id'=>$ro_plants_id,'start_tym'=>$value->start_tym,'stop_tym'=>$value->stop_tym,'t_time'=>$value->t_time,'rwst_cl_d'=>$value->rwst_cl_d,'rwst_cl_c'=>$value->rwst_cl_c,'p_inlet1'=>$value->p_inlet1,'p_outlet1'=>$value->p_outlet1,'cl_check1'=>$value->cl_check1,'p_inlet2'=>$value->p_inlet2,'p_outlet2'=>$value->p_outlet2,'cl_check2'=>$value->cl_check2,'p_inlet3'=>$value->p_inlet3,'p_outlet3'=>$value->p_outlet3,'cl_check3'=>$value->cl_check3,'p_inlet_bar'=>$value->p_inlet_bar,'dds_point'=>$value->dds_point,'p_of_da'=>$value->p_of_da,'cds_point'=>$value->cds_point,'p_of_cs'=>$value->p_of_cs,'ph'=>$value->ph,'conductance'=>$value->conductance,'tds'=>$value->tds,'chloride'=>$value->chloride,'pwf'=>$value->pwf,'dwf'=>$value->dwf]);
        }
        return redirect()->back()->withmsg('Successfully Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoPlant  $roPlant
     * @return \Illuminate\Http\Response
     */
    public function show(RoPlant $roPlant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoPlant  $roPlant
     * @return \Illuminate\Http\Response
     */
    public function edit(RoPlant $roPlant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoPlant  $roPlant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoPlant $roPlant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoPlant  $roPlant
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoPlant $roPlant)
    {
        //
    }
}
