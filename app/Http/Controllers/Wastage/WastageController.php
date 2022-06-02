<?php

namespace App\Http\Controllers\Wastage;

use App\Http\Controllers\Controller;
use App\Models\ProductionProcessingUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WastageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start_date = Carbon::now()->startOfWeek()->format('Y-m-d 00:00:00');
        $end_date = Carbon::now()->endOfWeek()->format('Y-m-d 23:59:59');
        $wastages = ProductionProcessingUnit::whereBetween('RandW_datetime',[$start_date,$end_date])->select('id','wastage_quantity','RandW_datetime')->get()->groupBy(function($item){
            return Carbon::createFromFormat('Y-m-d H:i:s', $item->RandW_datetime)->format('Y-m-d');
        });
       //dd( $wastages->toArray());
        return view('backend.raw_product_wastage.index',compact('wastages'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('backend.raw_product_wastage.release');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
