<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OfficeLoan;
use App\Models\OfficeLoanInstallment;
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
        $office_loan = OfficeLoan::with(['employee','loan_instalment'])->latest()->paginate(5);
       // dd($office_loan->toArray());
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
        $data['applicable_month'] = Carbon::parse($data['applicable_month'])->format('Y-m-d');
        $data['period'] = Carbon::parse($data['period'])->format('Y-m-d');
        if ($request->type == "loan") {
            $instalment_dates=[];
            $date = Carbon::createFromFormat('Y-m-d',$data['applicable_month']);
            array_push($instalment_dates,$data['applicable_month']);
            for ($i=0; $i < (int)$request->instalment-1; $i++) { 
                array_push($instalment_dates,$date->addMonth(1)->format('Y-m-1'));
            }
            $office_loan = OfficeLoan::create(['user_id'=>(int) $data['employee_id'],'type'=>$data['type'],'instalment'=>$data['instalment'],'amount'=>$data['amount'],'date'=>$data['date'],'applicable_date'=>$data['applicable_month'],'instalment_dates'=>serialize($instalment_dates),'detail'=>$data['detail']]);
            foreach ($instalment_dates as $key => $installment_date){
                OfficeLoanInstallment::create(['user_id'=> $office_loan->user_id,'office_loan_id'=>$office_loan->id,'installment_no'=>$key+1,'date'=>$installment_date]);
            }
        }elseif ($request->type == "advance") {
            if($request->hasfile('attachment'))
            {
                $name = time().'.'.$request->attachment->extension();
                $request->attachment->move(base_path() . '/storage/app/public/loan-attachment', $name);
                $data['attachment'] = $name;
            }
            OfficeLoan::create(['user_id'=>(int)$data['employee_id'],'amount'=>$data['amount'],'period'=>$data['period'],'date'=>$data['date'],'attachment'=>$data['attachment'],'detail'=>$data['detail']]);
        }
        return redirect('admin/office/loan')->withMsg('Successfully Added');
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
    public function officeLoanPayment(Request $request){
        $data = $request->all();
        //dd($data);
        $isPaid = false;
        if ($data['paid_amount']==$data['per_instalment']) {
           $isPaid = true;
        }
        $office_loan_payment = OfficeLoanInstallment::where('id',$data['instalment_id'])->update(['paid_amount'=>$data['paid_amount'],'isPaid'=>$isPaid,'paid_date'=> Carbon::now()->toDateTimeString()]);
        return redirect()->back()->withMsg('Successfully Added Payment');

    }
    public function advanceInfo(Request $request)
    {
        $advance_loans = OfficeLoan::where('period',$request->period)->get();
        return $advance_loans;
        return response(OfficeLoan::find($request->id));
    }

}
