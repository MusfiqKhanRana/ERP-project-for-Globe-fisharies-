<?php

namespace App\Http\Controllers;

use App\Models\ExportPackSize;
use Illuminate\Http\Request;

class ExportPackSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $export_pack = ExportPackSize::all();
        return view('backend.export_management.configuration.export_pack_size.index',compact('export_pack'));
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
        $packs = new ExportPackSize;
        $packs->name = $request->name;
        $packs->weight = $request->weight;
        $packs->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExportPackSize  $exportPackSize
     * @return \Illuminate\Http\Response
     */
    public function show(ExportPackSize $exportPackSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExportPackSize  $exportPackSize
     * @return \Illuminate\Http\Response
     */
    public function edit(ExportPackSize $exportPackSize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExportPackSize  $exportPackSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        ExportPackSize::whereId($id)
        ->update([
            'name' => $request->name,
            'weight' => $request->weight,
        ]);
        return redirect()->back()->withMsg('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExportPackSize  $exportPackSize
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExportPackSize::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
