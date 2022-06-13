<?php

namespace App\Http\Controllers;

use App\Models\MetalDetectorCheck;
use App\Models\ProductionProcessingUnit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MetalDetectorCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $dates = MetalDetectorCheck::select('id','section','metal_detector','shift','time','ferrous','nonferrous','stainless_steel','poly_bag','monitoring_person','qc_supervisor','verifying_person','remark','date')
        ->orderBy('date', 'DESC')
        ->get()
        ->groupBy('date');
        //dd($metals->toArray());
        return view('backend.production.production-data.metal_detector.index',compact('dates','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.production.production-data.metal_detector.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ProductionProcessingUnit::where('id',$request->production_processing_unit_id)
        // ->update(
        //     ['store_in_status'=>'MD_checked']
        // );
        $inputs = $request->except('_token');
        $this->validate($request,array(
            'section' => 'required',
            'monitoring_person' => 'required',
            'qc_supervisor' => 'required',
            'verifying_person' => 'required',
            'remark' => 'max:256',
        ));
        $request->provided_item = json_decode($request->provided_item);
        $request->date=Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');
        // dd($request->all());
        $metal = new MetalDetectorCheck();
        $metal->production_processing_unit_id = $request->production_processing_unit_id;
        $metal->date = $request->date;
        $metal->section = $request->section;
        $metal->metal_detector = $request->metal_detector;
        $metal->shift =  $request->shift;
        $metal->time = $request->time;
        $metal->ferrous = $request->ferrous;
        $metal->nonferrous = $request->nonferrous;
        $metal->stainless_steel = $request->stainless_steel;
        $metal->poly_bag = serialize($request->provided_item);
        $metal->monitoring_person = $request->monitoring_person;
        $metal->qc_supervisor = $request->qc_supervisor;
        $metal->verifying_person = $request->verifying_person;
        $metal->remark = $request->remark;
        $metal->save();

        return redirect()->back()->withmsg('Successfully MD Checked');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MetalDetectorCheck  $metalDetectorCheck
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // dd($id);
        // $production_processing_unit_id = $id;
        return view('backend.production.production-data.metal_detector.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MetalDetectorCheck  $metalDetectorCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(MetalDetectorCheck $metalDetectorCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MetalDetectorCheck  $metalDetectorCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetalDetectorCheck $metalDetectorCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MetalDetectorCheck  $metalDetectorCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MetalDetectorCheck::find($id)->delete($id);
        return redirect()->back()->withmsg('Successfully Deleted');
    }
}
