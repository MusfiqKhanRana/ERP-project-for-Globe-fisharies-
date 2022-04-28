<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OfficeLoan;
use App\Models\User;
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
        $office_loan = OfficeLoan::orderBy('id', 'desc')->paginate(15);
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
            dd($request->all());
        }elseif ($request->type == "advance") {
            if($request->hasfile('attachment'))
            {
                $name = time().'.'.$request->attachment->extension();
                $request->attachment->move(base_path() . '/storage/app/public/loan-attachment', $name);
                $data['attachment'] = $name;
            }
            dd($data['employee_id']);
            OfficeLoan::create(['user_id'=>$data['employee_id'],'amount'=>$data['amount'],'period'=>$data['period'],'date'=>$data['date'],'attachment'=>$data['attachment'],'detail'=>$data['detail']]);
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
