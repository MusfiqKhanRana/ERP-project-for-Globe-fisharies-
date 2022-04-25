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
        $attendanceShowCases = AttendanceShowCause::with([
            'employee'=>function($q){
                $q->select('id','name');
            },'attendance'
            ])->where('accepted' ,'=', null)->latest()->paginate(10);
        // dd($attendanceShowCases);
        return view('backend.hr_management.applications.late_applications.index',compact('attendanceShowCases'));
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
        AttendanceShowCause::create(['user_id'=>Auth::user()->id,'attendance_id'=>$request->attendance_id,'showcase_note'=>$request->application_note,'type'=>$request->type]);
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

    public function changeStatus(Request $request)
    {
        // return $request->all();
        $application = json_decode($request->application,true);
        $status = json_decode($request->status,true);
        if ($status) {
            AttendanceShowCause::find($application['id'])->update(['accepted'=>$status]);
            if ($application['attendance']) {
                Attendance::find($application['attendance']['id'])->update(['status'=>'Late Application Accepted']);
            }
        }else {
            AttendanceShowCause::find($application['id'])->update(['accepted'=>$status]);
            if ($application['attendance']) {
                Attendance::find($application['attendance']['id'])->update(['status'=>"Late Application Denied"]);
            }
        }
        return back()->withMsg("Applied Successfully");
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
