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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                        <form method="post" action="{{route('employee-attendance.store')}}" class="form-horizontal">
                            {{csrf_field()}}
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
                                                    <option>--Select--</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
                                            </div>
                                            <label class="col-md-1 control-label">Name</label>
                                            <div class="col-md-3">
                                                <select  class="form-control" name="name" id="name">
                                                    <option>--Select--</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class="row" >
                                            <label class="col-md-1 control-label">Date From</label>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="date_from"  value="">
                                            </div>
                                            <label class="col-md-1 control-label">Date To</label>
                                            <div class="col-md-3">
                                                <input type="date" class="form-control" name="date_to" value="">
                                            </div>
                                            <label class="col-md-1 control-label">Status</label>
                                            <div class="col-md-3">
                                                <select  class="form-control" name="status" id="status">
                                                    <option>--Select--</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>152520</td>
                                        <td>Md. Sadman Bishal</td>
                                        <td>Manager</td>
                                        <td>23/02/2022</td>
                                        <td>10.05 am</td>
                                        <td>02.05<br>
                                            02.15<br>
                                            04.15<br>
                                            04.25
                                        </td>
                                        <td>05.20 pm</td>
                                        <td style="color:green;">Present</td>
                                    </tr>
                                    <tr>
                                        <td>152521</td>
                                        <td>S F Sohel </td>
                                        <td>Execeutive</td>
                                        <td>23/02/2022</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td style="color:red;">Absent</td>
                                    </tr>
                                    <tr>
                                        <td>152522</td>
                                        <td>Md. Masud Rana</td>
                                        <td>Accountant</td>
                                        <td>23/02/2022</td>
                                        <td>10.00 am</td>
                                        <td>02.05<br>
                                            02.15<br>
                                            04.15<br>
                                            04.25</td>
                                        <td>05.15 pm</td>
                                        <td style="color:blue;">Late</td>
                                    </tr>
                                            {{-- <div id="deleteModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                {{csrf_field()}}
                                                <input type="hidden" value="" id="delete_id">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                        </div>
                                                        <div class="modal-footer " >
                                                            <div class="d-flex justify-content-between">
                                                                <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                            </div>
                                                            <div class="caption pull-right">
                                                                <form action="{{route('tiffin-bill.destroy',[$item])}}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn red"><i class="fa fa-trash"></i>Delete</button>               
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="editModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Update Employee Tiffin Bill</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('tiffin-bill.update', $item)}}">
                                                                {{csrf_field()}}
                                                                {{method_field('put')}}
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                                                    <div class="col-md-9">
                                                                        <div class="input-group input-5 date date-picker" id="datepicker" data-date-format="MM-yyyy">
                                                                            <input  type="text" class="form-control" value="{{$item->date}}" readonly="readonly" name="date" >    
                                                                            <span class="input-group-btn">
                                                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                                            </span>      
                                                                        </div> 
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label"> Name</label>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control " id="employee_id" name="employee_id">
                                                                            <option value="{{$item->user->id}}">{{$item->user->name}}</option>
                                                                            @foreach($users as $data)
                                                                                <option value="{{$data->id}}">{{$data->name}}</option>
                                                                            @endforeach
                                                                            {{csrf_field()}}
                                                                        </select>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Days</label>
                                                                    <div class="col-md-9">
                                                                        <input type="number" class="form-control" value="{{$item->days}}"  name="days">
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Rate</label>
                                                                    <div class="col-md-9">
                                                                        <input type="number" class="form-control" value="{{$item->rate}}"  name="rate">
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control" value="{{$item->remark}}" name="remark">
                                                                    </div><br><br>
                                                                </div><br>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                    
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            {{-- <div id="basic" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Tiffin Bill</h4>
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
            </div> --}}
        </div>
    </div>
    @endsection
    @section('script')
    <script src="https://cdn.tiny.cloud/1/i2a8bjsghb2egjws1cli2w9fcs5ke9j47f8jhfky1sq28f5q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(function() {
            tinymce.init({
                selector: 'textarea',
                init_instance_callback : function(editor) {
                    var freeTiny = document.querySelector('.tox .tox-notification--in');
                    freeTiny.style.display = 'none';
                }
            });
        });
        
      </script>
    @endsection