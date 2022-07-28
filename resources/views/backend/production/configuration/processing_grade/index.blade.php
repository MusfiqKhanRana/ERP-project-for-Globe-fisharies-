
@extends('backend.master')
@section('site-title')
   Processing Confiq
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Configuration Page
            </h3>
            <hr>
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
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Grade List
                </div>
                    <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#addGradeModal">
                            Add New Grade
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
                                <th>Serial</th>
                                <th>Name</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($p_grade as $key=> $data)
                                    <tr id="row1">
                                        <td>{{ ++ $key }}</td>
                                        <td class="text-align: center;"> {{$data->grade_name}}</td>
                                        <td style="text-align: center">
                                            <a class="btn btn-info"  data-toggle="modal" href="#editGradeModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                            <a class="btn red" data-toggle="modal" href="#deleteGradeModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <div id="deleteGradeModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                        <form action="{{route('processing-grade.destroy',[$data->id])}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editGradeModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update Grade</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{route('processing-grade.update', $data->id)}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="{{$data->grade_name}}" required name="grade_name">
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
                <div id="addGradeModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Grade</h4>
                            </div><br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('processing-grade.store')}}">
                                {{csrf_field()}}
            
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="Grade Name">
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