<?php

namespace App\Http\Controllers;

use App\Models\ProcessingBlockSize;
use Illuminate\Http\Request;

class ProcessingBlockSizeController extends Controller
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
        ProcessingBlockSize::create(['size'=>$request->size]);
        return redirect()->back()->withmsg('Successfully Created Grade');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProcessingBlockSize  $processingBlockSize
     * @return \Illuminate\Http\Response
     */
    public function show(ProcessingBlockSize $processingBlockSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProcessingBlockSize  $processingBlockSize
     * @return \Illuminate\Http\Response
     */
    public function edit(ProcessingBlockSize $processingBlockSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProcessingBlockSize  $processingBlockSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($request);
        ProcessingBlockSize::whereId($id)
        ->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProcessingBlockSize  $processingBlockSize
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProcessingBlockSize::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
