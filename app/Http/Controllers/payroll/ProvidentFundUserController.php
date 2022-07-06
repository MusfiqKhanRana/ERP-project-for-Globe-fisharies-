<?php

namespace App\Http\Controllers\payroll;

use App\Http\Controllers\Controller;
use App\Models\ProvidentFundUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProvidentFundUserController extends Controller
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
        $data = $request->all();
        $instalment_dates=[];
        $date = Carbon::createFromFormat('Y-m',$data['applied_month']);
        $data['applied_month'] = Carbon::createFromFormat('Y-m',$data['applied_month'])->format('Y-m-1');
        array_push($instalment_dates,$date->format('Y-m-1'));
        for ($i=0; $i < (int)$request->instalment-1; $i++) { 
            array_push($instalment_dates,$date->addMonth(1)->format('Y-m-1'));
        }
        $data['installments'] = serialize($instalment_dates);
        unset($data['instalment']);
        ProvidentFundUser::create($data);
        //dd($data);
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
