
@extends('backend.master')
@section('site-title')
   Edit User
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet-body" style="height: auto;">
                    <form action="{{route('user-type.update', $user-type->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('put')}}
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet-body">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Employee ID<span class="required">* </span></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="user_id" placeholder="User ID" value="{{-- $user-type->id --}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user-type->name }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-plus"></i>	Submit </button>
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

