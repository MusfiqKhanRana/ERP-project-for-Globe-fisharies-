<?php

namespace App\Http\Controllers;

use App\Models\ExportPackSize;
use App\Models\ProcessingBlock;
use App\Models\ProcessingBlockSize;
use App\Models\ProcessingGrade;
use Illuminate\Http\Request;

class ProcessingGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $export_pack = ExportPackSize::all();
        $p_grade = ProcessingGrade::all();
        $p_block = ProcessingBlock::all();
        $p_block_size = ProcessingBlockSize::all();
        return view('backend.production.configuration.processing_grade.index',compact('p_grade','p_block','p_block_size','export_pack'));
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
        ProcessingGrade::create(['name'=>$request->name]);
        return redirect()->back()->withmsg('Successfully Created Grade');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessingGrade  $processingGrade
     * @return \Illuminate\Http\Response
     */
    public function show(ProcessingGrade $processingGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessingGrade  $processingGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcessingGrade $processingGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessingGrade  $processingGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
        ProcessingGrade::whereId($id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessingGrade  $processingGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProcessingGrade::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
