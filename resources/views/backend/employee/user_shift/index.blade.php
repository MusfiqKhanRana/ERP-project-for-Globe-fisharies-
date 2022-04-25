@extends('backend.master')
@section('site-title')
  User Shift List
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
                <small>Employee User Shift</small>
                {{-- <div class="form-group" style="margin-left: 10%">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div> --}}
                <a class="btn blue-ebonyclay pull-right" href="{{route('user-shift.create')}}">
                    Add User Shift 
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
                                <i class="fa fa-briefcase"></i>User Shift List
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
                                                sl
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Entry Time
                                            </th>
                                            <th>
                                                Delay Time
                                            </th>
                                            <th>
                                                Late Time
                                            </th>
                                            <th>
                                                Out Time
                                            </th>
                                            <th>
                                                Over Time
                                            </th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user_shifts as $key=> $data)
                                        <tr>
                                            <td>{{++ $key}}</td>
                                            <td>
                                                {{$data->name}}
                                            </td>
                                            <td>
                                                {{$data->entry_time}}
                                            </td>
                                            <td>
                                                {{$data->delay_time}}
                                            </td>
                                            <td>
                                                {{$data->late_time}}
                                            </td>
                                            <td>
                                                {{$data->out_time}}
                                            </td>
                                            <td>
                                                {{$data->over_time}}
                                            </td>
                                            <td>
                                                <a class="btn btn-info"  data-toggle="modal" href="#editModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                        <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <form action="{{route('user-shift.destroy',[$data->id])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h4 class="modal-title">Update User Shift</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="post" action="{{route('user-shift.update', $data->id)}}">
                                                            {{csrf_field()}}
                                                            {{method_field('put')}}
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$data->name}}" name="name">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Entry Time</label>
                                                                <div class="col-md-8">
                                                                    <input type="time" class="form-control" value="{{$data->entry_time}}" name="entry_time">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Delay Time</label>
                                                                <div class="col-md-8">
                                                                    <input type="time" class="form-control" value="{{$data->delay_time}}" name="delay_time">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Late Time</label>
                                                                <div class="col-md-8">
                                                                    <input type="time" class="form-control" value="{{$data->late_time}}" name="late_time">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Out Time</label>
                                                                <div class="col-md-8">
                                                                    <input type="time" class="form-control" value="{{$data->out_time}}" name="out_time">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Over Time</label>
                                                                <div class="col-md-8">
                                                                    <input type="time" class="form-control" value="{{$data->over_time}}" name="over_time">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                            </div>
                                                        </form>
                
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
@endsection