<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\AttendanceShowCause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceShowCauseController extends Controller
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
        // dd($request->all());
        AttendanceShowCause::create(['user_id'=>Auth::user()->id,'attendance_id'=>$request->attendance_id,'showcase_note'=>$request->showcase_note]);
        Attendance::find($request->attendance_id)->update(['status'=>'Application Applied']);
        return back()->withMsg("Applied Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceShowCause  $attendanceShowCause
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceShowCause $attendanceShowCause)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceShowCause  $attendanceShowCause
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceShowCause $attendanceShowCause)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttendanceShowCause  $attendanceShowCause
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceShowCause $attendanceShowCause)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceShowCause  $attendanceShowCause
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceShowCause $attendanceShowCause)
    {
        //
    }
}
