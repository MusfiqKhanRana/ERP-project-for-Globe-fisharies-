<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OfficeLoan;
use App\Models\User;
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
            
        $this->validate($request,[
            'employee_id' => 'required',
            'amount' => 'required|numeric|min:1',
            'date' => 'required',
            'detail' => 'required',
        ]);

        OfficeLoan::create($request->all());
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
