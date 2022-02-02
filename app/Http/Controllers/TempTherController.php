<?php

namespace App\Http\Controllers;

use App\Models\ColdStorage;
use App\Models\TempTher;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class TempTherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cold_storages = ColdStorage::all();
        $items = TempTher::all();
        return view('backend.production.production-data.temp_thermocouple.index',compact('items','cold_storages'));
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
        $inputs = $request->except('_token');
        $this->validate($request,array(
           'date' => 'required',
           'load_time' => 'required|date_format:H:i',
           'unload_time' => 'required|date_format:H:i',
           'cold_storage_id' => 'required',
           'remark' => 'max:256',
        ));
        $request->provided_item = json_decode($request->provided_item);
        // dd($request->all());
        $request->date=Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d');
        $thermos = new TempTher();
        $thermos->date = $request->date;
        $thermos->load_time = $request->load_time;
        $thermos->unload_time = $request->unload_time;
        $thermos->cold_storage_id = $request->cold_storage_id;
        $thermos->info_temp = serialize($request->provided_item);
        $thermos->remark = $request->remark;
        $thermos->save();

        return redirect()->back()->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TempTher  $tempTher
     * @return \Illuminate\Http\Response
     */
    public function show(TempTher $tempTher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TempTher  $tempTher
     * @return \Illuminate\Http\Response
     */
    public function edit(TempTher $tempTher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempTher  $tempTher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd();
        TempTher::whereId($id)
        ->update([
            //$request->date=\Carbon\Carbon::parse($request->date)->format('Y-m-d'),
            'date' => Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'),
            'load_time' => $request->load_time,
            'unload_time' => $request->unload_time,
            'cold_storage_id' => $request->cold_storage_id,
            'remark' => $request->remark,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TempTher  $tempTher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TempTher::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
