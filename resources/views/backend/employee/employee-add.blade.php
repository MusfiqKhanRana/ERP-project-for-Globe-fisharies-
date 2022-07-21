@extends('backend.master')
@section('site-title')
    Add New Employee
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- END PAGE BAR -->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Add New Employee
            </h3>
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
            <!-- END PAGE TITLE-->
            <form method="POST" action="{{route('employee.post')}}" class="form-horizontal" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class="row ">
                    <div class="col-md-6 col-sm-6">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Personal Details
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 200px;">
                                                    <img src="">
                                                </div>
                                                 <span class="btn red btn-outline btn-file">
                                                 <span class="fileinput-new"> Select image 4/4" </span>
                                                 <span class="fileinput-exists"> Change </span>
                                                 <input type="file" name="image"> </span>
                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="Employee Name" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Father's Name <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="f_name" placeholder="Father Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Mother's Name <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="mother_name" placeholder="Mother Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Date of Birth <span class="required">* </span></label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="b_date" readonly value="" required>
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gender <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="gender" required>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Blood Group <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="blood" required>
                                                <option>N/A</option>
                                                <option value="A+">A +(ve)</option>
                                                <option value="B+">B +(ve)</option>
                                                <option value="AB+">AB +(ve)</option>
                                                <option value="O+">O +(ve)</option>
                                                <option value="O-">O -(ve)</option>
                                                <option value="A-">A -(ve)</option>
                                                <option value="B-">B -(ve)</option>
                                                <option value="AB-">AB -(ve)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Phone <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="phone" placeholder="Contact Number" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">E-mail</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="e_mail" placeholder="Enter your E-mail" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Present Address <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="local_add" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Permanent Address <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="per_add" rows="3" required></textarea>
                                        </div>
                                    </div>
                                    <h4><strong>Account Login</strong></h4>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="email" class="form-control" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="hidden" name="oldpassword">
                                            <input type="password" name="password" class="form-control" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Salary Description
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body salary">
                                    {{-- <div class="form-group">
                                        <label class="col-md-3 control-label">Basic</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="basic" placeholder="Basic" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Medical Allowance</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="m_allowance" placeholder="Medical Allowance" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">House Rent</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="h_rent" placeholder="House Rent" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">TA</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ta" placeholder="TA" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">DA</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="da" placeholder="Da" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Total</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="total" readonly>
                                        </div>
                                    </div> --}}
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="product">Basic <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="basic" id="basic" placeholder="Basic" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="product">Medical <span class="required">* </span></label>
                                                <input type="text" class="form-control" name="medical_allowance" id="medical_allowance" placeholder="Medical" required>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <label for="product">House Rent <span class="required">* </span></label>
                                                <input type="text" autocomplete="off" class="form-control" name="house_rent" id="house_rent" placeholder="House" required>
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-md-6">
                                                <label for="product">TA</label>
                                                <input type="text" class="form-control"  name="ta" id="ta" placeholder="TA Bill">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="product">DA</label>
                                                <input type="text" class="form-control" name="da" id="da" placeholder="DA Bill">
                                            </div>
                                        </div><br> --}}
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <span> Total: <span  id="total"></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>OverTime
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="checkbox" name="isOvertime" class="overtime" value="checked">Allow Overtime
                                            </div><br><br>
                                            <div class=" col-md-12 overtime_type">
                                                <div class="col-md-12">
                                                    
                                                    <label>
                                                        <input type="radio" class="form-control" name="overtime_type" id="regular" value="Regular" checked> Regular
                                                    </label>
                                                    <label>
                                                        <input type="radio" class="form-control" name="overtime_type" id="bonus_amount" value="Fixed" > Fixed
                                                    </label>
                                                </div><br><br>
                                                <div class="row">
                                                    <div class="col-md-12  fixed_amount">
                                                        <input class="form-control" type="number" name="overtime_amount" placeholder="Type Amount">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Company Details
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Department <span class="required">* </span></label>
                                        <div class="col-md-9">
                                           
                                            <select class="form-control select2me" id="department" name="dept_id" required>
                                                <option value="">--Select--</option>
                                                @foreach($department as $dep)
                                                    <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                @endforeach
                                                {{csrf_field()}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Designation <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select  class="select2me form-control" name="deg_id" id="designation" required>
                                                <option value="">--Select--</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Employee ID<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            @php
                                                $employee_code =  random_int(100000, 999999);
                                            @endphp
                                            <input type="text" class="form-control" name="employee_id" placeholder="Employee ID" value="{{$employee_code}}" readonly >
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Joining Date<span class="required">* </span></label>
                                        <div class="col-md-3">
                                            <div class="input-group input-medium date date-picker"  data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                <input type="text" class="form-control" name="date" readonly value="">
                                                <span class="input-group-btn">
                                                    <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-3 control-label">Joining Salary</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="salary" placeholder="Current Salary" value="">
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Branch Address<span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="branch_address" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Bank Account Details
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Holder Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ac_name" placeholder="Account Holder Name" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Account Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="ac_num" placeholder="Account Number" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Bank Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="bank_name" placeholder="BANK Name" value="" required>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-3 control-label">IFSC Code(Optional)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="code" placeholder="IFSC Code" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">PAN Number(Optional)</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="pan_num" placeholder="PAN Number" value="">
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Branch</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="branch" placeholder="BRANCH" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Employment Description
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Status <span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="status" name="status" required>
                                                <option value="Probational">Probational</option>
                                                <option value="Permanent">Permanent</option>
                                                <option value="Retired">Retired</option>
                                                <option value="Terminated">Terminated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> User Shift<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <select class="form-control" id="user_shift" name="user_shift_id" required>
                                                <option value="">--Select--</option>
                                                @foreach ($user_shift as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                                {{csrf_field()}}
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label class="col-md-3 control-label">Tiffin Bill</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="bill" placeholder="Tiffin Bill" value="">
                                        </div>
                                    </div> --}}
                                    {{-- <div class="form-group">
                                        <label class="col-md-3 control-label">Alocated Leave</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="leave" placeholder="Alocated Leave" value="">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Provident Fund
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Package :</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="provident_fund" id="">
                                                <option value="">N/A</option>
                                                @foreach ($provident_fund as $item)
                                                    <option value="{{$item->id}}">{{$item->package}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Income Tax
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"> Amount :</label>
                                        <div class="col-md-9">
                                            {{-- <input type="text" class="form-control" name="income_tax" placeholder="Tax Amount" value=""><br> --}}
                                            <span class="in_percentage">
                                                <input type="text" class="form-control" name="in_percentage"  placeholder="In %" id="percentage_id"/>
                                            </span>
                                            <span class="in_amount">
                                                <input type="text" class="form-control" name="in_amount" placeholder="In amount" id="amount_id"/>
                                            </span>
                                            <fieldset class="radio-inline question coupon_question2">
                                                <input class="form-check-input want_in_amount" type="checkbox">Want in Amount ? 
                                            </fieldset><br>
                                            It will be deduct monthly Form Salary
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet box dark">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-calendar"></i>Leave Description
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Casual Leave<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="c_leave" placeholder="Casual Leave" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Medical Leave<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="m_leave" placeholder="Medical Leave" value="" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Earned Leave</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="s_leave" placeholder="It will be decided by Authority" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="row ">
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet box dark">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-calendar"></i>Documents
                                    </div>
                                </div>
                                <div class="portlet-body">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                    <i class="fa fa-plus"></i>	Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.salary').on('keyup', function(){
                $('#total').html(parseInt($('#basic').val()) + parseInt($('#medical_allowance').val()) + parseInt($('#house_rent').val()));
             console.log(total);
            });
            $('.overtime_type').hide();
            $('.overtime').click(function()
            {
            if ($(this).is(':checked')) {
                $('.overtime_type').show();
                }else {
                $(".overtime_type").hide();
            }
            });
            $('.fixed_amount').hide();
            $('#bonus_amount').click(function()
            {
            if ($(this).is(':checked')) {
                $('.fixed_amount').show();
                }
            });
            $('#regular').click(function()
            {
            if ($(this).is(':checked')) {
                $('.fixed_amount').hide();
                }
            });
            function nullmaking(){
            $(".fixed_amount").val(null);
            $("#percentage_id").val(null);
            $("#amount_id").val(null);
            }
            $(document).on('change','#department',function(){
                var id = $(this).val();
                //alert(id)
                $.ajax({
                    type:"POST",
                    url:"{{route('designation.pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        $('#designation').html("");
                        $('#designation').append(data)
                    }
                });
            });
            $(document).on('keyup','#percentage_id',function() {
                let main_price = total_price - (total_price*$(this).val())/100;
                $('#price').val(main_price);
                in_percentage = $(this).val()
            });
            $(document).on('keyup','#amount_id',function() {
                let main_price = total_price - ($(this).val());
                in_amount = $(this).val();
                $('#price').val(main_price);
            });
            $('.in_amount').hide();
            $(".want_in_amount").click(function() {
                if($(this).is(":checked")) {
                    $(".in_amount").show();
                    $(".in_percentage").hide();
                    $('#percentage_id').val('');
                    in_percentage = 0;
                } else {
                    $(".in_amount").hide();
                    $(".in_percentage").show();
                    in_amount = 0;
                    $('#amount_id').val('');
                }
            });
        });
    </script>
@endsection

