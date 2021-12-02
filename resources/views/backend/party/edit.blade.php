
@extends('backend.master')
@section('site-title')
   Create Party
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Create Party
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
                    <form method="post" action="{{route('party.store')}}" class="form-horizontal">
                        {{csrf_field()}}
                        <div class="col-md-12 ">
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Name</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user-type->name }}">
                                                </div>
                                            </div>
                                        <label class="col-md-3 control-label">ID</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_id" placeholder="Party ID" value="{{$parties->id}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Code</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_code" placeholder="Party Code" value="{{$parties->party_code}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Name</span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_name" placeholder="Party Name" value="{{$parties->party_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Type</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_type" value="{{$parties->party_type}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Party Short Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="party_short_name" placeholder="Party Short Name" value="{{$parties->party_short_name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-plus"></i>	Update </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

