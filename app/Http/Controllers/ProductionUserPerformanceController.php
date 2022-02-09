<?php

namespace App\Http\Controllers;

use App\Models\ProductionUserPerformance;
use App\Models\SupplyItem;
use App\Models\User;
use Illuminate\Http\Request;

class ProductionUserPerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $items = SupplyItem::get();
        $performances = ProductionUserPerformance::get();
        return view('backend.production.production-data.production_user_performance.index',compact('users','items','performances'));
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
     * @param  \App\Models\ProductionUserPerformance  $productionUserPerformance
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionUserPerformance $productionUserPerformance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionUserPerformance  $productionUserPerformance
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionUserPerformance $productionUserPerformance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionUserPerformance  $productionUserPerformance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionUserPerformance $productionUserPerformance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionUserPerformance  $productionUserPerformance
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionUserPerformance $productionUserPerformance)
    {
        //
    }
}
