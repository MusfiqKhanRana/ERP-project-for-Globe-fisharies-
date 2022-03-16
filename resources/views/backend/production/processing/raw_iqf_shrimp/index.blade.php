
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
                                <div id="hlso_processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Initial Data (HLSO)</h2>
                                                </div>
                                                <div class="modal-body">
                                                        @csrf
                                                    <p><b>Invoice no:</b> 1111111</p>
                                                    <p><b>Item Name:</b> Pangas</p>
                                                    <p><b>Quantity:</b> 50kg</p>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <label>HLSO</label>
                                                            <input type="text" class="form-control" placeholder="Type after de heading">
                                                        </div>
                                                        <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                                                    </div><br>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="hlso_grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (HLSO)</h2>
                                                </div>
                                                <div class="modal-body">
                                                        @csrf
                                                    <p><b>Invoice no:</b> 1111111</p>
                                                    <p><b>Item Name:</b> Pangas</p>
                                                    <p><b>Quantity:</b> 50kg</p>
                                                    <p><b>HLSO:</b> 50kg</p>
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label>Select Grade</label>
                                                            <select type="text" class="form-control" >
                                                                <option>300-500gm</option>
                                                                <option>400-500gm</option>
                                                                <option>500-700gm</option>
                                                                <option>600-800gm</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>Weight (Kg)</label>
                                                            <input type="text" class="form-control" placeholder="Type Weight">
                                                        </div>
                                                        <div class="col-md-1" style="margin-top: 4%">
                                                            <button class="btn btn-success">+ Add</button>
                                                        </div>
                                                    </div><br>
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: center">
                                                                        Grade
                                                                    </th>
                                                                    <th style="text-align: center">
                                                                        Weight (Kg)
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align: center">
                                                                        300-500gm
                                                                    </td>
                                                                    <td style="text-align: center">
                                                                        5
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <br><br><br><br><br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="hlso_soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (HLSO)</h2>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <p><b>HLSO:</b> 50kg</p>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Grade
                                                                </th>
                                                                <th>
                                                                    Weight (Kg)
                                                                </th>
                                                                <th>
                                                                   Soaking Weight (Kg)
                                                                </th>
                                                                <th>
                                                                    Return Weight (Kg)
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    300-500gm
                                                                </td>
                                                                <td>
                                                                    5
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Type Soaking Weight">
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Type Return Weight">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                                <br><br><br><br><br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="hlso_glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (HLSO)</h2>
                                                </div>
                                                <div class="modal-body">
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <p><b>HLSO:</b> 50kg</p>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Grade
                                                                </th>
                                                                <th>
                                                                    Weight (Kg)
                                                                </th>
                                                                <th>
                                                                   Soaking Weight (Kg)
                                                                </th>
                                                                <th>
                                                                    Return Weight (Kg)
                                                                </th>
                                                                <th>
                                                                    Glazing Weight (Kg)
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    300-500gm
                                                                </td>
                                                                <td>
                                                                    5
                                                                </td>
                                                                <td>
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control" placeholder="Type  Glazing Volume">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                                <br><br><br><br><br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="hlso_WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (HLSO)</h2>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row" style="margin: 3%" >
                                                        @csrf
                                                        <p><b>Invoice no:</b> 1111111</p>
                                                        <p><b>Item Name:</b> Pangas</p>
                                                        <p><b>Quantity:</b> 50kg</p>
                                                        <p><b>HLSO:</b> 50kg</p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Grade
                                                                    </th>
                                                                    <th>
                                                                        Weight (Kg)
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight (Kg)
                                                                    </th>
                                                                    <th>
                                                                        Return Weight (Kg)
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        300-500gm
                                                                    </td>
                                                                    <td>
                                                                        5
                                                                    </td>
                                                                    <td>
                                                                        15
                                                                    </td>
                                                                    <td>
                                                                        5
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <hr>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Wastage (Kg)</label>
                                                                <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Return (Kg)</label>
                                                                <input type="text" class="form-control" placeholder=" Type Return Volume">
                                                            </div>
                                                        </div><br>
                                                    </div>
                                                </div><br><br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
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
                                                <div id="tail_on_processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Initial Data (Tail On)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <label>Initial Weight</label>
                                                                            <input type="text" class="form-control" placeholder="Type Initial weight">
                                                                        </div>
                                                                        <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                                                                    </div><br>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tail_on_grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (Tail On)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <p><b>Initial Weight:</b> 50kg</p>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <label>Select Grade</label>
                                                                            <select type="text" class="form-control" >
                                                                                <option>300-500gm</option>
                                                                                <option>400-500gm</option>
                                                                                <option>500-700gm</option>
                                                                                <option>600-800gm</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <label>Weight (Kg)</label>
                                                                            <input type="text" class="form-control" placeholder="Type Weight">
                                                                        </div>
                                                                        <div class="col-md-1" style="margin-top: 4%">
                                                                            <button class="btn btn-success">+ Add</button>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center">
                                                                                        Grade
                                                                                    </th>
                                                                                    <th style="text-align: center">
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tail_on_soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (Tail On)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Soaking Weight">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Return Weight">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tail_on_glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (Tail On)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Weight:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Glazing Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    100
                                                                                </td>
                                                                                <td>
                                                                                    50
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Glazing Volume">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="tail_on_WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (Tail On)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row" style="margin: 3%" >
                                                                        @csrf
                                                                        <p><b>Invoice no:</b> 1111111</p>
                                                                        <p><b>Item Name:</b> Pangas</p>
                                                                        <p><b>Quantity:</b> 50kg</p>
                                                                        <p><b>Initial Weight:</b> 50kg</p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        Grade
                                                                                    </th>
                                                                                    <th>
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Soaking Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Return Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                    <td>
                                                                                        15
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>Wastage (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>Return (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Return Volume">
                                                                            </div>
                                                                        </div><br>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @include('backend.production.processing.raw_iqf_shrimp.pud.modals.grade_tail_on')
                                                @include('backend.production.processing.raw_iqf_shrimp.pud.modals.soaking_tail_on')
                                                @include('backend.production.processing.raw_iqf_shrimp.pud.modals.glazing_tail_on')
                                                @include('backend.production.processing.raw_iqf_shrimp.pud.modals.WastageReturn_tail_on') --}}
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
                                                <div id="processData_tail_off" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Initial Data (Tail off)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <label>Initial Weight</label>
                                                                            <input type="text" class="form-control" placeholder="Type Initial weight">
                                                                        </div>
                                                                        <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                                                                    </div><br>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="grade_tail_off" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (Tail off)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <p><b>Initial Weight:</b> 50kg</p>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <label>Select Grade</label>
                                                                            <select type="text" class="form-control" >
                                                                                <option>300-500gm</option>
                                                                                <option>400-500gm</option>
                                                                                <option>500-700gm</option>
                                                                                <option>600-800gm</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <label>Weight (Kg)</label>
                                                                            <input type="text" class="form-control" placeholder="Type Weight">
                                                                        </div>
                                                                        <div class="col-md-1" style="margin-top: 4%">
                                                                            <button class="btn btn-success">+ Add</button>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center">
                                                                                        Grade
                                                                                    </th>
                                                                                    <th style="text-align: center">
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="soaking_tail_off" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (Tail off)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Soaking Weight">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Return Weight">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="glazing_tail_off" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (Tail off)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Glazing Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    100
                                                                                </td>
                                                                                <td>
                                                                                    50
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder=" Glazing Volume">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="WastageReturn_tail_off" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (Tail off)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row" style="margin: 3%" >
                                                                        @csrf
                                                                        <p><b>Invoice no:</b> 1111111</p>
                                                                        <p><b>Item Name:</b> Pangas</p>
                                                                        <p><b>Quantity:</b> 50kg</p>
                                                                        <p><b>Initial Weight:</b> 50kg</p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        Grade
                                                                                    </th>
                                                                                    <th>
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Soaking Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Return Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                    <td>
                                                                                        15
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>Wastage (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>Return (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Return Volume">
                                                                            </div>
                                                                        </div><br>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.processData_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.grade_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.soaking_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.glazing_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.WastageReturn_tail_off') --}}
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
                                                <div id="special_cut_processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Initial Data</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <label>Initial Weight</label>
                                                                            <input type="text" class="form-control" placeholder="Type Initial weight">
                                                                        </div>
                                                                        <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                                                                    </div><br>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="special_cut_grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (Special Cut)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <p><b>Initial Data:</b> 50kg</p>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <label>Select Grade</label>
                                                                            <select type="text" class="form-control" >
                                                                                <option>300-500gm</option>
                                                                                <option>400-500gm</option>
                                                                                <option>500-700gm</option>
                                                                                <option>600-800gm</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <label>Weight (Kg)</label>
                                                                            <input type="text" class="form-control" placeholder="Type Weight">
                                                                        </div>
                                                                        <div class="col-md-1" style="margin-top: 4%">
                                                                            <button class="btn btn-success">+ Add</button>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center">
                                                                                        Grade
                                                                                    </th>
                                                                                    <th style="text-align: center">
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="special_cut_soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (Special Cut)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Soaking Weight">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Return Weight">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="special_cut_glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (Special Cut)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Weight:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Glazing Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    100
                                                                                </td>
                                                                                <td>
                                                                                    50
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type  Glazing Volume">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="special_cut_WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (Special Cut) </h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row" style="margin: 3%" >
                                                                        @csrf
                                                                        <p><b>Invoice no:</b> 1111111</p>
                                                                        <p><b>Item Name:</b> Pangas</p>
                                                                        <p><b>Quantity:</b> 50kg</p>
                                                                        <p><b>Initial Data:</b> 50kg</p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        Grade
                                                                                    </th>
                                                                                    <th>
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Soaking Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Return Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                    <td>
                                                                                        15
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>Wastage (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>Return (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Return Volume">
                                                                            </div>
                                                                        </div><br>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.processData_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.grade_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.soaking_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.glazing_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.WastageReturn_tail_off') --}}
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
                                                <div id="hlso_easy_processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Initial Data (HLSO Easy Peel)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <label>Initial Weight</label>
                                                                            <input type="text" class="form-control" placeholder="Type Initial weight">
                                                                        </div>
                                                                        <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                                                                    </div><br>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="hlso_easy_grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (HLSO Easy Peel)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <p><b>Initial Data:</b> 50kg</p>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <label>Select Grade</label>
                                                                            <select type="text" class="form-control" >
                                                                                <option>300-500gm</option>
                                                                                <option>400-500gm</option>
                                                                                <option>500-700gm</option>
                                                                                <option>600-800gm</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <label>Weight (Kg)</label>
                                                                            <input type="text" class="form-control" placeholder="Type Weight">
                                                                        </div>
                                                                        <div class="col-md-1" style="margin-top: 4%">
                                                                            <button class="btn btn-success">+ Add</button>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center">
                                                                                        Grade
                                                                                    </th>
                                                                                    <th style="text-align: center">
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="hlso_easy_soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (HLSO Easy Peel) </h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Soaking Weight">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Return Weight">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="hlso_easy_glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (Tail off)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Glazing Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    100
                                                                                </td>
                                                                                <td>
                                                                                    50
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type  Glazing Volume">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="hlso_easy_WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (HLSO Easy Peel)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row" style="margin: 3%" >
                                                                        @csrf
                                                                        <p><b>Invoice no:</b> 1111111</p>
                                                                        <p><b>Item Name:</b> Pangas</p>
                                                                        <p><b>Quantity:</b> 50kg</p>
                                                                        <p><b>Initial Data:</b> 50kg</p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        Grade
                                                                                    </th>
                                                                                    <th>
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Soaking Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Return Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                    <td>
                                                                                        15
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>Wastage (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>Return (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Return Volume">
                                                                            </div>
                                                                        </div><br>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.processData_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.grade_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.soaking_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.glazing_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.WastageReturn_tail_off') --}}
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
                                                <div id="butterfly_processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Initial Data (Butterfly)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <label>Initial Weight</label>
                                                                            <input type="text" class="form-control" placeholder="Type Initial weight">
                                                                        </div>
                                                                        <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                                                                    </div><br>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="butterfly_grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (Butterfly)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <p><b>Initial Data:</b> 50kg</p>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <label>Select Grade</label>
                                                                            <select type="text" class="form-control" >
                                                                                <option>300-500gm</option>
                                                                                <option>400-500gm</option>
                                                                                <option>500-700gm</option>
                                                                                <option>600-800gm</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <label>Weight (Kg)</label>
                                                                            <input type="text" class="form-control" placeholder="Type Weight">
                                                                        </div>
                                                                        <div class="col-md-1" style="margin-top: 4%">
                                                                            <button class="btn btn-success">+ Add</button>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center">
                                                                                        Grade
                                                                                    </th>
                                                                                    <th style="text-align: center">
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="butterfly_soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (Butterfly)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Soaking Weight">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Return Weight">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="butterfly_glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (Butterfly)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Glazing Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    100
                                                                                </td>
                                                                                <td>
                                                                                    50
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type  Glazing Volume">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="butterfly_WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (Butterfly)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row" style="margin: 3%" >
                                                                        @csrf
                                                                        <p><b>Invoice no:</b> 1111111</p>
                                                                        <p><b>Item Name:</b> Pangas</p>
                                                                        <p><b>Quantity:</b> 50kg</p>
                                                                        <p><b>Initial Data:</b> 50kg</p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        Grade
                                                                                    </th>
                                                                                    <th>
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Soaking Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Return Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                    <td>
                                                                                        15
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>Wastage (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>Return (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Return Volume">
                                                                            </div>
                                                                        </div><br>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.processData_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.grade_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.soaking_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.glazing_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.WastageReturn_tail_off') --}}
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
                                                <div id="pud_pull_vein_processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Initial Data (PUD Pull Vein)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-9">
                                                                            <label>Initial Weight</label>
                                                                            <input type="text" class="form-control" placeholder="Type Initial weight">
                                                                        </div>
                                                                        <div class="col-md-3" style="margin-top: 5%"><b>Parcentage:</b> 12%</div>
                                                                    </div><br>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="pud_pull_vein_grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (PUD Pull Vein)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                    <p><b>Invoice no:</b> 1111111</p>
                                                                    <p><b>Item Name:</b> Pangas</p>
                                                                    <p><b>Quantity:</b> 50kg</p>
                                                                    <p><b>Initial Data:</b> 50kg</p>
                                                                    <div class="row">
                                                                        <div class="col-md-5">
                                                                            <label>Select Grade</label>
                                                                            <select type="text" class="form-control" >
                                                                                <option>300-500gm</option>
                                                                                <option>400-500gm</option>
                                                                                <option>500-700gm</option>
                                                                                <option>600-800gm</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-5">
                                                                            <label>Weight (Kg)</label>
                                                                            <input type="text" class="form-control" placeholder="Type Weight">
                                                                        </div>
                                                                        <div class="col-md-1" style="margin-top: 4%">
                                                                            <button class="btn btn-success">+ Add</button>
                                                                        </div>
                                                                    </div><br>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center">
                                                                                        Grade
                                                                                    </th>
                                                                                    <th style="text-align: center">
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="text-align: center">
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td style="text-align: center">
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="pud_pull_vein_soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (PUD Pull Vein) </h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Soaking Weight">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type Return Weight">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="pud_pull_vein_glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (PUD Pull Vein)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                <p><b>Invoice no:</b> 1111111</p>
                                                                <p><b>Item Name:</b> Pangas</p>
                                                                <p><b>Quantity:</b> 50kg</p>
                                                                <p><b>Initial Data:</b> 50kg</p>
                                                                <div class="col-md-12">
                                                                    <table class="table table-striped table-bordered table-hover">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    Grade
                                                                                </th>
                                                                                <th>
                                                                                    Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                   Soaking Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Return Weight (Kg)
                                                                                </th>
                                                                                <th>
                                                                                    Glazing Weight (Kg)
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>
                                                                                    300-500gm
                                                                                </td>
                                                                                <td>
                                                                                    5
                                                                                </td>
                                                                                <td>
                                                                                    100
                                                                                </td>
                                                                                <td>
                                                                                    50
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" class="form-control" placeholder="Type  Glazing Volume">
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                                <br><br><br><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="pud_pull_vein_WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="#" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (PUD Pull Vein)</h2>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row" style="margin: 3%" >
                                                                        @csrf
                                                                        <p><b>Invoice no:</b> 1111111</p>
                                                                        <p><b>Item Name:</b> Pangas</p>
                                                                        <p><b>Quantity:</b> 50kg</p>
                                                                        <p><b>Initial Data:</b> 50kg</p>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <table class="table table-striped table-bordered table-hover">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        Grade
                                                                                    </th>
                                                                                    <th>
                                                                                        Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Soaking Weight (Kg)
                                                                                    </th>
                                                                                    <th>
                                                                                        Return Weight (Kg)
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        300-500gm
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                    <td>
                                                                                        15
                                                                                    </td>
                                                                                    <td>
                                                                                        5
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>Wastage (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Wastage Volume">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>Return (Kg)</label>
                                                                                <input type="text" class="form-control" placeholder=" Type Return Volume">
                                                                            </div>
                                                                        </div><br>
                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.processData_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.grade_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.soaking_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.glazing_tail_off')
                                                @include('backend.production.processing.raw_iqf_shrimp.p_d_tail_off.modals.WastageReturn_tail_off') --}}
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



