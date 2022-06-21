@extends('backend.master')
@section('site-title')
    Holiday List
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
                    });
                </script>
        @endif
        <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Holiday Management
                <div class="pull-right"><a class="btn grey-mint" data-toggle="modal" href="#static">
                        Add Holidays
                        <i class="fa fa-plus"></i> </a>
                </div>
            </h3>
            <!-- END PAGE TITLE-->
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
            <hr>
            <div class="row">
                {{-- <div class="col-md-3">
                    <ul class="ver-inline-menu tabbable margin-bottom-10">
                        @foreach($months as $data)
                            <li  >
                                <a id="holiday" data-toggle="tab" href="#{{ $data }}">
                                    <i class="fa fa-calendar"></i> {{ $data }} </a>
                                <span class="after">
                            </span>
                            </li>
                            {{csrf_field()}}
                        @endforeach
                    </ul>
                </div> --}}
                <div class="col-md-12">
                    <div class="portlet box grey-mint">
                        <div class="portlet-body">
                            <div class="table-scrollable" >
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                    <tr>
                                        <th>S.l</th>
                                        <th> Name </th>
                                        <th> Date </th>
                                        <th> Description </th>
                                        <th> Remark </th>
                                        <th style="text-align: center"> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($holidays as $key => $item)
                                        <tr>
                                            <td>{{++ $key}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->remark}}</td>
                                            <td style="text-align: center">
                                                <a class="btn btn-info" data-toggle="modal" href="#editModal{{$item->id}}">Edit</a>
                                                <a class="btn btn-danger" data-toggle="modal" href="#deleteModal{{$item->id}}">Delete</a>
                                            </td>
                                        </tr>
                                        <div id="deleteModal{{$item->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <form action="{{route('holiday.delete',[$item->id])}}" method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
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
                                                        <h4 class="modal-title">Update Pack</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="form-horizontal" role="form" method="post" action="{{route('holiday.update', $item->id)}}">
                                                            {{csrf_field()}}
                                                            {{method_field('put')}}
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$item->name}}" required name="name">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                                                <div class="col-md-8">
                                                                    <input type="date" class="form-control" value="{{$item->date}}" required name="date">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Description</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$item->description}}" required name="description">
                                                                </div><br><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                <div class="col-md-8">
                                                                    <input type="text" class="form-control" value="{{$item->remark}}" required name="remark">
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
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title"><strong>Holidays</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="portlet-body form">
                                <!-- BEGIN FORM-->
                                <form method="POST" action="{{route('holiday.post')}}" class="form-horizontal ">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                
                                                <label class="control-label"> Date<span class="required">* </span></label>
                                                <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                    <input type="text" class="form-control"  name="date" required>
                                                    <span class="input-group-btn">
                                                     <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                     </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="control-label">Name<span class="required">* </span></label>
                                                <input class="form-control form-control-inline"  type="text" name="name" required placeholder="Name" required/>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="control-label">Description<span class="required">* </span></label>
                                                <input class="form-control form-control-inline"  type="text" name="description" required placeholder="Description" required/>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Remark</label>
                                                <input class="form-control form-control-inline"  type="text" name="remark" required placeholder="Remark"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button type="submit" data-loading-text="Submitting..." class="demo-loading-btn btn btn-info"><i class="fa fa-check"></i> Submit</button>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END CONTENT -->
@endsection
