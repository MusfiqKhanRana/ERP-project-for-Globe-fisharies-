
@extends('backend.master')
@section('site-title')
    Cooked IQF
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark"><b>Production Management</b>
                <small>Cooked IQF</small>
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
                            <li style="margin-bottom:5px;" class="active"><a href="#cooked_hoso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HOSO</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cooked_pud" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cooked_p_d_tail_on" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail on</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#cooked_p_d_tail_off" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail Off</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="cooked_hoso">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_hoso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_hoso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_hoso" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="cooked_pud">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>PUD List</b>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_pud" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_pud" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_pud" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_pud" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_pud" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="cooked_p_d_tail_on">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>P & D Tail On List</b>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_p_d_tail_on" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_p_d_tail_on" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_p_d_tail_on" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_p_d_tail_on" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_p_d_tail_on" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="cooked_p_d_tail_off">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>P & D Tail Off List</b>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_p_d_tail_off" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_p_d_tail_off" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_p_d_tail_off" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_p_d_tail_off" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_p_d_tail_off" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!--------HOSO Modals-------->
                            @include('backend.production.processing.cooked_iqf.modals.hoso.processData_hoso')
                            @include('backend.production.processing.cooked_iqf.modals.hoso.grading_hoso')
                            @include('backend.production.processing.cooked_iqf.modals.hoso.soaking_hoso')
                            @include('backend.production.processing.cooked_iqf.modals.hoso.glazing_hoso')
                            @include('backend.production.processing.cooked_iqf.modals.hoso.WastageReturn_hoso')

                            <!--------PUD Modals-------->
                            @include('backend.production.processing.cooked_iqf.modals.pud.processData_pud')
                            @include('backend.production.processing.cooked_iqf.modals.pud.grading_pud')
                            @include('backend.production.processing.cooked_iqf.modals.pud.soaking_pud')
                            @include('backend.production.processing.cooked_iqf.modals.pud.glazing_pud')
                            @include('backend.production.processing.cooked_iqf.modals.pud.WastageReturn_pud')

                            <!--------P & D Tail On Modals-------->
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.processData_p_d_tail_on')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.grading_p_d_tail_on')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.soaking_p_d_tail_on')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.glazing_p_d_tail_on')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_on.WastageReturn_p_d_tail_on')

                            <!--------P & D Tail Off Modals-------->
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.processData_p_d_tail_off')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.grading_p_d_tail_off')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.soaking_p_d_tail_off')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.glazing_p_d_tail_off')
                            @include('backend.production.processing.cooked_iqf.modals.p_d_tail_off.WastageReturn_p_d_tail_off')       
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



