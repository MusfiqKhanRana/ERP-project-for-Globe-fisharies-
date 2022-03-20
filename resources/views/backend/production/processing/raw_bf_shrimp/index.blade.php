
@extends('backend.master')
@section('site-title')
    RAW BF Shrimp
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
                            <li style="margin-bottom:5px;" class="active"><a href="#hlso" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#pud" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#p_n_d" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P & D</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#pdto" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PDTO</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#pto" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PTO</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#hlsoReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.hlso.hlsoReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pudReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pud.pudReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="p_n_d">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">P & D List</h2> 
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
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                11111
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#p_n_dReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.p_n_d.p_n_dReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pdto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">P & D Tail On List</h2> 
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
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                11111
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#pdtoReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pdto.pdtoReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="pto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-default">
                                            <div class="panel-header">
                                                <h2 style="margin-left: 2%">P & D Tail Off List</h2> 
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
                                                            <th>
                                                                Action
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                11111
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
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoGradingModal" class="btn btn-primary"><i class="fa fa-list-ol" aria-hidden="true"></i> Grading</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoBlockCounterModal" class="btn purple"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoSoakingModal" class="btn btn-warning"><i class="fa fa-superpowers" aria-hidden="true"></i> Soaking</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoExcessVolumeModal" class="btn btn-info"><i class="fa fa-expand" aria-hidden="true"></i> Excess Vol.</button>
                                                                <button style="margin-bottom:3px" data-toggle="modal" href="#ptoReturnModal" class="btn btn-danger"><i class="fa fa-backward" aria-hidden="true"></i><i class="fa fa-exchange" aria-hidden="true"></i> Return  & Wastage</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoProcessingDataModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoBlockCounterModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoGradingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoSoakingModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoExcessVolumeModal')
                                                @include('backend.production.processing.raw_bf_shrimp.pto.ptoReturnModal')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- tab content -->
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