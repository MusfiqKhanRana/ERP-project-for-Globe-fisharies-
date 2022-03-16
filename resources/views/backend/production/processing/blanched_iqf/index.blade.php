
@extends('backend.master')
@section('site-title')
    Blanched IQF 
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
                            <li style="margin-bottom:5px;" class="active"><a href="#hlso_blanched" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#pud_blanched" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#p_d_tail_on_blanched" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail on</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#p_d_tail_off_blanched" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail Off</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="hlso_blanched">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>HLSO List</b>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_hlso" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_hlso" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_hlso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_hlso" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_hlso" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="pud_blanched">
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
                            <div class="tab-pane" id="p_d_tail_on_blanched">
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
                            <div class="tab-pane" id="p_d_tail_off_blanched">
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

                            <!----  HLSO Modals----->
                            @include('backend.production.processing.blanched_iqf.modals.hlso.processData_hlso')
                            @include('backend.production.processing.blanched_iqf.modals.hlso.grading_hlso')
                            @include('backend.production.processing.blanched_iqf.modals.hlso.soaking_hlso')
                            @include('backend.production.processing.blanched_iqf.modals.hlso.glazing_hlso')
                            @include('backend.production.processing.blanched_iqf.modals.hlso.WastageReturn_hlso')
                            
                           
                            <!----  PUD Modals----->
                            @include('backend.production.processing.blanched_iqf.modals.pud.processData_pud')
                            @include('backend.production.processing.blanched_iqf.modals.pud.grading_pud')
                            @include('backend.production.processing.blanched_iqf.modals.pud.soaking_pud')
                            @include('backend.production.processing.blanched_iqf.modals.pud.glazing_pud')
                            @include('backend.production.processing.blanched_iqf.modals.pud.WastageReturn_pud')
                            
                            <!----  P & D Tail on Modals----->
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.processData_p_d_tail_on')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.grading_p_d_tail_on')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.soaking_p_d_tail_on')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.glazing_p_d_tail_on')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_on.WastageReturn_p_d_tail_on')


                            <!----  P & D Tail Off Modals----->
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.processData_p_d_tail_off')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.grading_p_d_tail_off')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.soaking_p_d_tail_off')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.glazing_p_d_tail_off')
                            @include('backend.production.processing.blanched_iqf.modals.p_d_tail_off.WastageReturn_p_d_tail_off')
                                 
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



