<?php

namespace App\Http\Controllers;

use App\Models\ColdStorage;
use App\Models\TempMonitoring;
use Illuminate\Http\Request;
use DataTables;
use Log;

class TempMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cold_storage=ColdStorage::all();
        return view('backend.Storage_temp_monitoring.index', compact('cold_storage'));
    }
    public function TempMonitoringList(Request $request)
    {
        if ($request->ajax()) {
            $temp_monitoring = TempMonitoring::with('coldstorage')->latest();
            return Datatables::of($temp_monitoring)
                ->addIndexColumn()
                ->editColumn('storage_name', function($data)
                {
                    return $data->coldstorage->name;
                })
                ->addColumn('action', function($row){
                    $actionBtn = '<button data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'" data-cold_storage_id="'.$row->cold_storage_id.'" data-coldstorage_name="'.$row->coldstorage->name.'" data-temp_c_ddt="'.$row->temp_c_ddt.'" data-temp_c_dts="'.$row->temp_c_dts.'" data-master_carton_no="'.$row->master_carton_no.'" data-commodity_count="'.$row->commodity_count.'" data-date_of_production="'.$row->date_of_production.'" data-block_core_temp="'.$row->block_core_temp.'" data-remarks="'.$row->remarks.'" class="edit btn btn-success btn-sm edit_temp">Edit</button> <button  data-toggle="modal" data-target="#deleteModal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm delete_temp">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
            
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TempMonitoring  $tempMonitoring
     * @return \Illuminate\Http\Response
     */
    public function show(TempMonitoring $tempMonitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TempMonitoring  $tempMonitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(TempMonitoring $tempMonitoring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TempMonitoring  $tempMonitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // return $request->post();
        $input = $request->all();
        // return $input;
        $TempMonitoring = TempMonitoring::where('id',$id)->update(['cold_storage_id'=> $input['cold_storage_id'],'temp_c_ddt'=>$input['temp_c_ddt'],'temp_c_dts'=>$input['temp_c_dts'],'master_carton_no'=>$input['master_carton_no'],'commodity_count'=>$input['commodity_count'],'date_of_production'=>$input['date_of_production'],'block_core_temp'=>$input['block_core_temp'],'remarks'=>$input['remarks']]);
        // TempMonitoring::where('id',)
     
        // return redirect()->back()->withmsg('Successfully Updated');
        return response()->json("successfully updated", 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TempMonitoring  $tempMonitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TempMonitoring::find($id)->delete($id);
        return response()->json("successfully deleted", 200);
    }
}
