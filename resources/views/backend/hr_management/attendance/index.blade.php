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
                <a class="btn purple pull-right" data-toggle="modal" href="#basic">
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
                            <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Name
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
                                            <td>
                                                @if ($attendance->status == "Absent")
                                                    <input type="checkbox" class="add_leave_check">
                                                @endif
                                            </td>
                                            <td>{{$attendance->employee->id}}</td>
                                            <td>{{$attendance->employee->name}}</td>
                                            <td>{{$attendance->date}}</td>
                                            <td>{{$attendance->in_time}}</td>
                                            <td>02.05<br>
                                                02.15<br>
                                                04.15<br>
                                                04.25
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
                                            <td style="text-align: center">
                                                @if ($attendance->status=="Late" || $attendance->status=="Delay")
                                                    <a class="btn btn-info"  data-toggle="modal" href="#editModal"><i class="fa fa-flus"></i> Add Show Casuse</a> 
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="editModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title">Add Show case Note</h4>
                                        </div>
                                        <br>
                                        <form class="form-horizontal" role="form" method="post" action="{{route('tiffin-bill.store')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-md-2 control-label">Attachment</label>
                                                <div class="col-md-8">
                                                    <input type="file" class="form-control"  name="attachment">
                                                </div><br><br>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail1" class="col-md-2 control-label"></label>
                                                <div class="col-md-8">
                                                    <textarea type="text" class="form-control" id="" name=""></textarea>
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
                    {{-- <div>
                        <p class="pull-right" style="color: red">
                            Note: Checkbox will only appear on Absent status and button will appear in late status.
                        </p>
                    </div> --}}
                </div>
            </div>
            <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add Application</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" role="form" method="post" action="{{route('tiffin-bill.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Attachment</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control"  name="attachment">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label"></label>
                                <div class="col-md-8">
                                    <textarea type="text" class="form-control" id="" name=""></textarea>
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
    <script src="https://cdn.tiny.cloud/1/uzb665mrkwi59olq2qu3cwqqyebsil4hznmwc45qu4exf7lt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>	
    <script type="text/javascript">
        $(function() {
            tinymce.init({
                selector: 'textarea',
            });
        });
        
      </script>
    @endsection