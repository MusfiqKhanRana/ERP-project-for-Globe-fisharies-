<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use App\Models\Holiday;
use App\Models\Timezone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

date_default_timezone_set(TimeZoneManual());


class AttendanceController extends Controller
{

    public function index()
    {
        // dd("got this");
        $departments = Department::with(
            [
                'designation'=>function($q){
                    $q->with([
                        'employee'=>function($q){
                            $q->select('id','name','deg_id');
                        }
                    ]);
                }
            ]
        )->get();
        $start_date=Carbon::now()->format('Y-m-d 00:00:00');
        $end_date=Carbon::now()->format('Y-m-d 11:59:59');
        if (\request('date_from') && \request('date_to')){
            $start_date=Carbon::parse(\request('date_from'))->format('Y-m-d 00:00:00');
            $end_date=Carbon::parse(\request('date_to'))->format('Y-m-d 11:59:59');
        }
        $attendances = Attendance::with([
            'employee'=>function($q){
                $q->with(['designation','department'])->select('id','name','employee_id','dept_id','deg_id','email');
            }
            ])->whereHas(
            'employee',function($q){
                $q->where(function($q){
                    if (\request('user_id')) {
                        $q->where('id',\request('user_id'));
                    }
                })
                ->where(function($q){
                    if (\request('department')) {
                        $q->where('dept_id',\request('department'));
                    }
                })
                ->where(function($q){
                    if (\request('designation')) {
                        $q->where('deg_id',\request('designation'));
                    }
                });
            })->where('date','>=',$start_date)->where('date','<=',$end_date)
            ->where(function($q){
                if (\request('status')) {
                    $q->where('status',\request('status'));
                }
            })
            ->orderBy('id', 'DESC')->get();
            //dd($attendances);
        return view('backend.hr_management.attendance.create', compact('departments','attendances'));
    }

    public function countIndex()
    {
        return view('backend.attendance-count.attend_count');
    }

    public function create()
    {
        $auth_employee = Auth::user();
        return view('users.attendance.attendance', compact('auth_employee'));
    }

    public function store(Request $request)
    {
        $this->validate($request,array(
            'date' => 'required',
            'employee_id' => 'required',
            'status' =>'required'
        ));

        $attendance = new Attendance;
        $attendance->date = $request->date;
        $attendance->employee_id = $request->employee_id;
        $attendance->status = $request->status;
        $attendance->ip = $request->ip;
        $attendance->shift = $request->shift;
        $attendance->device = $request->device;
        $attendance->save();
        return redirect()->back()->withMsg("Attendance Successful");
    }

    public function individualIndex()
    {
        $employee = User::all();
        return view('backend.attendance-count.individual-attend', compact('employee'));

    }

    public function individualAttend(Request $request)
    {
        $form_date = $request->from_date;
        $to_date = $request->to_date;
        $employee_select = $request->employee_select;

        $start = Carbon::parse($form_date);
        $end = Carbon::parse($to_date);

        $jdata['length'] = $start->diffInDays($end);


        $attend = Attendance::whereBetween('date', [$form_date, $to_date])
            ->where('employee_id', $employee_select)
            ->get();

        $jdata['count'] = Attendance::where('employee_id', $employee_select)->where('status', 1)->count();

        $jdata['output'] = "";

        foreach ($attend as $data):

            if ($data->status == 1 ){
                 $upostthit = '<span class="label label-sm label-success">Attend</span>';
            }elseif ($data->status == 9 ){
                 $upostthit = '<span class="label label-sm label-info">AUTOMATED</span>';
            }else {
             $upostthit = '<span class="label label-sm label-danger">Late</span>';
            }

            $jdata['output'] .='<tr>
                        <td> '.date('M j', strtotime($data->date)).' </td>
                        <td> '.$upostthit.'</td>
                    </tr>';
        endforeach;

        return response()->json($jdata);
    }

    public function destroy($id)
    {

    }

    public function attendanceApprove($id){

        $att = Attendance::find($id);
        $att->status = 1;
        $att->save();
        return back();

    }

    public function ManualAttendance(Request $request, $id){
        $attendance = Attendance::where('id',$id)->update(['out_time'=>$request->out_time,'in_time'=>$request->in_time]);
        //dd($attendance);
        //$request->date=Carbon::createFromFormat('Y-m-d', $request->date)->format('Y-m-d');
        //$attendance = Attendance::create(['date'=>$request->date,'user_id'=>$request->user_id,'in_time'=>$request->in_time,'status'=>$request->status]);
        //$attendance = new Attendance();
        // $attendance->date = $request->date;
        // $attendance->user_id = $request->user_id;
        //$attendance->in_time = $request->in_time;
        //$attendance->out_time = $request->out_time;
        //$attendance->save();
        //dd($attendance);
        return redirect()->back()->withMsg('Successfully Updated');
    }
}
