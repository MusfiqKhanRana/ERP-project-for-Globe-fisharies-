<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\TiffinBill;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TiffinBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        $designation = Designation::all();
        $employee = User::all();
        $items = TiffinBill::with('user')->get();
        //dd($items->toArray());
        return view('backend.employee.tiffin.index',compact('items','designation','employee','departments'));
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
        // $this->validate($request,array(
        //    'date' => 'required',
        //    'days' => 'required',
        //    'rate' => 'required',
        // ));
        $request->date=Carbon::createFromFormat('M-Y', $request->date)->format('Y-m-d');
        $tiffin_bill = new TiffinBill();
        $tiffin_bill->date = $request->date;
        $tiffin_bill->employee_id = $request->employee_id;
        $tiffin_bill->days = $request->days;
        $tiffin_bill->rate = $request->rate;
        $tiffin_bill->department_id = $request->department_id;
        $tiffin_bill->designation_id = $request->designation_id;
        $tiffin_bill->category = $request->category;
        $tiffin_bill->total = $request->total;
        $tiffin_bill->remark = $request->remark;
        $tiffin_bill->save();

        return redirect()->route('tiffin-bill.index')->withMsg('Successfully Created');
    }

    public function BillPaid(Request $request)
    {
        //dd($request->toArray());
        $update= TiffinBill::where('id',$request->id)->update(['is_paid'=>true,'paid_date'=>$request->paid_date]);
    //    dd($update);
        return redirect()->back()->withMsg("Successfully  Updated ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TiffinBill  $tiffinBill
     * @return \Illuminate\Http\Response
     */
    public function show(TiffinBill $tiffinBill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TiffinBill  $tiffinBill
     * @return \Illuminate\Http\Response
     */
    public function edit(TiffinBill $tiffinBill)
    {
        
    }
    public function editBill($id)
    {
        $bill_edit = TiffinBill::find($id);
        //dd($bill_edit->toArray());
        return view('backend.employee.tiffin.edit',compact('bill_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TiffinBill  $tiffinBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        TiffinBill::whereId($id)
        ->update([
            'date' => Carbon::createFromFormat('M-Y', $request->date)->format('Y-m-d'),
            'employee_id' => $request->employee_id,
            'days' => $request->days,
            'rate' => $request->rate,
            'total' => $request->total,
            'category' => $request->category,
            'remark' => $request->remark,
        ]);
        return redirect('admin/tiffin-bill')->withMsg('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TiffinBill  $tiffinBill
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TiffinBill::whereId($id)->delete();
        return redirect()->back()->withMsg("Successfully Deleted");
    }
}
