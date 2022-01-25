<?php

namespace App\Http\Controllers;

use App\Models\ProductionTest;
use Illuminate\Http\Request;

class ProductionTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $p_tests = ProductionTest::all();
        return view('backend.production.production-data.production-test.index', compact('p_tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.production.production-data.production-test.create');
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
            'date' => 'date',
            'description' => 'required',
            'replace_record' => 'required',
            'remark' => 'required',
            'bayer' => 'required',
            'manager' => 'required',
        ));
        $p_tests = new ProductionTest();
        $p_tests->date = $request->date;
        $p_tests->description = $request->description;
        $p_tests->replace_record = $request->replace_record;
        $p_tests->remark = $request->remark;
        $p_tests->frozen = $request->frozen;
        $p_tests->bayer = $request->bayer;
        $p_tests->manager = $request->manager;
        $p_tests->save();

        return redirect()->route('production_test.index')->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductionTest  $productionTest
     * @return \Illuminate\Http\Response
     */
    public function show(ProductionTest $productionTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductionTest  $productionTest
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductionTest $productionTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductionTest  $productionTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ProductionTest::whereId($id)
        ->update([
            'date' => $request->date,
            'remark' => $request->remark,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductionTest  $productionTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductionTest $productionTest)
    {
        //
    }
}
