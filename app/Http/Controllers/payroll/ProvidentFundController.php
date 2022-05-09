<?php

namespace App\Http\Controllers\Payroll;

use App\Http\Controllers\Controller;
use App\Models\ProvidentFund;
use Illuminate\Http\Request;

class ProvidentFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provi_fund = ProvidentFund::all();
        return view('backend.payroll.provident_fund',compact('provi_fund'));
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
           'package' => 'required',
           'fund_duration' => 'required',
           'fund_detention' => 'required',
           'amount' => 'required',
           'detention_amount' => 'required',
           'completion_bonus' => 'required',
        ));

        $fund = new ProvidentFund();
        $fund->package = $request->package;
        $fund->amount = $request->amount;
        $fund->fund_duration = $request->fund_duration;
        $fund->fund_detention = $request->fund_detention;
        $fund->detention_amount = $request->detention_amount;
        $fund->completion_bonus = $request->completion_bonus;
        $fund->save();

        return redirect()->route('provident-fund.index')->withMsg('Successfully Created');
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
        ProvidentFund::whereId($id)
        ->update([
            'package' => $request->package,
            'amount' => $request->amount,
            'fund_duration' => $request->fund_duration,
            'fund_detention' => $request->fund_detention,
            'detention_amount' => $request->detention_amount,
            'completion_bonus' => $request->completion_bonus,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProvidentFund::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
