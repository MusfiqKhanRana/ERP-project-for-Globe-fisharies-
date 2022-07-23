<?php

namespace App\Http\Controllers\payroll;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Increment;
use Illuminate\Http\Request;

class IncrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::with(
            [
                'designation'=>function($q){
                    $q->with([
                        'employee'=>function($q){
                            $q->with(['increments'])->select('id','name','deg_id','basic','medical_allowance','house_rent');
                        }
                    ]);
                }
            ]
        )->get();
        $increments = Increment::get();
        //return($departments->toArray());
        return view('backend.payroll.add_increment',compact('increments','departments'));
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
        $inputs = $request->except('_token');
        $this->validate($request,array(
           'user_id' => 'required|max:191',
        ));
        $increments = new Increment();
        $increments->department_id = $request->department_id;
        $increments->designation_id = $request->designation_id;
        $increments->user_id = $request->user_id;
        $increments->date = $request->date;
        $increments->type = $request->type;
        $increments->increment_amount = $request->increment_amount;
        $increments->save();

        return redirect()->route('increment.index')->withMsg('Successfully Created');
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
       // dd($request->all());
        Increment::whereId($id)
        ->update([
            'type' => $request->type,
            'increment_amount' => $request->increment_amount,
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
        Increment::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
