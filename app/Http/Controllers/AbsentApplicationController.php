<?php

namespace App\Http\Controllers;

use App\Models\AbsentApplication;
use App\Models\Attendance;
use App\Models\AttendanceAbsentApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsentApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absent_applications = AbsentApplication::with([
            'attendances',
            'user'=>function($q){
                $q->select('id','name','email');
            }
        ])->latest()->paginate(10);
        // dd($absent_applications->toArray());
        return view('backend.hr_management.applications.absent_application.index',compact('absent_applications'));
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
        $data['attendance_id'] = explode(",",$data['attendance_id']);

        if($request->hasfile('attachment'))
        {
            $name = time().'.'.$request->attachment->extension();
            $request->attachment->move(base_path() . '/storage/app/public/absent-application', $name);
            $data['attachment'] = $name;
        }
        $absent_application = AbsentApplication::create(['user_id'=>Auth::user()->id,"application_note"=>$request->application_note,'type'=>$request->type,'attachment'=>$data['attachment']]);
        foreach ($data['attendance_id'] as $key => $absents) {
            AttendanceAbsentApplication::create(['attendance_id'=>$absents,'absent_application_id'=>$absent_application->id]);
            Attendance::find($absents)->update(['status'=>'Application Applied']);
        }
        return back()->withMsg("Applied Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AbsentApplication  $absentApplication
     * @return \Illuminate\Http\Response
     */
    public function show(AbsentApplication $absentApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AbsentApplication  $absentApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(AbsentApplication $absentApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AbsentApplication  $absentApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbsentApplication $absentApplication)
    {
        //
    }
    public function changeStatus(Request $request)
    {
        $application = json_decode($request->application);
        $status = $request->status;
        // dd($application,$status);
        if ($status) {
            AbsentApplication::find($application['id'])->update(['accepted'=>$status]);
            if ($application['attendances']) {
                foreach ($application['attendances'] as $key => $attendance) {
                    Attendance::find($attendance['id'])->update(['status'=>$application['type']]);
                }
            }
        }else {
            AbsentApplication::find($application['id'])->update(['accepted'=>$status]);
            if ($application['attendances']) {
                foreach ($application['attendances'] as $key => $attendance) {
                    Attendance::find($attendance['id'])->update(['status'=>"Absent Application Denied"]);
                }
            }
        }
        return response(["status"=>"success"],200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AbsentApplication  $absentApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbsentApplication $absentApplication)
    {
        //
    }
}
