
@extends('backend.master')
@section('site-title')
    User Shift
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title bold form-inline">HR Management
                <small>Employee User Shift </small>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Create User Shift
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body" style="height: auto;">
                            <form class="form-horizontal" role="form" method="post" action="{{route('user-shift.store')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Name<span class="required">* </span></label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" placeholder="Type Shift Name" id="name" name="name"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Entry Time<span class="required">* </span></label>
                                    <div class="col-md-10">
                                        <input type="time" class="form-control" id="entry_time" name="entry_time">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Delay Time<span class="required">* </span></label>
                                    <div class="col-md-10">
                                        <input type="time" class="form-control" id="delay_time" name="delay_time">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Late Time<span class="required">* </span></label>
                                    <div class="col-md-10">
                                        <input type="time" class="form-control"id="late_time" name="late_time">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Out Time<span class="required">* </span></label>
                                    <div class="col-md-10">
                                        <input type="time" class="form-control" id="out_time" name="out_time">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Over Time<span class="required">* </span></label>
                                    <div class="col-md-10">
                                        <input type="time" class="form-control" id="over_time" name="over_time">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="col-md-2 pull-right">
                                        <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-plus"></i>  Submit</button>
                                    </div>
                                    <div class="row"><div class=" pull-right ">
                                        <a class="col-md-12 btn btn dark" href="{{route("user-shift.index")}}">
                                        <i class="fa fa-backward"></i>  Back</a>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

@endsection



