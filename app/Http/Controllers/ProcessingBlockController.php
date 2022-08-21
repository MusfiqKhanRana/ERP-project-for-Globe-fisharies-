<?php

namespace App\Http\Controllers;

use App\Models\ProcessingBlock;
use Illuminate\Http\Request;

class ProcessingBlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_block = ProcessingBlock::all();
        return view('backend.production.configuration.processing_block.index',compact('p_block'));
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
        ProcessingBlock::create(['block_size'=>$request->block_size]);
        return redirect()->back()->withmsg('Successfully Created Grade');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessingBlock  $processingBlock
     * @return \Illuminate\Http\Response
     */
    public function show(ProcessingBlock $processingBlock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessingBlock  $processingBlock
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcessingBlock $processingBlock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessingBlock  $processingBlock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        ProcessingBlock::whereId($id)
        ->update([
            'block_size' => $request->block_size,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessingBlock  $processingBlock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProcessingBlock::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
