<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $dep = Department::all();

        return view('backend.department.department-list', compact('dep'));
    }

    public function store(Request $request)
    {
       
        $inputs = $request->except('_token', 'name');
        $this->validate($request,array(
           'name' => 'required|max:191',
        ));
        $dep = new Department;
        $dep->name = $request->name;
        $dep->save();

        foreach ($inputs as $input => $val) {
            $deg = new Designation;
            $deg->deg_name = $val;
            $deg->dept_id = $dep->id;
            $deg->save();
        }
        return redirect()->back()->withMsg('Successfully Created');
    }

    public function edit($id)
    {
        $dep = Department::find($id);
        return view('backend.department.edit-department', compact('dep'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request,array(
            'name' => 'required|max:191',
        ));

        $dep = Department::where('id', $id)
        ->update([
            'name' => $request->name,
        ]);

        for ($i = 0; $i < count($request->deg_name); $i++) {
            Designation::updateOrCreate(['id' => $request->deg_id[$i],], [
                'deg_name' => $request->deg_name[$i],
                'dept_id' => $id
            ]);
        }

        return redirect('admin/department')->withMsg('Updated');

    }

    public function destroy($id)
    {
        
        Designation::where('dept_id',$id)->delete();
        Department::find($id)->delete();
        return redirect()->back()->withmsg("Removed Successfully");

    }

    public function deleteDeign(Request $request){

        $desing_id = $request->desing_id;
        Designation::destroy($desing_id);
        return $desing_id;

    }
}
