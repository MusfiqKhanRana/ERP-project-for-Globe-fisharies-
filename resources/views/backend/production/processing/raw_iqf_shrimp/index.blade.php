
@extends('backend.master')
@section('site-title')
    Raw IQF Shrimp
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
                        {{-- <ul class="nav nav-pills nav-stacked col-md-2">
                            <li style="margin-bottom:5px;" class="active"><a href="#hlso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#pud" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tailon" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail Off</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tailoff" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D Tail Off</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#specialcut" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Special Cut P & D</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#easypeel" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO Easy Peel</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#butterfly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Butterfly/PUD Skewer</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#vein" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD Pull Vein</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                                @include('backend.production.processing.raw_iqf_shrimp.hlso.index')
                                @include('backend.production.processing.raw_iqf_shrimp.pud.index')
                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.index')
                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.index')
                                @include('backend.production.processing.raw_iqf_shrimp.special_cut.index')
                                @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.index')
                                @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.index')
                                @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.index')
                        </div> --}}
                        <ul class="nav nav-pills nav-stacked col-md-2">
                            <li style="margin-bottom:5px;" class="active"><a href="#hlso" class="hlso"  style="text-align:center;border:2px solid #337AB7" data-toggle="pill">HLSO({{$hlso}})</a></li>
                            <li style="margin-bottom:5px;" ><a href="#pud" class="pud" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">PUD({{$pud}})</a></li>
                            <li style="margin-bottom:5px;"><a href="#pd_tail_on" class="pd_tail_on" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">P&D Tail on({{$p_n_d_tail_on}})</a></li>
                            <li style="margin-bottom:5px;"><a href="#pd_tail_off" class="pd_tail_off" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">P&D Tail Off({{$p_n_d_tail_off}})</a></li>
                            <li style="margin-bottom:5px;" ><a href="#special_cut" class="special_cut" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">Special Cut P & D({{$special_cut_p_n_d}})</a></li>
                            <li style="margin-bottom:5px;"><a href="#hlso_easy_peel" class="hlso_easy_peel" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">HLSO Easy Pell({{$hlso_easy_pell}})</a></li>
                            <li style="margin-bottom:5px;"><a href="#butterfly" class="butterfly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">Butterfly/PUD Skewer({{$butterfly_pud_skewer}})</a></li>
                            <li style="margin-bottom:5px;"><a href="#pud_pull_vein" class="pud_pull_vein" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">PUD Pull Vein({{$pud_pull_vein}})</a></li>
                        </ul>
                        <div class="tab-content col-md-10">
                            <div class="tab-pane active" id="hlso">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">HLSO</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="hlso_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.hlso_processData')
                                @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.hlso_grade')
                                @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.hlso_soaking')
                                @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.hlso_glazing')
                                @include('backend.production.processing.raw_iqf_shrimp.hlso.modals.hlso_WastageReturn')
                                
                                
                                
                                
                                
                            </div>
                            <div class="tab-pane" id="pud">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">PUD</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="pud_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_pud" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade_pud" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_pud" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_pud" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_pud" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_iqf_shrimp.pud.modals.processData_pud')
                                                @include('backend.production.processing.raw_iqf_shrimp.pud.modals.grade_pud')
                                                @include('backend.production.processing.raw_iqf_shrimp.pud.modals.soaking_pud')
                                                @include('backend.production.processing.raw_iqf_shrimp.pud.modals.glazing_pud')
                                                @include('backend.production.processing.raw_iqf_shrimp.pud.modals.WastageReturn_pud')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pd_tail_on"> 
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">P&D Tail On</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="pd_tail_on_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#tail_on_processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#tail_on_grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#tail_on_soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#tail_on_glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#tail_on_WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.processData_tail_on')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.grade_tail_on')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.soaking_tail_on')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.glazing_tail_on')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_on.modals.WastageReturn_tail_on')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pd_tail_off">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">P&D Tail Off</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="pd_tail_off_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_tail_off" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade_tail_off" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking_tail_off" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing_tail_off" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_tail_off" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.processData_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.grade_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.soaking_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.glazing_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.WastageReturn_tail_off')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="special_cut">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">Special Cut P & D</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="special_cut_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#special_cut_processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#special_cut_grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#special_cut_soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#special_cut_glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#special_cut_WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                
                                                
                                                
                                                
                                                @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.special_cut_processData')
                                                @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.special_cut_grade')
                                                @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.special_cut_soaking')
                                                @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.special_cut_glazing')
                                                @include('backend.production.processing.raw_iqf_shrimp.special_cut.modals.special_cut_WastageReturn')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="hlso_easy_peel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">HLSO Easy Pell</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="hlso_easy_peel_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_easy_processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_easy_grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_easy_soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_easy_glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlso_easy_WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.hlso_easy_processData')
                                                @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.hlso_easy_grade')
                                                @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.hlso_easy_soaking')
                                                @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.hlso_easy_glazing')
                                                @include('backend.production.processing.raw_iqf_shrimp.hlso_easy_peel.modals.hlso_easy_WastageReturn')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="butterfly">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">Butterfly/PUD Skewer</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="butterfly_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#butterfly_processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#butterfly_grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#butterfly_soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#butterfly_glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#butterfly_WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.butterfly_processData')
                                                @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.butterfly_grade')
                                                @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.butterfly_soaking')
                                                @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.butterfly_glazing')
                                                @include('backend.production.processing.raw_iqf_shrimp.butterfly_pud_skewer.modals.butterfly_WastageReturn')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pud_pull_vein">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">PUD Pull Vein</h2> 
                                            </div>
                                            <div class="panel-body">
                                                <table class="table table-striped table-bordered table-hover" id="pud_pull_vein_table">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pud_pull_vein_processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pud_pull_vein_grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pud_pull_vein_soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pud_pull_vein_glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pud_pull_vein_WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.pud_pull_vein_processData')
                                                @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.pud_pull_vein_grade')
                                                @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.pud_pull_vein_soaking')
                                                @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.pud_pull_vein_glazing')
                                                @include('backend.production.processing.raw_iqf_shrimp.pdu_pull_vein.modals.pud_pull_vein_WastageReturn')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
     $(document).ready(function()
    {
        // $(".fillet_tbody").empty();
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_iqf_shrimp',
                    'sub_type' : 'hlso',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#hlso_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        if (product.status == "Initial") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#hlso_processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html((product.alive_quantity+product.dead_quantity));
                            $('.processing').click(function () {
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((product.alive_quantity+product.dead_quantity) - a)/(product.alive_quantity+product.dead_quantity))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletGradingModal' class='btn btn-primary iqf_grading'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.iqf_grading').click(function () {
                                $("table.fillet_grading_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.grade_ppu_id').val(ppu_id);
                                var product_array = [];
                                var grade_id , grade_name ,grade_weight = null; 
                                $('.grade_select').change(function() {
                                    grade_id=$('option:selected',this).val();
                                    grade_name =$('option:selected',this).attr("data-grade_name");
                                    console.log(grade_name);
                                });
                                $('.grade_weight').on("change keyup",function() {
                                    grade_weight = $(this).val();
                                });
                                $('.add_btn').click(function () {
                                    $("table.fillet_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.fillet_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletSoakingModal' class='btn btn-warning iqf_soaking' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.iqf_soaking').click(function () {
                                $("table.fillet_soaking_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.soaking_ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.fillet_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='text' class='form-control' name='soaking_weight[]' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='text' class='form-control' name='return_weight[]' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletGlazingModal' class='btn btn-info iqf_glazing' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.fillet_glazing_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.fillet_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='text' class='form-control' name='glazing_weight[]' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletReturnModal' class='btn btn-danger iqf_randw' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.fillet_randw_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.fillet_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        $('.fillet').on("load click",function() {
            // $(".fillet_tbody").empty();
            var id =null;
            id = $(this).attr("data-id");
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'iqf',
                    'sub_type' : 'fillet',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    // console.log(data);
                    $("table#fillet_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        if (product.status == "Initial") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"' data-toggle='modal' href='#filletProcessingDataModal' class='btn btn-success fillet_processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html((product.alive_quantity+product.dead_quantity));
                            $('.fillet_processing').click(function () {
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = ((((product.alive_quantity+product.dead_quantity) - a)/(product.alive_quantity+product.dead_quantity))*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletGradingModal' class='btn btn-primary iqf_grading'  data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.iqf_grading').click(function () {
                                $("table.fillet_grading_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.grade_ppu_id').val(ppu_id);
                                var product_array = [];
                                var grade_id , grade_name ,grade_weight = null; 
                                $('.grade_select').change(function() {
                                    grade_id=$('option:selected',this).val();
                                    grade_name =$('option:selected',this).attr("data-grade_name");
                                    console.log(grade_name);
                                });
                                $('.grade_weight').on("change keyup",function() {
                                    grade_weight = $(this).val();
                                });
                                $('.add_btn').click(function () {
                                    $("table.fillet_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.fillet_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletSoakingModal' class='btn btn-warning iqf_soaking' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.iqf_soaking').click(function () {
                                $("table.fillet_soaking_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.soaking_ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.fillet_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='text' class='form-control' name='soaking_weight[]' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='text' class='form-control' name='return_weight[]' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletGlazingModal' class='btn btn-info iqf_glazing' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.iqf_glazing').click(function () {
                                $("table.fillet_glazing_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.glazing_ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.fillet_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='text' class='form-control' name='glazing_weight[]' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#fillet_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+(product.alive_quantity+product.dead_quantity)+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#filletReturnModal' class='btn btn-danger iqf_randw' data-ppu_id='"+product.id+"' data-fillet_invoice='"+product.requisition_code+"' data-fillet_item='"+product.production_processing_item.name+"' data-fillet_qty='"+(product.alive_quantity+product.dead_quantity)+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.iqf_randw').click(function () {
                                $("table.fillet_randw_table tbody tr").empty();
                                var fillet_invoice = $(this).attr("data-fillet_invoice");
                                var fillet_item = $(this).attr("data-fillet_item");
                                var fillet_qty = $(this).attr("data-fillet_qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.fillet_invoice').html(fillet_invoice);
                                $('.fillet_item').html(fillet_item);
                                $('.fillet_qty').html((fillet_qty));
                                $('.randw_ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.fillet_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.fillet_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        });
    });
    
  </script>
@endsection



