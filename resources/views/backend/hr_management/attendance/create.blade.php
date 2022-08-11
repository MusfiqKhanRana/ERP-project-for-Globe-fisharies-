@extends('backend.master')
@section('site-title')
   Attendance
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                        // Swal.fire({
                        //     position: 'top-end',
                        //     icon: 'success',
                        //     title: "{{Session::get('msg')}}",
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // })
                    });
                </script>
            @endif
            <h3 class="page-title bold form-inline">HR Management
                <small> Employee Attendance </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                {{-- <a class="btn purple pull-right" data-toggle="modal" href="#manualAttendance">
                    Add Manual Attendance
                    <i class="fa fa-plus"></i>
                </a> --}}
            </h3>
            <hr>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <form method="get" action="{{route('employee.attend')}}" class="form-horizontal">
                            {{-- {{csrf_field()}} --}}
                            <div class="col-md-12 ">
                                <div class="portlet-body">
                                    <div class="form-body">
                                        <div class="row">
                                            <label class="col-md-1 control-label">Department</label>
                                            <div class="col-md-3">
                                                <select class="form-control " id="department" name="department">
                                                    <option value="">--Select--</option>
                                                    @foreach ($departments as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-md-1 control-label">Designation</label>
                                            <div class="col-md-3">
                                                <select  class="form-control" name="designation" id="designation">
                                                    <option value="">--Select--</option>
                                                    @foreach ($departments as $department)
                                                        @foreach ($department->designation as $designation)
                                                            <option value="{{$designation->id}}" class="{{$department->id}}">{{$designation->deg_name}}</option>
                                                        @endforeach    
                                                    @endforeach
                                                </select>
                                            </div>
                                            <label class="col-md-1 control-label">Name</label>
                                            <div class="col-md-3">
                                                <select  class="form-control" name="user_id" id="name">
                                                    <option value="null">--Select--</option>
                                                    @foreach ($departments as $department)
                                                        @foreach ($department->designation as $designation)
                                                            @foreach ($designation->employee as $employee)
                                                                <option value="{{$employee->id}}" class="{{$designation->id}}">{{$employee->name}}</option>
                                                            @endforeach
                                                        @endforeach    
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="row" >
                                            <label class="col-md-1 control-label">Date From</label>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="date_from"  value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                            </div>
                                            <label class="col-md-1 control-label">Date To</label>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="date_to" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                            </div>
                                            <label class="col-md-1 control-label">Status</label>
                                            <div class="col-md-3">
                                                <select  class="form-control" name="status" id="status">
                                                    <option value="null">--Select--</option>
                                                    <option value="Absent">Absent</option>
                                                    <option value="Present">Present</option>
                                                    <option value="Medical">Medical</option>
                                                    <option value="Casual">Casual</option>
                                                    <option value="Special">Special</option>
                                                    <option value="Earned">Earned</option>
                                                    <option value="Office">Office</option>
                                                    <option value="Early">Early Leave</option>
                                                    <option value="Late">Late</option>
                                                    <option value="Delay">Delay</option>
                                                    <option value="Weekly Holiday">Weekly Holiday</option>
                                                    <option value="Holiday">Holiday</option>
                                                    <option value="Application Applied">Application Applied</option>
                                                    <option value="Late Application Accepted">Late Application Accepted</option>
                                                    <option value="Absent Application Denied">Absent Application Denied</option>
                                                    <option value="Late Application Denied">Late Application Denied</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="col-md-2 pull-right">
                                        <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-search"></i>  Search</button>
                                    </div>
                                    <div class="row"><div class=" pull-right ">
                                        {{-- <a class="col-md-12 btn btn dark" href="{{route("employee-attendance.index")}}">
                                        <i class="fa fa-backward"></i>  Back</a> --}}
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><br><hr>
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Attendance List
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Department & Designation
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            In
                                        </th>
                                        <th>
                                            Other
                                        </th>
                                        <th>
                                            Out
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th style="text-align: center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        {{-- @php
                                            dd($attendance->toArray());
                                        @endphp --}}
                                         <tr>
                                            <td>{{$attendance->employee->employee_id}}</td>
                                            <td>{{$attendance->employee->name}}</td>
                                            <td>
                                                Department:{{$attendance->employee->department->name}}<br>
                                                Designamtion:{{$attendance->employee->designation->deg_name}}
                                            </td>
                                            <td>{{$attendance->date}}</td>
                                            <td>{{$attendance->in_time}}</td>
                                            <td>
                                                {{-- 02.05<br>
                                                02.15<br>
                                                04.15<br>
                                                04.25 --}}
                                                N/A
                                            </td>
                                            <td>{{$attendance->out_time}}</td>
                                            @if ($attendance->status=="Present")
                                                <td style="color:green;">{{$attendance->status}}</td>
                                            @elseif ($attendance->status=="Absent")
                                                <td style="color:rgb(128, 0, 0);">{{$attendance->status}}</td>
                                            @elseif ($attendance->status=="Late")
                                                <td style="color:rgb(19, 12, 123);">{{$attendance->status}}</td>
                                            @else
                                                <td style="color:rgb(44, 55, 16);">{{$attendance->status}}</td>
                                            @endif
                                            <td>
                                                @if ($attendance->date == \Carbon\Carbon::now()->format('d/m/Y') && $attendance->out_time == null)
                                                    <button class="btn btn-info manual_attendance" data-toggle="modal" href="#manualAttendance" data-in_time = "{{$attendance->in_time}}" data-out_time = "{{$attendance->out_time}}" data-id="{{$attendance->id}}" data-route="{{route('manual.attendance',$attendance->id)}}">Manual Attendance</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="manualAttendance" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add User Attendance</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" role="form" method="post" action="" id="manual_attendance">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">In Time</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="time" name="in_time" id="in_time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Out Time</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="time" name="out_time" id="out_time">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                            {{-- <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="date" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" data-date-format="dd/mm/yyyy" data-date-viewmode="years" readonly>
                                </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                <div class="col-md-9">
                                    <select  class="form-control selectpicker" data-live-search="true" name="user_id" id="name">
                                        <option value="null">--Select--</option>
                                        @foreach ($departments as $department)
                                            @foreach ($department->designation as $designation)
                                                @foreach ($designation->employee as $employee)
                                                    <option value="{{$employee->id}}" class="{{$designation->id}}">{{$employee->name}} || {{$designation->deg_name}} || {{$department->name}}</option>
                                                @endforeach
                                            @endforeach    
                                        @endforeach
                                    </select>
                                </div>
                            </div>--}}
                            {{-- <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Status</label>
                                <div class="col-md-9">
                                    <select  class="form-control" name="status" id="status">
                                        <option value="null">--Select--</option>
                                        <option value="Absent">Absent</option>
                                        <option value="Present">Present</option>
                                    </select>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    {{-- <script src="https://cdn.tiny.cloud/1/i2a8bjsghb2egjws1cli2w9fcs5ke9j47f8jhfky1sq28f5q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function() {
            $(".manual_attendance").click(function(){
                $('#in_time').val($(this).data('in_time'))
                $('#out_time').val($(this).data('out_time'))
                $('#manual_attendance').attr('action', $(this).data('route'));
            });
            $('#datepicker1').val(moment(moment().toDate()).format('MM/DD/YYYY'));
            $("#designation").chained("#department");
            $("#name").chained("#designation");
        });
        
      </script>
    @endsection