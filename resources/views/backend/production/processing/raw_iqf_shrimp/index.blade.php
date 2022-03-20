
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
                            <li style="margin-bottom:5px;" class="active"><a href="#hlso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">HLSO</a></li>
                            <li style="margin-bottom:5px;" ><a href="#pud" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">PUD</a></li>
                            <li style="margin-bottom:5px;"><a href="#pd_tail_on" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">P&D Tail on</a></li>
                            <li style="margin-bottom:5px;"><a href="#pd_tail_off" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">P&D Tail Off</a></li>
                            <li style="margin-bottom:5px;" ><a href="#special_cut" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">Special Cut P & D</a></li>
                            <li style="margin-bottom:5px;"><a href="#hlso_easy_peel" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">HLSO Easy Pell</a></li>
                            <li style="margin-bottom:5px;"><a href="#butterfly" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">Butterfly/PUD Skewer</a></li>
                            <li style="margin-bottom:5px;"><a href="#pud_pull_vein" style="text-align:center;border:2px solid #337AB7" data-toggle="pill">PUD Pull Vein</a></li>
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
    $(function() {
    });
    
  </script>
@endsection



