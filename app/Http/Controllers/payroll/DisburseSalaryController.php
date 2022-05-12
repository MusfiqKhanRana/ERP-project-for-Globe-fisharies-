<?php

namespace App\Http\Controllers\payroll;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\User;
use Carbon\Carbon;
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
        return view('backend.payroll.disburse_salary',compact('designation'));
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
        $start_date = Carbon::now()->startOfMonth()->format('Y-m-d 00:00:00');
        $end_date = Carbon::now()->endOfMonth()->format('Y-m-d 23:59:59');
        $user = User::with([
            'attendances' => function($q) use($start_date, $end_date){
                $q->whereBetween('date', [$start_date, $end_date])->select('id','user_id','date');
            },
            'department' => function($q){
                $q->select('id','name');
            },
            'designation' => function($q){
                $q->select('id','deg_name');
            },'increments','loans'
            ])->where('deg_id',$id)->select('id','name','dept_id','deg_id','salary')->get();
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