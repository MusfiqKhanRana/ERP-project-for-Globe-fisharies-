
@extends('backend.master')
@section('site-title')
Bonus Records
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Employee Bonus Records
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
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Employee Bonus List
                </div>
                    <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#addModal">
                            Add New Records
                        <i class="fa fa-plus"></i> </a>
                    </div>
                    <div class="tools">
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Bonus Id</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Bonus Category</th>
                                <th>Remark</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($bonus as $key=> $data)
                                    <tr id="row1">
                                        <td>{{ $data->id }}</td>
                                        <td class="text-align: center;"> {{--$data->date--}}</td>
                                        <td class="text-align: center;"> {{--$data->replace_record--}}</td>
                                        <td class="text-align: center;"> {{--$data->frozen--}}</td>
                                        <td class="text-align: center;"> {{--$data->bayer--}}</td>
                                        <td class="text-align: center;"> {{--$data->manager--}}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-info"  data-toggle="modal" href="#editModal{{--$data->id--}}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn red" data-toggle="modal" href="#deleteModal{{--$data->id--}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    {{-- <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                        <form action="{{route('production_test.destroy',[$data->id])}}" method="POST">
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
                                                    <h4 class="modal-title">Update Production Test</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('production_test.update', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                                                <input type="text" class="form-control" value="{{$data->date}}" required name="date">
                                                            </div>
                                                        </div>
                                                      
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="col-md-4 control-label">Replacement Record</label>
                                                                <input type="text" class="form-control" value="{{$data->replace_record}}" name="replace_record" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Frozen or Opent</label>
                                                                <input type="text" class="form-control" value="{{$data->frozen}}" name="frozen" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Bayer</label>
                                                                <input type="text" class="form-control" value="{{$data->bayer}}" name="bayer" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Manager</label>
                                                                <input type="text" class="form-control" value="{{$data->manager}}" name="manager" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                <textarea type="text" class="form-control" value="{{$data->remark}}" required name="remark"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label  for="inputEmail1" class="col-md-2 control-label">Description</label>
                                                                <textarea type="text" class="form-control"  value="{{$data->description}}" name="description" ></textarea>
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
                                    </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="addModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Test</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('bonus.store')}}">
                                {{csrf_field()}}
            
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Date</label>
                                    <div class="col-md-8">
                                        <input type="date" class="form-control" name="date" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Name</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" name="user_id" placeholder="Type Description" value=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Amount</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="amount" placeholder="Type Replacement Record"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Bonus Category</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="bonus_category" placeholder="Type Frozen or Opent" >
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                    <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
