
@extends('backend.master')
@section('site-title')
    Semi IQF
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark"><b>Production Management</b>
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
                        <ul class="nav nav-pills nav-stacked col-md-2">
                            <li style="margin-bottom:5px;" class="active"><a href="#semi_hoso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HOSO</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#semi_hoto" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HOTO</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="semi_hoso">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>HOSO List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Invoice No.
                                            </th>
                                            <th>
                                                Item Name
                                            </th>
                                            <th>
                                                Grade
                                            </th>
                                            <th>
                                                Quantity 
                                            </th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1001
                                            </td>
                                            <td>
                                                Rui
                                            </td>
                                            <td>
                                                300-500gm
                                            </td>
                                            <td>
                                                60kg
                                            </td>
                                            <td>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_hoso" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_hoso" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockCounter_hoso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#excess_hoso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Excess Volume</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_hoso" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="semi_hoto">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>HOTO List</b>
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <hr>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Invoice No.
                                            </th>
                                            <th>
                                                Item Name
                                            </th>
                                            <th>
                                                Grade
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                            <th style="text-align: center">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                10001
                                            </td>
                                            <td>
                                                Rui
                                            </td>
                                            <td>
                                                300-500gm
                                            </td>
                                            <td>
                                                60kg
                                            </td>
                                            <td>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_hoto" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_hoto" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockCounter_hoto" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Block Counter</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#excess_hoto" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Excess Volume</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_hoto" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <!-------- HOSO Modals--------------->
                            @include('backend.production.processing.semi_iqf.modals.hoso.processData_hoso')
                            @include('backend.production.processing.semi_iqf.modals.hoso.grading_hoso')
                            @include('backend.production.processing.semi_iqf.modals.hoso.blockCounter_hoso')
                            @include('backend.production.processing.semi_iqf.modals.hoso.excess_hoso')
                            @include('backend.production.processing.semi_iqf.modals.hoso.WastageReturn_hoso')


                            <!-------------HOTO Modals---------------->
                            @include('backend.production.processing.semi_iqf.modals.hoto.processData_hoto')
                            @include('backend.production.processing.semi_iqf.modals.hoto.grading_hoto')
                            @include('backend.production.processing.semi_iqf.modals.hoto.blockCounter_hoto')
                            @include('backend.production.processing.semi_iqf.modals.hoto.excess_hoto')
                            @include('backend.production.processing.semi_iqf.modals.hoto.WastageReturn_hoto')    
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



