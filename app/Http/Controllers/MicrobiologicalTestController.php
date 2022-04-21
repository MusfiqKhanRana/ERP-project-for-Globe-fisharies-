<?php

namespace App\Http\Controllers;

use App\Models\ColdStorage;
use App\Models\MicrobiologicalTest;
use App\Models\ProductionProcessingUnit;
use Illuminate\Http\Request;

class MicrobiologicalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = MicrobiologicalTest::all();
        return view('backend.microbiological_test_report.report',compact('reports'));
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
        // dd($request);
        ProductionProcessingUnit::where('id',$request->production_processing_unit_id)
        ->update(
            ['store_in_status'=>'QC_checked']
        );
        $create = MicrobiologicalTest::create($request->all());
        return redirect()->route('inventory.store_in')->withmsg('Successfully QC Checked');
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
        $coldstorage = ColdStorage::all();
        $report = MicrobiologicalTest::with('coldstorage')->where('id',$id)->first();
        // return $report;
        return view('backend.microbiological_test_report.report_edit',compact('report','coldstorage'));
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
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $update = MicrobiologicalTest::where('id',$id)->update($data);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MicrobiologicalTest::find($id)->delete($id);
        return redirect()->back()->withMsg("Successfully Deleted");
    }
    public function report_genarate($id)
    {
        $production_processing_unit_id = $id;
        // dd($production_processing_unit_id);
        $coldstorage = ColdStorage::all();
        return view('backend.microbiological_test_report.genarate_report',compact('coldstorage','production_processing_unit_id'));
    }
    public function report_details($id){
        $report = MicrobiologicalTest::with('coldstorage')->where('id',$id)->first();
        // return $report;
        return view('backend.microbiological_test_report.report_details',compact('report'));
    }
}
