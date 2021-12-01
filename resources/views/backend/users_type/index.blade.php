
@extends('backend.master')
@section('site-title')
   User List
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Create User
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
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="portlet box blue-chambray">
                                    <div class="portlet-title">
                                    <div class="caption">
                                    <i class="fa fa-briefcase"></i>User List
                                    </div>
                                        <div class="caption pull-right">
                                            <a class="btn green-meadow pull-right" data-toggle="modal" href="{{route('user-type.create')}}">
                                                Add New user
                                            <i class="fa fa-plus"></i> </a>
                                        </div>
                                        <div class="tools">
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($users as $key=> $data)
                                                        <tr id="row1">
                                                            <td class="text-align: center;"> {{$data->name}}</td>
                                                            <td>
                                                                <a class="btn red-flamingo"  data-toggle="modal" href="#editModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
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
                                                                            <form action="{{route('user-type.destroy',[$data->id])}}" method="POST">
                                                                                @method('DELETE')
                                                                                @csrf
                                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                                            </form>
                                                                        </div>
                                                                        <!-- <a type="submit" href="{{route('user-type.destroy',$data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> -->
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="editModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <h4 class="modal-title">Update User</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal" role="form" method="post" action="{{route('user-type.update', $data->id)}}">
                                                                            {{csrf_field()}}
                                                                            {{method_field('put')}}

                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="inputEmail1" class="col-md-2 control-label">User Name</label>
                                                                                <div class="col-md-8">
                                                                                    <input type="text" class="form-control" value="{{$data->name}}" required name="name">
                                                                                </div>
                                                                            </div>
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
            </div> 
        </div>
    </div>
@endsection

