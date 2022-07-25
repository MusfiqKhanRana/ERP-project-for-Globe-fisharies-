<?php

namespace App\Http\Controllers\payroll;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;

class DisburseSalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with(['designation'])->get();
        $designations = Designation::all();
        $total_days = Carbon::now()->daysInMonth;
        $holiday_count = 0;
        foreach ($this->getMondays() as $holiday)
        {
            $holiday_count+=1;
        }
        // dd($total_days-$holiday_count);
        $working_days = $total_days-$holiday_count;
        return view('backend.payroll.disburse_salary',compact('designations','working_days','departments'));
    }
    public function getMondays()
    {
        return new \DatePeriod(
            Carbon::parse("first friday of this month"),
            CarbonInterval::week(),
            Carbon::parse("first friday of next month")
        );
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
        $users = json_decode($request->users);
        $data = $request->all();
        $is_paid = ($data['status'] == "paid") ? 1 : 0;
        foreach ($users as $key => $user) {
            // dd($user,$data,$user->id);
            Payment::create(['user_id'=>$user->id,'gross_salary'=>$user->gross_salary,'overtime_payment'=>$user->overtime,
                            'absent_fine'=>$user->absent_fine,'late_fine'=>$user->late_fine,'advance_salary_payment'=>$user->advance_salary,
                            'loan_installment_payment'=>$user->installment_amount,'provident_fund'=>$user->provident_fund,'net_payment'=>$user->net_payment,
                            'disburse_date'=>$data['disbursement_date'],'salary_month'=>Carbon::now()->subMonth()->format('Y-m-01'),
                            'is_paid'=>$is_paid]);
        }
        return back()->withMsg("Payment Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $start_date = Carbon::now()->startOfMonth()->subMonth()->format('Y-m-d 00:00:00');
        $salary_date = Carbon::now()->startOfMonth()->subMonth()->format('Y-m-01');
        $end_date = Carbon::now()->endOfMonth()->subMonth()->format('Y-m-d 23:59:59');
        $user = User::with([
            'user_shift',
            'payments' => function($q) use($salary_date) {
                $q->where('salary_month',$salary_date)->select('id','user_id','salary_month');
            },
            'attendances' => function($q) use($start_date, $end_date){
                $q->whereBetween('date', [$start_date, $end_date])->select('id','user_id','date','in_time','out_time','status');
            },
            'department' => function($q){
                $q->select('id','name');
            },
            'designation' => function($q){
                $q->select('id','deg_name');
            },
            'bonus' => function($q){
                $q->select('id','amount','user_id');
            },
            'provident_fund_users'=>function($q){
                $q->with(['provident_fund'])
                ->whereIn('status',['Initial','ongoing'])
                ->where('applied_month','>=',Carbon::now()->format('Y-m-1'))
                ->where('applied_month','<=',Carbon::now()->format('Y-m-1'));
            },
            'increments'=>function($q){
                // $q->sum('increment_amount');
            }
            ,'loans'=>function($q){
                $q->where('type','advance')->where('period',Carbon::now()->startOfMonth()->format('Y-m-d'));
            },'loan_installments'=>function($q){
                $q->with(['office_loan'])->where('isPaid',false)->where('date',Carbon::now()->startOfMonth()->format('Y-m-d'));
            }
            ])->where('deg_id',$id)->select('id','name','dept_id','deg_id','basic','medical_allowance','house_rent','isOvertime','overtime_type','overtime_amount','user_shift_id')->get();
        return $user;
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
