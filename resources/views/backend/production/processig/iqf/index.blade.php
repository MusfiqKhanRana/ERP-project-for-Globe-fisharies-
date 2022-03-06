
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
                        <ul class="nav nav-pills nav-stacked col-md-2">
                            <li style="margin-bottom:5px;" class="active"><a href="#tab_a" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Fillet</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_b" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_c" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Whole Gutted</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_d" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Cleaned</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_e" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Sliced(Family Cut)</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_f" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Sliced(Chinese Cut)</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_g" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Butter Fly</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_h" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HGTO</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                                <div class="tab-pane active" id="tab_a">
                                    <div class="portlet-title">
                                        <div class="caption">
                                           <b>Fillet List</b>
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
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    22222
                                                </td>
                                                <td>
                                                    Pangash
                                                </td>
                                                <td>
                                                    200-300gm
                                                </td>
                                                <td>
                                                    50kg
                                                </td>
                                                <td>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_b">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <b>Whole List</b>
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
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    22222
                                                </td>
                                                <td>
                                                    Pangash
                                                </td>
                                                <td>
                                                    200-300gm
                                                </td>
                                                <td>
                                                    50kg
                                                </td>
                                                <td>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_c">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <b>Whole Gutted List</b>
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
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    22222
                                                </td>
                                                <td>
                                                    Pangash
                                                </td>
                                                <td>
                                                    200-300gm
                                                </td>
                                                <td>
                                                    50kg
                                                </td>
                                                <td>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_d">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <b>Cleaned List</b>
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
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    22222
                                                </td>
                                                <td>
                                                    Pangash
                                                </td>
                                                <td>
                                                    200-300gm
                                                </td>
                                                <td>
                                                    50kg
                                                </td>
                                                <td>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_e">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <b>Sliced(Family Cut) List</b>
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
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    22222
                                                </td>
                                                <td>
                                                    Pangash
                                                </td>
                                                <td>
                                                    200-300gm
                                                </td>
                                                <td>
                                                    50kg
                                                </td>
                                                <td>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_f">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <b>Sliced(Chinese Cut) List</b>
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
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    22222
                                                </td>
                                                <td>
                                                    Pangash
                                                </td>
                                                <td>
                                                    200-300gm
                                                </td>
                                                <td>
                                                    50kg
                                                </td>
                                                <td>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_g">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <b>Butter Fly List</b>
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
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    22222
                                                </td>
                                                <td>
                                                    Pangash
                                                </td>
                                                <td>
                                                    200-300gm
                                                </td>
                                                <td>
                                                    50kg
                                                </td>
                                                <td>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab_h">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <b>HGTO List</b>
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
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    22222
                                                </td>
                                                <td>
                                                    Pangash
                                                </td>
                                                <td>
                                                    200-300gm
                                                </td>
                                                <td>
                                                    50kg
                                                </td>
                                                <td>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ProcessingDataModal" class="btn btn-success"><i class="fa fa-refresh" aria-hidden="true"></i> Processing Data</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GradingModal" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> Grading</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#SoakingModal" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Soaking</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#GlazingModal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                    <button style="margin-bottom:3px" data-toggle="modal" href="#ReturnModal" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Return</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="ProcessingDataModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Processing Data</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                        @csrf
                                                    <p><b>Invoice no:</b> 1111111</p>
                                                    <p><b>Item Name:</b> Pangas</p>
                                                    <p><b>Quantity:</b> 50kg</p>
                                                    <div class="row"><div class="col-md-3"><b>Raw Filleting:</b></div><div class="col-md-3"><input type="text" class="form-control"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div></div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="GradingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                        @csrf
                                                    <p><b>Invoice no:</b> 1111111</p>
                                                    <p><b>Item Name:</b> Pangas</p>
                                                    <p><b>Quantity:</b> 50kg</p>
                                                    <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br>
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Grade
                                                                    </th>
                                                                    <th>
                                                                        Quantity
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        300-500gm
                                                                    </td>
                                                                    <td>
                                                                        5kg
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="SoakingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Soaking</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                        @csrf
                                                    <p><b>Invoice no:</b> 1111111</p>
                                                    <p><b>Item Name:</b> Pangas</p>
                                                    <p><b>Quantity:</b> 50kg</p>
                                                    {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Grade
                                                                    </th>
                                                                    <th>
                                                                        Quantity
                                                                    </th>
                                                                    <th>
                                                                        Soaking
                                                                    </th>
                                                                    <th>
                                                                        Damage Weight
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        300-500gm
                                                                    </td>
                                                                    <td>
                                                                        5kg
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control">
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="GlazingModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Glazing</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                        @csrf
                                                    <p><b>Invoice no:</b> 1111111</p>
                                                    <p><b>Item Name:</b> Pangas</p>
                                                    <p><b>Quantity:</b> 50kg</p>
                                                    {{-- <div class="row"><div class="col-md-3"><input type="text" class="form-control" placeholder="Grading"></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div><div class="col-md-3"><b>Parcentage:</b> 12%</div><div class="col-md-1"><button class="btn btn-success">add</button></div></div><br> --}}
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Grade
                                                                    </th>
                                                                    <th>
                                                                        Quantity
                                                                    </th>
                                                                    <th>
                                                                        Glazing
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        300-500gm
                                                                    </td>
                                                                    <td>
                                                                        5kg
                                                                    </td>
                                                                    <td>
                                                                        <input type="text" class="form-control">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="ReturnModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Return</h2>
                                                </div>
                                                <br>
                                                <div class="modal-body">
                                                        @csrf
                                                    <p><b>Invoice no:</b> 1111111</p>
                                                    <p><b>Item Name:</b> Pangas</p>
                                                    <p><b>Quantity:</b> 50kg</p>
                                                    <div class="row"><div class="col-md-3"><b>Return : </b></div><div class="col-md-3"><input type="text" class="form-control" placeholder="weight"></div></div><br>
                                                </div>
                                                <br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                </div>
                                            </form>
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



