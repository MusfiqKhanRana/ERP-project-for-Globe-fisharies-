
@extends('backend.master')
@section('site-title')
    Medicine Report
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark">Create Medicine Report
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
                        <form method="post" action="{{route('medical_report.store')}}" class="form-horizontal">
                            {{csrf_field()}}
                            <div class="col-md-12 ">
                                <div class="portlet-body">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Date</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" name="date" value="">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="col-md-3 control-label">Employee Code</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="employee_code" placeholder="Type Employee Code" value="">
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User Name</label>
                                            <div class="col-md-9">
                                                <select class="form-control " id="user_id" name="user_id">
                                                    <option value="">--Select--</option>
                                                    @foreach($users as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                    {{csrf_field()}}
                                                </select>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="col-md-3 control-label">Age</span></label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="age" placeholder="Type Age" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Designation</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="designation" placeholder="Type Designation" value="">
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">C/Complain</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="complain" placeholder="Type Complain" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Dressing</label>
                                            <div class="col-md-9">
                                                <select  class="form-control" name="dressing" id="dressing">
                                                    <option>--Select--</option>
                                                    <option value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Medicine Details</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" name="medicine_details" placeholder="Type Medicine Name" value=""></textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label class="col-md-3 control-label">Medicine Schedule</label>
                                            <div class="col-md-9">
                                                <select  class="form-control" name="medicine_schedule" id="medicine_schedule">
                                                    <option value="1 + 1 + 1">1 + 1 + 1</option>
                                                    <option value="1 + 0 + 1">1 + 0 + 1</option>
                                                    <option value="0 + 1 + 1">0 + 1 + 1</option>
                                                    <option value="1 + 0 + 0">1 + 0 + 0</option>
                                                    <option value="0 + 0 + 1">0 + 0 + 1</option>
                                                    <option value="0 + 1 + 0">0 + 1 + 0</option>
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="col-md-2 pull-right">
                                        <button type="submit" data-loading-text="Submitting..." class="col-md-12 btn btn btn-info">
                                        <i class="fa fa-plus"></i>  Submit</button>
                                    </div>
                                    <div class="row"><div class=" pull-right ">
                                        <a class="col-md-12 btn btn dark" href="{{route("medical_report.index")}}">
                                        <i class="fa fa-backward"></i>  Back</a>
                                    </div>
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



