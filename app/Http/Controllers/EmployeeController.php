<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\ProvidentFund;
use App\Models\User;
use App\Models\Timezone;
use App\Models\UserSalary;
use App\Models\UserShift;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EmployeeController extends Controller
{
    public function index()
    {
        $employee = User::orderBy('id', 'DESC')->paginate(10);
        $time = Timezone::find(1);
        // dd($employee->toArraya());
        return view('backend.employee.employee-list', compact('employee','time'));
    }

    public function create()
    {
        $provident_fund = ProvidentFund::get();
        $user_shift = UserShift::get();
        $department = Department::all();
        return view('backend.employee.employee-add', compact('department','user_shift','provident_fund'));
    }

    public function store(Request $request)
    {
            
        //dd($request);
        $this->validate($request, array(
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'resume'=> 'nullable|mimes:pdf,doc',
            'offer_letter'=> 'nullable|mimes:pdf,doc',
            'join_letter'=> 'nullable|mimes:pdf,doc',
            'con_letter'=> 'nullable|mimes:pdf,doc',
            'proof'=> 'nullable|mimes:pdf,doc',

            'name' => 'required|max:191',
            'f_name'=> 'max:191',
            'b_date'=> 'max:191',
            'gender'=> 'max:191',
            'phone'=> 'max:11|min:11',
            'e_mail' => 'required|email',
            
            'email'=> 'required|email',
            'password'=> 'max:191',
            //'employee_id'=> 'required',
            'dept_id'=> 'required',
            'deg_id'=> 'required',
            'date'=> 'max:191',
            //'salary'=> 'max:191',
            'branch_address'=>'max:190',
            'ac_name'=> 'max:191',
            'ac_num'=> 'max:191',
            'bank_name'=> 'max:191',
            'branch'=> 'max:191'

        ));
        $isOvertime = false;
        if ($request->isOvertime == "checked") {
           $isOvertime = true;
        }
       // dd($isOvertime);
        $employee = new User;
        $employee->name = $request->name;
        $employee->f_name = $request->f_name;
        $employee->mother_name = $request->mother_name;
        $employee->b_date = $request->b_date;
        $employee->gender = $request->gender;
        $employee->blood = $request->blood;
        $employee->phone = $request->phone;
        $employee->local_add = $request->local_add;
        $employee->per_add = $request->per_add;
        $employee->email = $request->email;
        $employee->password = bcrypt($request->password);
        $employee->employee_id = $request->employee_id;
        $employee->dept_id = $request->dept_id;
        $employee->deg_id = $request->deg_id;
        $employee->date = $request->date;
        //$employee->salary = $request->salary;
        $employee->branch_address = $request->branch_address;
        $employee->ac_name = $request->ac_name;
        $employee->ac_num = $request->ac_num;
        $employee->bank_name = $request->bank_name;
        $employee->branch = $request->branch;
        $employee->status = $request->status;
        $employee->provident_fund = $request->provident_fund;
        $employee->discount_in_amount = $request->discount_in_amount;
        $employee->discount_in_percentage = $request->discount_in_percentage;
        $employee->c_leave = $request->c_leave;
        $employee->e_mail = $request->e_mail;
        $employee->m_leave = $request->m_leave;
        $employee->s_leave = $request->s_leave;
        $employee->user_shift_id = $request->user_shift_id;
        $employee->isOvertime = $isOvertime;
        $employee->overtime_type = $request->overtime_type;
        $employee->overtime_amount = $request->overtime_amount;
        $employee->basic = $request->basic;
        $employee->medical_allowance = $request->medical_allowance;
        $employee->house_rent = $request->house_rent;

        //        image Upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/images/employee/images/'. $filename;
            Image::make($image)->save($location);
            $employee->image =  $filename;
        }

//                file Upload
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/resume/', $filename);
            $employee->resume = $filename;
        }
        //                file Upload
        if ($request->hasFile('appointment_letter')) {
            $file = $request->file('appointment_letter');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/appointmentLetter/', $filename);
            $employee->appointment_letter = $filename;
        }
        //                file Upload
        if ($request->hasFile('join_letter')) {
            $file = $request->file('join_letter');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/joiningLetter/', $filename);
            $employee->join_letter = $filename;
        }
        //                file Upload
        if ($request->hasFile('academic_certificate')) {
            $file = $request->file('academic_certificate');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/academicCertificate/', $filename);
            $employee->academic_certificate = $filename;
        }
        //                file Upload
        if ($request->hasFile('experience_certificate')) {
            $file = $request->file('experience_certificate');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/experienceCertificate/', $filename);
            $employee->experience_certificate = $filename;
        }
        //                file Upload
        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/idProof/', $filename);
            $employee->proof = $filename;
        }
        $employee->save();

        // $user_salary = new UserSalary;
        // $user_salary->user_id = $employee->id;
        // $user_salary->basic = $request->basic;
        // $user_salary->medical_allowance = $request->medical_allowance;
        // $user_salary->house_rent = $request->house_rent;
        // //$user_salary->ta = $request->ta;
        // //$user_salary->da = $request->da;
        // $user_salary->save();

        return redirect('admin/employee')->withMsg('Employee Added Successfully');

    }

    public function edit($id)
    {
        $provident_fund = ProvidentFund::all();
        $user_shift = UserShift::all();
        $employee = User::find($id);
        $dep = Department::all();
        $deg = Designation::all();
        return view('backend.employee.employee-edit',compact('employee', 'dep','user_shift','provident_fund','deg'));
    }

    public function destroy($id)
    {
                
        $employee = User::find($id);
        $employee->delete();
        return redirect()->back()->withMsg('User Deleted Successfully');
    }

    public function designation_pass(Request $request){
        $id = $request->id;
        $designatoin = Designation::where('dept_id',$id)->get();

        $output ="";

       foreach($designatoin as $value){
          $output .= '<option value="'.$value->id.'">'.$value->deg_name.'</option>';
       }
        echo $output;
    }

    public function personalDataUpdate(Request $request, $id){
        $employee = User::find($id);
        $this->validate($request,array(
            'image' => 'mimes:jpeg,bmp,png,jpg',
            'name' => 'max:191',
            'f_name'=> 'max:191',
            'b_date'=> 'max:191',
            'gender'=> 'max:191',
            'phone'=> 'max:12|min:10',
            'local_add'=> 'nullable',
            'per_add' => 'nullable',
            'email'=> 'max:191',
            'password'=> 'max:191',
        ));

        $employee->name = $request->input('name');
        $employee->f_name = $request->input('f_name');
        $employee->b_date = $request->input('b_date');
        $employee->gender = $request->input('gender');
        $employee->blood = $request->input('blood');
        $employee->phone = $request->input('phone');
        $employee->local_add = $request->input('local_add');
        $employee->per_add = $request->input('per_add');
        $employee->email = $request->input('email');
        $employee->password = bcrypt($request->input('password'))  ;
        //        image Upload
        if ($request->hasFile('image')) {
            unlink('assets/images/employee/images/'.$employee->image);
            $image = $request->file('image');
            $filename = time() . '.' . 'jpg';
            $location = 'assets/images/employee/images/'. $filename;
            Image::make($image)->save($location);
            $employee->image =  $filename;
        }
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Details Updated');

    }

    public function companyditailUpdate(Request $request,$id)
    {
                
        $employee = User::find($id);
        $this->validate($request,array(

            'employee_id'=> 'required',
            'dept_id'=> 'required',
            'deg_id'=> 'required',
            'date'=> 'max:191',
            'salary'=> 'max:191',
            'branch_address' => 'max:191',

        ));
        $employee->employee_id = $request->input('employee_id');
        $employee->dept_id = $request->input('dept_id');
        $employee->deg_id = $request->input('deg_id');
        $employee->date = $request->input('date');
        $employee->salary = $request->input('salary');
        $employee->branch_address = $request->input('branch_address');
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Details Updated');


    }

    public function bankDetailUpdate(Request $request, $id){
                
        $employee = User::find($id);
        $this->validate($request,array(

            'ac_name'=> 'max:191 | required',
            'ac_num'=> 'max:191|required',
            'bank_name'=> 'max:191|required',
            'code'=> 'max:191',
            
        ));
        $employee->ac_name = $request->input('ac_name');
        $employee->ac_num = $request->input('ac_num');
        $employee->bank_name = $request->input('bank_name');
        $employee->code = $request->input('code');
        $employee->pan_num = $request->input('pan_num');
        $employee->branch = $request->input('branch');
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Details Updated');
    }
    public function salaryUpdate(Request $request, $id){
                
        $employee = User::find($id);
        $this->validate($request,array(

            'basic'=> 'max:191 | required',
            'medical_allowance'=> 'max:191|required',
            'house_rent'=> 'max:191',
        ));
        $employee->basic = $request->input('basic');
        $employee->medical_allowance = $request->input('medical_allowance');
        $employee->house_rent = $request->input('house_rent');
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Salary Updated');
    }

    public function overtimeUpdate(Request $request, $id){
                
        $employee = User::find($id);
        $this->validate($request,array(

            'overtime_amount'=> 'max:191 | required',
           
        ));
        $employee->overtime_amount = $request->input('overtime_amount');
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Overtime Updated');
    }

    public function descriptionUpdate(Request $request, $id){
                
        $employee = User::find($id);
        $this->validate($request,array(

            'user_shift_id'=> 'max:191 | required',
            'status'=> 'max:191 | required',
           
        ));
        $employee->user_shift_id = $request->input('user_shift_id');
        $employee->status = $request->input('status');
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Description Updated');
    }

    public function provident_fundUpdate(Request $request, $id){
                
        $employee = User::find($id);
        $this->validate($request,array(

            'provident_fund'=> 'max:191 | required',
           
        ));
        $employee->provident_fund = $request->input('provident_fund');
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Provident Fund Updated');
    }

    public function income_taxUpdate(Request $request, $id){
                
        $employee = User::find($id);
        $this->validate($request,array(

            
           
        ));
        $employee->discount_in_percentage = $request->input('discount_in_percentage');
        $employee->discount_in_amount = $request->input('discount_in_amount');
        //dd($employee);
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Income Tax Updated');
    }

    public function leaveUpdate(Request $request, $id){
                
        $employee = User::find($id);
        $this->validate($request,array(

            
           
        ));
        $employee->c_leave = $request->input('c_leave');
        $employee->m_leave = $request->input('m_leave');
        $employee->s_leave = $request->input('s_leave');
        //dd($employee);
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Updated');
    }

    public function documentUpdate(Request $request, $id)
    {
                
        $employee = User::find($id);
        $this->validate($request,array(
            'resume'=> 'nullable|mimes:pdf,doc',
            'appointment_letter'=> 'nullable|mimes:pdf,doc',
            'join_letter'=> 'nullable|mimes:pdf,doc',
            'academic_certificate'=> 'nullable|mimes:pdf,doc',
            'proof'=> 'nullable|mimes:pdf,doc',
            'experience_certificate'=> 'nullable|mimes:pdf,doc',

        ));

//                file Upload
        if ($request->hasFile('resume')) {
//
            $file = $request->file('resume');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/resume/', $filename);
            $employee->resume = $filename;
        }
        //                file Upload
        if ($request->hasFile('appointment_letter')) {

            $file = $request->file('appointment_letter');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/appointmentLetter/', $filename);
            $employee->appointment_letter = $filename;
        }
        //                file Upload
        if ($request->hasFile('join_letter')) {
//
            $file = $request->file('join_letter');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/joiningLetter/', $filename);
            $employee->join_letter = $filename;
        }
        //                file Upload
        if ($request->hasFile('academic_certificate')) {
//
            $file = $request->file('academic_certificate');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/academicCertificate/', $filename);
            $employee->academic_certificate = $filename;
        }
        //  
        if ($request->hasFile('experience_certificate')) {
        //
        $file = $request->file('experience_certificate');
        $filename = time() . '.' . 'pdf';
        $file->move('assets/images/employee/academicCertificate/', $filename);
        $employee->experience_certificate = $filename;
    }
//                   file Upload
        if ($request->hasFile('proof')) {
//
            $file = $request->file('proof');
            $filename = time() . '.' . 'pdf';
            $file->move('assets/images/employee/idProof/', $filename);
            $employee->proof = $filename;
        }
        $employee->save();
        return redirect('admin/employee')->withMsg('Employee Details Updated');
    }

    public function saveResetPassword(Request $request)
    {
                
        $this->validate($request, [

            'passwordold' =>'required',

            'password' => 'required|min:5|confirmed'

        ]);

        try {

            $c_password = User::find($request->id)->password;

            $c_id = User::find($request->id)->id;

            //return  $c_password;

             $user = User::findOrFail($c_id);

            if(Hash::check($request->passwordold, $c_password)){

                $password = Hash::make($request->password);

                $user->password = $password;

                $user->save();

                return redirect()->back()->withMsg('Password Changes Successfully.');

            }else{

                session()->flash('message', 'Password Not Match');

                Session::flash('type', 'warning');

                return redirect()->back();

            }

        } catch (\PDOException $e) {

            session()->flash('message', 'Some Problem Occurs, Please Try Again!');

            Session::flash('type', 'warning');

            return redirect()->back();

        }

    }
    public function ajaxlist(Request $request){
        // return $request->id;
        if($request->id==1){
            return User::with('department','designation')->where('status',"Probational")->orderBy('id', 'DESC')->get();
        }
        if($request->id==2){
            return User::with('department','designation')->where('status',"Permanent")->orderBy('id', 'DESC')->get();
        }
        if($request->id==3){
            return User::with('department','designation')->where('status',"Retired")->orderBy('id', 'DESC')->get();
        }
        if($request->id==4){
            return User::with('department','designation')->where('status',"Terminated")->orderBy('id', 'DESC')->get();
        }
    }
}
