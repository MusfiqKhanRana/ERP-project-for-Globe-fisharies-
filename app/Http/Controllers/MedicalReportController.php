<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Employee;
use App\Models\MedicalReport;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
use DateTime;
use Faker\Provider\Medical;

class MedicalReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation = Designation::all();
        $bdates = Employee::all();
        $reports = MedicalReport::with([
            'user'=>function($q){
                    $q->with(['designation']);
                }
            ])->get();
        return view('backend.production.production-data.medical-report.index', compact('reports','bdates','designation'));
;    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('backend.production.production-data.medical-report.create',compact('users'));
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
           'date' => 'max:191',
           'user_id' => 'min:4|max:191',
           'complain' => 'min:4',
           'dressing' => 'max:191',
           'medicine_details' => 'required',
           //'medicine_schedule' => 'max:191'
        ));
        $medicine_report = new MedicalReport();
        $medicine_report->date = $request->date;
        $medicine_report->user_id = $request->user_id;
        $medicine_report->complain = $request->complain;
        $medicine_report->dressing = $request->dressing;
        $medicine_report->medicine_details = $request->medicine_details;
        //$medicine_report->medicine_schedule = $request->medicine_schedule;
        $medicine_report->save();

        return redirect()->route('medical_report.index')->withMsg('Successfully Created');
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
        $input = $request->all();
        // return $id;
        $medical_reports = MedicalReport::where('id',$id)->update(['complain'=>$input['complain'],'dressing'=>$input['dressing'],'medicine_details'=>$input['medicine_details']]);
        return redirect()->back()->withmsg('Successfully Updated');
        // MedicalReport::whereId($id)
        // ->update([
        //     'complain' => $request->complain,
        //     'dressing' => $request->dressing,
        //     'medicine_name' => $request->medicine_name,
        //     'medicine_schedule' => $request->medicine_schedule,
        // ]);
        // return redirect()->back()->withMsg("Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MedicalReport::find($id)->delete($id);
       // return response()->json("successfully deleted", 200);
       return redirect()->back()->withmsg('Successfully Deleted');
    }
    // public function MedicalReport(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $medical_report = MedicalReport::with('user')->latest();
    //         return Datatables::of($medical_report)
    //             ->addIndexColumn()
    //             ->editColumn('b_date',function($data){
    //                 $origin = new DateTime($data->user->b_date);
    //                 $target = new DateTime("now");
    //                 $interval = $origin->diff($target);
    //                 return $interval->format('%y years');
    //             })
    //             ->addColumn('name', function($data)
    //             {
    //                 return $data->user->name;
    //             })
    //             ->addColumn('action', function($row){
    //                 $actionBtn = '<button data-toggle="modal" data-target="#editModal" data-id="'.$row->id.'" data-complain="'.$row->complain.'"  data-dressing="'.$row->dressing.'" data-medicine_details="'.$row->medicine_details.'" class="edit btn btn-success btn-sm edit_report">Edit</button> <button  data-toggle="modal" data-target="#deleteModal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm delete_report">Delete</button>';
    //                 return $actionBtn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
            
    //     }
    // }
}
