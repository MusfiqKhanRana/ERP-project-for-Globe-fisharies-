<?php

namespace App\Http\Controllers\payroll;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\User;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bonus = Bonus::all();
        $users = User::all();
        return view('backend.payroll.bonus_index',compact('bonus','users'));
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
        $data = $request->except('_token');
        //dd($data);
        $bonuses = new Bonus();
        $bonuses ['bonus_code'] = random_int(100000, 999999);
        $bonuses->date = $request->date;
        $bonuses->user_id = $request->user_id;
        $bonuses->amount = $request->amount;
        $bonuses->bonus_category = $request->bonus_category;
        $bonuses->remark = $request->remark;
        $bonuses->save();

        return redirect()->back()->withMsg('Successfully Created');
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
        Bonus::whereId($id)
        ->update([
            'date' => $request->date,
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'bonus_category' => $request->bonus_category,
            'remark' => $request->remark,
           
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
        Bonus::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
