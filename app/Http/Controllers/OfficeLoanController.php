<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OfficeLoan;
use App\Models\User;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;

class OfficeLoanController extends Controller
{
    public function officeLoanAdd()
    {
        $employee = User::all();
        return view('backend.office_loan.add_loan', compact('employee'));
    }

    public function officeLoanIndex()
    {
        $office_loan = OfficeLoan::with(['employee'])->latest()->paginate(15);
        // dd($office_loan);
        return view('backend.office_loan.index', compact('office_loan'));
    }

    public function officeLoanEdit($id)
    {
        $office_loan = OfficeLoan::findOrFail($id);
        $employee = User::all();
        return view('backend.office_loan.edit_loan', compact('office_loan', 'employee'));
    }

    public function officeLoanStore(Request $request)
    {
            
        // $this->validate($request,[
        //     'employee_id' => 'required',
        //     'amount' => 'required|numeric|min:1',
        //     'date' => 'required',
        //     'detail' => 'required',
        // ]);
        $data = $request->all();
        // dd($data);
        if ($request->type == "loan") {
            $instalment_dates=[];
            $date = Carbon::createFromFormat('Y-m-d',$data['date']);
            for ($i=0; $i < (int)$request->instalment; $i++) { 
                array_push($instalment_dates,$date->addMonth(1)->format('Y-m-1'));
            }
            // dd($instalment_dates);
            OfficeLoan::create(['user_id'=>(int) $data['employee_id'],'type'=>$data['type'],'instalment'=>$data['instalment'],'amount'=>$data['amount'],'date'=>$data['date'],'instalment_dates'=>serialize($instalment_dates),'detail'=>$data['detail']]);
        }elseif ($request->type == "advance") {
            if($request->hasfile('attachment'))
            {
                $name = time().'.'.$request->attachment->extension();
                $request->attachment->move(base_path() . '/storage/app/public/loan-attachment', $name);
                $data['attachment'] = $name;
            }
            // dd((int) $data['employee_id']);
            OfficeLoan::create([ 'user_id'=>(int) $data['employee_id'],'amount'=>$data['amount'],'period'=>$data['period'],'date'=>$data['date'],'attachment'=>$data['attachment'],'detail'=>$data['detail']]);
        }
        return redirect()->back()->withMsg('Successfully Loan Added');
    }

    public function officeLoanUpdate(Request $request, $id)
    {
            
        $this->validate($request,[
            'employee_id' => 'required',
            'amount' => 'required|numeric|min:1',
            'date' => 'required',
            'detail' => 'required',
        ]);

        OfficeLoan::whereId($id)
        ->update([
            'employee_id' => $request->employee_id,
            'amount' => $request->amount,
            'date' => $request->date,
            'detail' => $request->detail,
        ]);
        return redirect('admin/office/loan')->withMsg('Successfully Loan Added');
    }
}
