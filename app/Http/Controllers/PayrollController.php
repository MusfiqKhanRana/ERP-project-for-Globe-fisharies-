<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayrollController extends Controller
{
    public function index()
    {
        $employee = User::all();
        return view('backend.payroll.payroll', compact('employee'));
    }

    public function count(Request $request)
    {
        $form_date = $request->from_date;
        $to_date = $request->to_date;
        $employee_select = $request->employee_select;
        $start = Carbon::parse($form_date);
        $end = Carbon::parse($to_date);
        $jdata['length'] = $start->diffInDays($end);
        $attend = Attendance::whereBetween('date', [$form_date, $to_date])
            ->where('user_id', $employee_select)
            ->get();
        $jdata['count'] = Attendance::where('user_id', $employee_select)->where('status', 1)->count();
        $jdata['holiday'] = Attendance::where('user_id', $employee_select)->where('status', 9)->count();
        $jdata['late'] = Attendance::where('user_id', $employee_select)->where('status', 0)->count();
        $salary= User::where('id', $employee_select)->first();
        $jdata['salary'] = $salary->salary;
        $jdata['sum-attend'] = $jdata['count'] + $jdata['holiday'] + $jdata['late'];
        $jdata['perday_salary'] = $jdata['salary'] / $jdata['length'];
        $jdata['total_salary'] = $jdata['perday_salary'] * $jdata['sum-attend'] ;
        $jdata['output'] = "";

        $jdata['output'] .='<tr>
                                <td> '.$jdata['sum-attend'].' '."Days(With Holiday)".'</td>
                                <td> '.$jdata['late'].' '."Days".' </td>
                                <td> '.number_format($jdata['total_salary'],2).'</td>
                               
                            </tr>';
        if($jdata['count']== 0){

            $jdata['output'] ='Salary Not Found';
            return response()->json($jdata);
        }else{

            return response()->json($jdata);
        }


    }

    public function salarySheet(Request $request)
    {
        $from_date = $request->from_date;
        $to_date  = $request->to_date;
        $start = Carbon::parse($from_date);
        $end = Carbon::parse($to_date);
        $employee = User::all();
        $jdata = [];
        foreach ($employee as $member){
            $jdata['name'] = $member->name;
            $jdata['employee_id'] = $member->employee_id;
            $jdata['mobile'] = $member->phone;
            $jdata['from'] = date('jS M Y', strtotime($start));
            $jdata['to'] = date('jS M Y', strtotime($end));
            $jdata['length'] = $start->diffInDays($end);
            $attend = Attendance::whereBetween('date', [$from_date, $to_date])->where('user_id', $member->id)->get();
            $jdata['count'] = Attendance::where('user_id', $member->id)->where('status', 1)->count();
            $jdata['holiday'] = Attendance::where('user_id', $member->id)->where('status', 9)->count();
            $jdata['late'] = Attendance::where('user_id', $member->id)->where('status', 0)->count();
            $salary = User::where('id', $member->id)->first();
            $jdata['salary'] = $salary->salary;
            $jdata['sum_attend'] = $jdata['count'] + $jdata['holiday'] + $jdata['late'];
            $jdata['perday_salary'] = $jdata['salary'] / $jdata['length'];
            $jdata['total_salary'] = $jdata['perday_salary'] * $jdata['sum_attend'] ;
            $abir[] = $jdata;
        }
        return view('backend.payroll.after-search', compact('abir'));
    }

    public function store(Request $request)
    {

        $this->validate($request, array(
            'employee_id' => 'required',
            'attend' => 'required',
            'salary' => 'required',
            'from_date' => 'required',
            'to_date' => 'required'
        ));

        for($i =0; $i < User::count('id'); $i++)
        {
            $pay = new Payment;
            $pay->employee_id = $request->employee_id[$i];
            $pay->attend      = $request->attend[$i];
            $pay->salary      = $request->salary[$i];
            $pay->from_date    = date('Y-m-d', strtotime($request->from_date[$i]));
            $pay->to_date = date('Y-m-d',strtotime($request->to_date[$i]));
            $pay->save();
        }
        return redirect('admin/payroll/chart')->withMsg("Salary Sheet Saved");
    }

    public function show(Request $request)
    {
        // dd($request->all());
        $employee = User::all();
        $department=Department::all();
        $start_date =  Carbon::now()->startOfMonth()->subMonth()->format('Y-m-1');
        $end_date = Carbon::now()->endOfMonth()->subMonth()->format('Y-m-d');
        $user_id = null;
        if (isset($request->employee_select)) {
            $user_id = $request->employee_select;
            //dd($user_id);
        }
        if (isset($request->from_date)) {
            $start_date =  Carbon::parse($request->from_date)->format('Y-m-1');
            $end_date = Carbon::parse($request->from_date)->endOfMonth()->format('Y-m-d');
            //dd($end_date);
        }
        $payment = Payment::where('salary_month','>=',$start_date)
        ->Where(function($q) use($user_id){
            if ($user_id) {
                $q->where('user_id',$user_id);
            }
        })
        ->with([ 'employee' => function($q) use($start_date, $end_date){
                    $q->with([
                        'attendances' => function($q) use($start_date, $end_date){
                            $q->whereBetween('date', [$start_date, $end_date])->whereIn('status',['Present','Late','Delay'])->select('id','user_id','date');
                        }]);
                    }])
        ->paginate(10);
        //return $payment;
        //dd($payment->toArray());
        // $payment = Payment::with([
        //     'employee' => function($q) use($start_date, $end_date){
        //         $q->with([
        //             'attendances' => function($q) use($start_date, $end_date){
        //                 $q->whereBetween('date', [$start_date, $end_date])->whereIn('status',["Present","Late","Delay"])->select('id','user_id','date');
        //             },
        //             'department' => function($q){
        //                 $q->select('id','name');
        //             },
        //             'designation' => function($q){
        //                 $q->select('id','deg_name');
        //             },'increments','loans'
        //         ])->select('id','name','dept_id','deg_id','salary');
        //     }
        // ])->whereBetween('disburse_date', [$start_date, $end_date])->latest()->get();
        // return $payment;
        return view('backend.payroll.payroll-chart',compact('payment', 'employee','department'));
    }
    public function employee_data_pass(Request $request){
        $data = User::where('dept_id',$request->id)->get();
        return $data;
    }

    public function makePaid(Request $request)
    {
        //dd($request->toArray());
        $update= Payment::where('id',$request->id)->update(['is_paid'=>true,'disburse_date'=>$request->disburse_date]);
    //    dd($update);
        return redirect()->back()->withMsg("Successfully  Updated ");
    }
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->back()->withMsg("Deleted");
    }

    public function individualSalary(Request $request)
    {
        $form_date = $request->from_date;
        $to_date = $request->to_date;
        $employee_select = $request->employee_select;
        $start = Carbon::parse($form_date);
        $end = Carbon::parse($to_date);
        $lenght = $start->diffInDays($end);

        $attend = Payment::where('from_date', $form_date)
            ->where('to_date', $to_date)
            ->get();
        $total_attendense = DB::table("payments")->where('employee_id', $employee_select)
             ->whereBetween('from_date', [$form_date, $to_date])->sum('attend');

        $total_salary = DB::table("payments")->where('employee_id', $employee_select)
            ->whereBetween('from_date', [$form_date, $to_date])->sum('salary');

        $status_paid = DB::table("payments")->where('employee_id', $employee_select)
            ->where('status', 1 )->first();

        $status_pending = DB::table("payments")->where('employee_id', $employee_select)
            ->where('status', 0 )->first();

        return view('backend.payroll.individual-salary', compact('lenght', 'total_attendense',
            'total_salary','employee_select', 'form_date', 'to_date','status_paid','status_pending'));

    }

    public function userIndex()
    {
        $user = Auth::guard('employee')->user()->employee_id;
        $payment = Payment::where('employee_Id', $user)->orderBy('id', 'DESC')->paginate(5);
        return view('users.payment.payment', compact('payment'));
    }

    public function employeePaid($id)
    {
        $payment = Payment::find($id);
        $payment->status = 1;
        $payment->save();
        return back()->withMsg("Payment Successful");
    }
    public function addIncrement(){
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
        //dd( $departments->toArray());
        return view('backend.payroll.add_increment',compact('departments'));
    }
    public function advance_loan(){
        $employee = User::all();
        return view('backend.payroll.advance_loan',compact('employee'));
    }

}
