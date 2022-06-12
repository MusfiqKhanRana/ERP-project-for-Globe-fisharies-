<?php

namespace App\Http\Controllers\payroll;

use App\Http\Controllers\Controller;
use App\Models\Designation;
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
        $designation = Designation::all();
        $total_days = Carbon::now()->daysInMonth;
        $holiday_count = 0;
        foreach ($this->getMondays() as $holiday)
        {
            $holiday_count+=1;
        }
        // dd($total_days-$holiday_count);
        $working_days = $total_days-$holiday_count;
        return view('backend.payroll.disburse_salary',compact('designation','working_days'));
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
        //
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
        $end_date = Carbon::now()->endOfMonth()->subMonth()->format('Y-m-d 23:59:59');
        $user = User::with([
            'user_shift',
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
