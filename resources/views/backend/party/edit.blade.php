
@extends('backend.master')
@section('site-title')
 Edit Party
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Edit Party
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
                        <form class="form-horizontal" role="form" action="{{route('party.update',$data->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Party Code</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{$data->party_code}}" required name="party_code">
                                    </div>
                                </div>
                            </div><br><br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Party Name</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{$data->party_name}}" required name="party_name">
                                    </div>
                                </div>
                            </div><br><br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Phone</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{$data->phone}}" required name="phone">
                                    </div>
                                </div>
                            </div><br><br><br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label"> Address</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" value="{{$data->address}}" required name="address">
                                    </div>
                                </div>
                            </div><br><br><br>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                            </div><br><br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

