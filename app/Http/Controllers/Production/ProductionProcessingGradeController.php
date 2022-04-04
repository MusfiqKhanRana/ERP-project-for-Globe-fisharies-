<?php

namespace App\Http\Controllers\Production;

use App\Http\Controllers\Controller;
use App\Models\ProductionProcessingGrade;
use Illuminate\Http\Request;

class ProductionProcessingGradeController extends Controller
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
       dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionProcessingGrade  $productionProcessingGrade
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionProcessingGrade $productionProcessingGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionProcessingGrade  $productionProcessingGrade
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionProcessingGrade $productionProcessingGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionProcessingGrade  $productionProcessingGrade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductionProcessingGrade $productionProcessingGrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionProcessingGrade  $productionProcessingGrade
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionProcessingGrade $productionProcessingGrade)
    {
        //
    }
}
