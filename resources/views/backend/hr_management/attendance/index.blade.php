@extends('backend.master')
@section('site-title')
   Attendance
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
                        // swal("{{Session::get('msg')}}","", "success");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: "{{Session::get('msg')}}",
                            showConfirmButton: false,
                            timer: 1500
                        })
                    });
                </script>
            @endif
            <h3 class="page-title bold form-inline">HR Management
                <small> Employee Attendance </small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                <a class="btn purple pull-right leave_application" data-toggle="modal" href="#absentApplication">
                    Add Leave Application
                    <i class="fa fa-plus"></i>
                </a>
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
                            <form method="get" action="{{route('employee-attendance.index')}}">
                                {{csrf_field()}}
                                <div class="row" >
                                    <label class="col-md-1 control-label"><b>From Date</b></label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" name="date_from"  value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                    </div>
                                    <label class="col-md-1 control-label"><b>To Date</b></label>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" name="date_to" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                    </div>
                                    <div class="col-md-2 pull-right">
                                        <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-search"></i>  Find</button>
                                    </div>
                                </div>
                            </form>
                            
                            <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        {{-- <th>
                                            Id
                                        </th>
                                        <th>
                                            Name
                                        </th> --}}
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
                                            Shift
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
                                        <tr>
                                            <td>
                                                @if ($attendance->status == "Absent")
                                                    <input type="checkbox" data-id="{{$attendance->id}}" class="add_leave_check">
                                                @endif
                                            </td>
                                            {{-- <td>{{$attendance->employee->id}}</td>
                                            <td>{{$attendance->employee->name}}</td> --}}
                                            <td>{{$attendance->date}}</td>
                                            <td>{{$attendance->in_time}}</td>
                                            <td>02.05<br>
                                                02.15<br>
                                                04.15<br>
                                                04.25
                                            </td>
                                            <td>{{$attendance->out_time}}</td>
                                            <td>{{$attendance->employee->user_Shift->name}}</td>
                                            @if ($attendance->status=="Present")
                                                <td style="color:green;">{{$attendance->status}}</td>
                                            @elseif ($attendance->status=="Absent")
                                                <td style="color:rgb(128, 0, 0);">{{$attendance->status}}</td>
                                            @elseif ($attendance->status=="Late")
                                                <td style="color:rgb(19, 12, 123);">{{$attendance->status}}</td>
                                            @else
                                                <td style="color:rgb(44, 55, 16);">{{$attendance->status}}</td>
                                            @endif
                                            <td style="text-align: center">
                                                @if ($attendance->status=="Late" || $attendance->status=="Delay")
                                                    <a class="btn btn-info showcausebtn"  data-toggle="modal" href="#showCauseModal" data-status="{{$attendance->status}}" data-id="{{$attendance->id}}"><i class="fa fa-flus"></i> Add Show Casuse</a> 
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="showCauseModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Add Show case Note</h4>
                                        </div>
                                        <br>
                                        <form class="form-horizontal" role="form" method="POST" action="{{route('show-cause-application.store')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-md-2 control-label">Write Application</label>
                                                <div class="col-md-8">
                                                    <input type="hidden" class="form-control" id="attendance_id"  name="attendance_id" value="">
                                                    <input type="hidden" class="form-control" id="status"  name="type" value="">
                                                    <textarea type="text" class="form-control" id="show_cause_application_note" name="application_note"></textarea>
                                                </div><br><br><br><br><br><br><br><br><br><br>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i>Submit Application</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div id="absentApplication" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add Application</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post" action="{{route('absent-application.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Application For</label>
                                <div class="col-md-8">
                                    <select name="type" class="form-control" required>
                                        <option value="">--Select--</option>
                                        <option value="Medical">Medical Leave</option>
                                        <option value="Casual">Casual Leave</option>
                                        <option value="Special">Special Leave</option>
                                        <option value="Earned">Earned Leave</option>
                                        <option value="Office">Office Leave</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Attachment</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control attachment"  name="attachment">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Add Application</label>
                                <div class="col-md-8">
                                    <textarea type="text" class="form-control" id="absent_application_note" name="application_note"></textarea>
                                    <input type="hidden" name="attendance_id" class="attendance_id" value="application_note" multiple>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i>Submit Application</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(function() {
            CKEDITOR.replace('application_note');
            var attendance_ids=[];
            $('.leave_application').hide();
            $( ".add_leave_check" ).click(function() {
                $('.attendance_id').val('');
                if(this.checked){
                    attendance_ids.push($(this).data('id'));
                    // console.log(attendance_ids);
                    if (attendance_ids.length>=1) {
                        $('.attendance_id').val(attendance_ids);
                        $('.leave_application').show();
                    }else{
                        $('.attendance_id').val('');
                        $('.leave_application').hide();
                    }
                }
                if(!this.checked){
                    attendance_ids = removeItem(attendance_ids, $(this).data('id'));
                    if (attendance_ids.length>=1) {
                        $('.attendance_id').val(attendance_ids);
                        $('.leave_application').show();
                    }else{
                        $('.attendance_id').val('');
                        $('.leave_application').hide();
                    }
                }
            });
            $('.showcausebtn').click(function(){
                $('#attendance_id').val($(this).data('id'));
                $('#status').val($(this).data('status'));
            })
            function removeItem(arr, item){
                return arr.filter(f => f !== item)
            }
        });
        
      </script>
    @endsection