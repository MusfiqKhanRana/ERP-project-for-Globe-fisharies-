@extends('backend.master')
@section('site-title')
    Employee Edit
@endsection
@section('main-content')


    <div class="page-content-wrapper">

        <div class="page-content">
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Employee Edit/View
            </h3>
            <!-- END PAGE TITLE-->

            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-06">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="clearfix">
            </div>
            <div class="row ">
                <div class="col-md-6 col-sm-6">
                    
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Personal Details
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.update', $employee->id)}}" class="form-horizontal" id="personal_details_form" enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('put')}}

                                <div class="form-body">
                                    <div class="form-group ">
                                        <label class="control-label col-md-3">Photo</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                    <img style="height: 100px;" src="{{asset('assets/images/employee/images/'. $employee->image)}}">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="file" name="image">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                        Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                            <span class="label label-danger">
                                                NOTE! 
                                            </span> Image Size must be (872px by 724px)
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="name" class="form-control" value="{{$employee->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Father's Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="f_name" class="form-control" value="{{$employee->f_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date of Birth</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="b_date" readonly value="{{$employee->b_date}}" >
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gender</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="gender">
                                                <option value="male" @if($employee->gender == 'male') selected  @endif >Male</option>
                                                <option value="female" @if($employee->gender == 'female') selected  @endif >Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Blood Group</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="blood">
                                                <option value="A+" @if($employee->blood == 'A+') selected  @endif>A +(ve)</option>
                                                <option value="B+" @if($employee->blood == 'B+') selected  @endif>B +(ve)</option>
                                                <option value="AB+" @if($employee->blood == 'AB+') selected  @endif>AB +(ve)</option>
                                                <option value="O+" @if($employee->blood == 'O+') selected  @endif>O +(ve)</option>
                                                <option value="O-" @if($employee->blood == 'O-') selected  @endif>O -(ve)</option>
                                                <option value="A-" @if($employee->blood == 'A-') selected  @endif>A -(ve)</option>
                                                <option value="B-" @if($employee->blood == 'B-') selected  @endif>B -(ve)</option>
                                                <option value="AB-" @if($employee->blood == 'AB-') selected  @endif>AB -(ve)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone</label>
                                        <div class="col-md-9">
                                            <input type="text" name="phone" class="form-control" value="{{$employee->phone}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address</label>
                                        <div class="col-md-9">
                                            <textarea name="local_add" class="form-control" rows="3">{{$employee->local_add}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Permanent Address</label>
                                        <div class="col-md-9">
                                            <textarea name="per_add" class="form-control" rows="3">{{$employee->per_add}}</textarea>
                                        </div>
                                    </div>
                                    <h4><strong>Account Login</strong></h4>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" class="form-control" value="{{$employee->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password</label>
                                        <div class="col-md-9">
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="actions col-md-12">
                                            <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                                <i class="fa fa-save" ></i> Update </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Salary Description
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.salary.update', $employee->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_salary"></div>
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="product">Basic</label>
                                                <input type="text" class="form-control" name="basic" value="{{$employee->basic}}" id="basic" placeholder="Basic">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product">Medical </label>
                                                <input type="text" class="form-control" name="medical_allowance" value="{{$employee->medical_allowance}}" id="medical_allowance" placeholder="Medical">
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <label for="product">House Rent</label>
                                                <input type="text" class="form-control" name="house_rent" value="{{$employee->house_rent}}" id="house_rent" placeholder="House">
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Overttime
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.overtime.update', $employee->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_bank"></div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Amount</label>
                                        <div class="col-md-9">
                                            <input type="text" name="overtime_amount" class="form-control" value="{{$employee->overtime_amount}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Company Details
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.company.update', $employee->id)}}" class="form-horizontal" id="company_details_form">

                                {{csrf_field()}}
                                {{method_field('put')}}

                                <div id="alert_company">
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Department<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select class="form-control select2me" id="department" name="dept_id">
                                                @foreach($dep as $val)
                                                    <option value="{{$val->id}}" {{ $employee->dept_id == $val->id ? 'selected' : '' }}>{{$val->name}}</option>
                                                @endforeach
                                                {{csrf_field()}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Designation<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select  class="select2me form-control" name="deg_id" id="designation" >
                                                @foreach($deg as $val)
                                                    <option value="{{$val->id}}" {{ $employee->deg_id == $val->id ? 'selected' : '' }}>{{$val->deg_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Employee ID<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="employee_id" class="form-control" value="{{$employee->employee_id}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date of Joining</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="date" readonly value="{{$employee->date}}">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="control-label col-md-3">Exit Date</label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="exit_date" disabled="disabled" readonly value=" ">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    {{-- <h4><strong>Salary  ( <i class="fa fa-money"></i> )</strong>  {{-- $general->currency -}}</h4>
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <input class="form-control form-control-inline"  type="text" name="salary" value="{{$employee->salary}}" placeholder="Salary"/>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Branch</label>
                                            <div class="col-md-9">

                                                <input class="form-control form-control-inline"  type="text" name="branch_address" value="{{$employee->branch_address}}" placeholder="Branch Name"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Bank Account Details
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.bank.update', $employee->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_bank"></div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Holder Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="ac_name" class="form-control" value="{{$employee->ac_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Number</label>
                                        <div class="col-md-9">
                                            <input type="text" name="ac_num" class="form-control" value="{{$employee->ac_num}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input type="text" name="bank_name" class="form-control" value="{{$employee->bank_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Branch</label>
                                        <div class="col-md-9">
                                            <input type="text" name="branch" class="form-control" value="{{$employee->branch}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Employee Description
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.description.update', $employee->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_bank"></div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="status" name="status">
                                                <option value="Probational"  @if($employee->status == 'Probational') selected  @endif>Probational</option>
                                                <option value="Permanent"  @if($employee->status == 'Permanent') selected  @endif>Permanent</option>
                                                <option value="Retired"  @if($employee->status == 'Retired') selected  @endif>Retired</option>
                                                <option value="Terminated"  @if($employee->status == 'Terminated') selected  @endif>Terminated</option>
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"> User Shift</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="user_shift" name="user_shift_id">
                                            @foreach ($user_shift as $item)
                                                <option value="{{$item->id}}" {{ $employee->user_shift_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                            {{csrf_field()}}
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Provident Fund
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.provident_fund.update', $employee->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_bank"></div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Package :</label>
                                        <div class="col-md-9">
                                            {{-- <input type="text" class="form-control" name="provident" placeholder="Casual Leave" value=""> --}}
                                            <select class="form-control" name="provident_fund" id="">
                                                
                                                @foreach ($provident_fund as $item)
                                                    <option value="{{$item->id}}" {{ $employee->provident_fund == $item->id ? 'selected' : '' }}>{{$item->package}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Income Tax
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.income_tax.update', $employee->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_bank"></div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Amount :</label>
                                        <div class="col-md-9">
                                            {{-- <input type="text" class="form-control" name="income_tax" placeholder="Tax Amount" value=""><br> --}}
                                            <span class="discount_in_percentage">
                                                <input type="text" class="form-control" value="{{$employee->discount_in_percentage}}" name="discount_in_percentage" placeholder="discount in %" id="percentage_id"/>
                                            </span>
                                            <span class="discount_in_amount">
                                                <input type="text" class="form-control" placeholder="discount in amount" name="discount_in_amount" id="amount_id"/>
                                            </span>
                                            <fieldset class="radio-inline question coupon_question2">
                                                <input class="form-check-input want_in_amount" value="{{$employee->discount_in_amount}}" type="checkbox">Want in Amount ? 
                                            </fieldset>
                                            It will be deduct monthly Form Salary
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-calendar"></i>Leave Descrtiption
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form method="POST" action="{{route('employee.leave.update', $employee->id)}}" class="form-horizontal" id="bank_details_form">
                                {{csrf_field()}}
                                {{method_field('put')}}
                                <div id="alert_bank"></div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Casual Leave</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="c_leave" value="{{$employee->c_leave}}" placeholder="Casual Leave" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Medical Leave</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="m_leave" value="{{$employee->m_leave}}" placeholder="Medical Leave" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Earned Leave</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="s_leave" value="{{$employee->s_leave}}" placeholder="It will be decided by Authority" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="actions col-md-12">
                                        <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                            <i class="fa fa-save" ></i> Update </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="clearfix">
                <div class="row ">
                    <div class="col-md-12 col-sm-12">
                        <div class="portlet box blue-chambray">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Documents
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="portlet-body">
                                    <form method="POST" action="{{route('employee.document.update', $employee->id)}}" class="form-horizontal" id="documents_details_form" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        {{method_field('put')}}

                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Resume</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                            </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="resume">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/resume/'. $employee->resume)}}" target="_blank" class="btn dark">View Resume</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Appointment Letter</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                                </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="appointment_letter">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/appointmentLetter/'.$employee->appointment_letter)}}" target="_blank" class="btn dark">View Appointment Letter</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Joining Letter</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                            </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="join_letter">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/joiningLetter/'. $employee->join_letter)}}" target="_blank" class="btn dark">View Joining Letter</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Academic Certificate</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                            </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="academic_certificate">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>

                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/academicCertificate/'. $employee->academic_certificate)}}" target="_blank"  class="btn dark">View Academic Certificate</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">ID Proof</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                             </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="proof">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/idProof/'. $employee->proof)}}" target="_blank"  class="btn dark">View ID Proof</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2">Experience Certificate</label>
                                                <div class="col-md-5">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
                                                             </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select file </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" name="experience_certificate">
                                                              </span>
                                                            <a href="#" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                            <div class="col-md-3">
                                                                <a href="{{asset('assets/images/employee/experienceCertificate/'. $employee->experience_certificate)}}" target="_blank"  class="btn dark">View Experience Certificate</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="actions col-md-12">
                                                <button  data-loading-text="Updating..."  class="demo-loading-btn btn btn-sm blue col-md-12">
                                                    <i class="fa fa-save" ></i> Update </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Confirmation</h4>
                            </div>
                            <div class="modal-body" id="info">
                                <p>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="button" data-dismiss="modal" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title"><strong>New Salary</strong></h4>
                            </div>
                            <div class="modal-body">
                                <div class="portlet-body form">
                                    <!-------------- BEGIN FORM------------>
                                    <form method="POST" action=" " class="form-horizontal ">

                                      {{csrf_field()}}
                                        {{method_field('put')}}

                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" data-loading-text="Updating..."  class="demo-loading-btn btn green"><i class="fa fa-check"></i> Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- -----------END FORM-------->
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $(document).on('change','#department', function () {
                var id = $(this).val();

                $.ajax({
                    type:"POST",
                    url:"{{route('designation.pass')}}",
                    data:{
                        'id' : id,
                        '_token': $('input[name=_token]').val()
                    },
                    success:function (data) {
                        $('#designation').html("");
                        $('#designation').append(data)
                    }
                })
            })
            $(document).on('keyup','#percentage_id',function() {
                let main_price = total_price - (total_price*$(this).val())/100;
                $('#price').val(main_price);
                discount_in_percentage = $(this).val()
            });
            $(document).on('keyup','#amount_id',function() {
                let main_price = total_price - ($(this).val());
                discount_in_amount = $(this).val();
                $('#price').val(main_price);
            });
            $('.discount_in_amount').hide();
            $(".want_in_amount").click(function() {
                if($(this).is(":checked")) {
                    $(".discount_in_amount").show();
                    $(".discount_in_percentage").hide();
                    $('#percentage_id').val('');
                    discount_in_percentage = 0;
                } else {
                    $(".discount_in_amount").hide();
                    $(".discount_in_percentage").show();
                    discount_in_amount = 0;
                    $('#amount_id').val('');
                }
            });
        })
    </script>
@endsection


