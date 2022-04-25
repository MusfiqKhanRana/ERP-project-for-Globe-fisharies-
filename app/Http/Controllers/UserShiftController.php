<?php

namespace App\Http\Controllers;

use App\Models\UserShift;
use Illuminate\Http\Request;

class UserShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_shifts = UserShift::all();
        return view('backend.employee.user_shift.index',compact('user_shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.employee.user_shift.create');
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
           'name' => 'required|max:191',
        ));
        $user_shift = new UserShift();
        $user_shift->name = $request->name;
        $user_shift->entry_time = $request->entry_time;
        $user_shift->delay_time = $request->delay_time;
        $user_shift->late_time = $request->late_time;
        $user_shift->out_time = $request->out_time;
        $user_shift->over_time = $request->over_time;

        $user_shift->save();

        return redirect()->route('user-shift.index')->withMsg('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserShift  $userShift
     * @return \Illuminate\Http\Response
     */
    public function show(UserShift $userShift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserShift  $userShift
     * @return \Illuminate\Http\Response
     */
    public function edit(UserShift $userShift)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserShift  $userShift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        UserShift::whereId($id)
        ->update([
            'name' => $request->name,
            'entry_time' => $request->entry_time,
            'delay_time' => $request->entry_time,
            'late_time' => $request->entry_time,
            'out_time' => $request->entry_time,
            'over_time' => $request->entry_time,
        ]);
        return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserShift  $userShift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserShift::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
