
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
            @if(Session::has('msg'))
                    <script>
                        $(document).ready(function(){
                            swal("{{Session::get('msg')}}","", "success");
                        });
                    </script>
                @endif
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
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#hlso_processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_grade' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.hlso_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.hlso_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.hlso_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_soaking' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_glazing' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.hlso_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.hlso_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
                }
        });
        $('.hlso').on("click",function() {
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
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#hlso_processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_grade' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.hlso_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.hlso_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.hlso_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_soaking' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.hlso_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.hlso_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_glazing' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.hlso_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hlso_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.hlso_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.pud').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_iqf_shrimp',
                    'sub_type' : 'pud',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#pud_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_pud' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grade_pud' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pud_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.pud_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.pud_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_pud' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pud_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pud_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_pud' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pud_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pud_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pud_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_pud' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pud_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pud_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.pd_tail_on').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_iqf_shrimp',
                    'sub_type' : 'p_n_d_tail_on',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#pd_tail_on_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#tail_on_processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#tail_on_grade' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pd_tail_on_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.pd_tail_on_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.pd_tail_on_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#tail_on_soaking' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pd_tail_on_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pd_tail_on_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_on_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#tail_on_glazing' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pd_tail_on_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_on_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_on_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pd_tail_on_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#tail_on_WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pd_tail_on_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_on_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_on_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.pd_tail_off').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_iqf_shrimp',
                    'sub_type' : 'p_n_d_tail_off',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#pd_tail_off_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#processData_tail_off' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#grade_tail_off' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pd_tail_off_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.pd_tail_off_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.pd_tail_off_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#soaking_tail_off' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pd_tail_off_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pd_tail_off_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_off_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#glazing_tail_off' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pd_tail_off_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_off_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_off_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pd_tail_off_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#WastageReturn_tail_off' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pd_tail_off_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pd_tail_off_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pd_tail_off_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.special_cut').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_iqf_shrimp',
                    'sub_type' : 'special_cut_p_n_d',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#special_cut_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#special_cut_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#special_cut_processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#special_cut_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#special_cut_grade' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.special_cut_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.special_cut_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.special_cut_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#special_cut_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#special_cut_soaking' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.special_cut_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.special_cut_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.special_cut_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#special_cut_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#special_cut_glazing' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.special_cut_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.special_cut_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.special_cut_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#special_cut_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#special_cut_WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.special_cut_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.special_cut_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.special_cut_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.hlso_easy_peel').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_iqf_shrimp',
                    'sub_type' : 'hlso_easy_pell',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#hlso_easy_peel_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#hlso_easy_peel_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#hlso_easy_processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#hlso_easy_peel_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_easy_grade' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.hlso_easy_peel_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.hlso_easy_peel_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.hlso_easy_peel_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#hlso_easy_peel_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_easy_soaking' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.hlso_easy_peel_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.hlso_easy_peel_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_easy_peel_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#hlso_easy_peel_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_easy_glazing' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.hlso_easy_peel_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_easy_peel_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_easy_peel_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#hlso_easy_peel_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#hlso_easy_WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.hlso_easy_peel_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.hlso_easy_peel_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.hlso_easy_peel_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.butterfly').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_iqf_shrimp',
                    'sub_type' : 'butterfly_pud_skewer',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#butterfly_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#butterfly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#butterfly_processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#butterfly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butterfly_grade' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.butterfly_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.butterfly_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.butterfly_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#butterfly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butterfly_soaking' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.butterfly_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.butterfly_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.butterfly_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#butterfly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butterfly_glazing' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.butterfly_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.butterfly_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.butterfly_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#butterfly_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#butterfly_WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.butterfly_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.butterfly_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.butterfly_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                    });
      
                }
        });
        });
        $('.pud_pull_vein').on("click",function() {
            // $(".fillet_tbody").empty();
            id = 'hlso';
            $.ajax({
                type:"POST",
                url:"{{route('production.processing-unit.iqf.data_pass')}}",
                data:{
                    'type' : 'raw_iqf_shrimp',
                    'sub_type' : 'pud_pull_vein',
                    'id' : id,
                    '_token' : $('input[name=_token]').val()
                },
                success:function(data){
                    console.log(data);
                    $("table#pud_pull_vein_table tbody tr").empty();
                    $.each( data, function( key, product ) {
                        var alive_quantity=0;
                        var dead_quantity =0;
                        var total_quantity=0;
                        if(product.alive_quantity){
                            alive_quantity = parseFloat(product.alive_quantity);
                        }
                        if(product.dead_quantity){
                            dead_quantity =  parseFloat(product.dead_quantity);
                        }
                        total_quantity = alive_quantity+dead_quantity;
                        if (product.status == "Initial") {
                            $("table#pud_pull_vein_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"' data-toggle='modal' href='#pud_pull_vein_processData' class='btn btn-success processing'><i class='fa fa-refresh' aria-hidden='true'></i> Processing Data</button></td></tr>");
                            // $('.fillet_invoice').html(product.requisition_code);
                            // $('.fillet_item').html(product.production_processing_item.name);
                            // $('.fillet_qty').html(total_quantity);
                            $('.processing').click(function () {
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $('.initial_weight').on("change keyup",function() {
                                    var a = $(this).val();
                                    var p = (((total_quantity - a)/total_quantity)*100);
                                    p = p.toFixed(2);
                                    $('.parcentage').html(p+'%');
                                });
                            });
                            
                        }
                        if (product.status == "Grading") {
                            $("table#pud_pull_vein_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pud_pull_vein_grade' class='btn btn-primary grading'  data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Grading</button></td></tr>");
                            $('.grading').click(function () {
                                $("table.pud_pull_vein_grading_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
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
                                    $("table.pud_pull_vein_grading_table tbody tr").empty();
                                    product_array.push({"grade_id":grade_id,"grade_name":grade_name,"grade_weight":grade_weight});
                                    $.each( product_array, function( key, product ) {
                                        $("table.pud_pull_vein_grading_table tr").last().after("<tr><td>"+product.grade_name+"</td><td>"+product.grade_weight+"</td></tr>");
                                    });
                                    $(".inputs").val('');
                                    $(".inputs").val(JSON.stringify(product_array));
                                    $('.grade_weight').val(0);
                                    $('.grade_select').val("--select--");
                                })
                            });

                        }
                        if (product.status == "Soaking") {
                            $("table#pud_pull_vein_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pud_pull_vein_soaking' class='btn btn-warning soaking' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Soaking</button></td></tr>");
                            $('.soaking').click(function () {
                                $("table.pud_pull_vein_soaking_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.soaking.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        // console.log(data);
                                        $("table.pud_pull_vein_soaking_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_pull_vein_soaking_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td><input type='number' step='0.01' class='form-control' name='soaking_weight[]' value='"+product.soaking_weight+"' placeholder='Soaking Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td><td><input type='number' step='0.01' class='form-control' name='return_weight[]' value='"+product.soaking_return+"' placeholder='Return Weight'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "Glazing") {
                            $("table#pud_pull_vein_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pud_pull_vein_glazing' class='btn btn-info glazing' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-refresh' aria-hidden='true'></i> Glazing</button></td></tr>");
                            $('.glazing').click(function () {
                                $("table.pud_pull_vein_glazing_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.glazing.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pud_pull_vein_glazing_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_pull_vein_glazing_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td><input type='number' step='0.01' class='form-control' name='glazing_weight[]' value='"+product.glazing_weight+"' placeholder='type glazing Weight'><input type='hidden' name='item_id[]' value='"+product.id+"'></td></tr>");
                                        });
                                    }
                                });
                            });
                        }
                        if (product.status == "RandW") {
                            $("table#pud_pull_vein_table tr").last().after("<tr id='"+key+"'><td>"+product.requisition_code+"</td><td>"+product.production_processing_item.name+"</td><td>"+product.production_processing_item.grade.name+"</td><td>"+total_quantity+"kg</td><td><button style='margin-bottom:3px' data-toggle='modal' href='#pud_pull_vein_WastageReturn' class='btn btn-danger randw' data-ppu_id='"+product.id+"' data-invoice='"+product.requisition_code+"' data-item='"+product.production_processing_item.name+"' data-qty='"+total_quantity+"'><i class='fa fa-repeat' aria-hidden='true'></i> Return & Wastage</button></td></tr>");
                            $('.randw').click(function () {
                                $("table.pud_pull_vein_randw_table tbody tr").empty();
                                var invoice = $(this).attr("data-invoice");
                                var item = $(this).attr("data-item");
                                var qty = $(this).attr("data-qty");
                                var ppu_id =  $(this).attr("data-ppu_id");
                                console.log(ppu_id);
                                $('.invoice').html(invoice);
                                $('.item').html(item);
                                $('.qty').html((qty));
                                $('.ppu_id').val(ppu_id);
                                $.ajax({
                                    type:"POST",
                                    url:"{{route('production.processing-unit.randw.data_pass')}}",
                                    data:{
                                        'id' : ppu_id,
                                        '_token' : $('input[name=_token]').val()
                                    },
                                    success:function(data){
                                        console.log(data);
                                        $("table.pud_pull_vein_randw_table tbody tr").empty();
                                        $.each( data, function( key, product ) {
                                            $("table.pud_pull_vein_randw_table tr").last().after("<tr id='"+key+"'><td>"+product.grade_name+"</td><td>"+product.grade_quantity+"</td><td>"+product.soaking_weight+"</td><td>"+product.soaking_return+"</td><td>"+product.glazing_weight+"</td></tr>");
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



