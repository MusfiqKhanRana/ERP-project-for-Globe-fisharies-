<?php

namespace App\Http\Controllers\payroll;

use App\Http\Controllers\Controller;
use App\Models\ProvidentFund;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProvidentFundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provi_fund = ProvidentFund::with(['provident_fund_users'=>function($q){
            $q->select('id','user_id','provident_fund_id','status');
        }])->get();
        $users = User::all();
        return view('backend.payroll.provident_fund',compact('provi_fund','users'));
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
        $id = Crypt::decrypt($id);
        $provident_fund = ProvidentFund::with('provident_fund_users')->where('id',$id)->first();
        return view('backend.payroll.provident-fund-show',compact('provident_fund'));
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
