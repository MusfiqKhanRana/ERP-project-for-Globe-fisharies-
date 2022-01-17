<?php

namespace App\Http\Controllers;

use App\Models\ColdStorage;
use App\Models\TempMonitoring;
use Illuminate\Http\Request;
use DataTables;

class TempMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.Storage_temp_monitoring.index');
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
                    $actionBtn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
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
    public function update(Request $request, TempMonitoring $tempMonitoring)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TempMonitoring  $tempMonitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempMonitoring $tempMonitoring)
    {
        //
    }
}
