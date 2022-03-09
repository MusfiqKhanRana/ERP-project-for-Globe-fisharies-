
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
                            <li style="margin-bottom:5px;" class="active"><a href="#tab_a" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO</b></a></li>
                            {{-- <li style="margin-bottom:5px;"><a href="#tab_b" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD</b></a></li>
                            <li style="margin-bottom:5px;" ><a href="#tab_c" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P&D Tail On</b></a></li> --}}
                            <li style="margin-bottom:5px;"><a href="#tab_b" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_c" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P&D Tail On</b></a></li>
                            <li style="margin-bottom:5px;" ><a href="#tab_d" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>P&D Tail Off</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_e" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Special Cut P&D</b></a></li>
                            <li style="margin-bottom:5px;" ><a href="#tab_f" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>HLSO Easy Peel
                            </b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_g" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>Butterfly/PUD Skewer</b></a></li>
                            <li style="margin-bottom:5px;"><a href="#tab_h" style="text-align:center;border:2px solid #337AB7" data-toggle="pill"><b>PUD Pull Vein</b></a></li>
                        </ul>
                        <div class="tab-content col-md-10 portlet-body">
                            <div class="tab-pane active" id="tab_a">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                 
                                <!--------HLSO Modals----------->
                                <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">HLSO</h2>
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
                                <div id="grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading</h2>
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
                                                            <label>Weight</label>
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
                                                                        Weight
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
                                <div id="soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking </h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
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
                                <div id="glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing</h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
                                                                </th>
                                                                <th>
                                                                    Glazing Weight
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
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50kg
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
                                <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
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
                                                                        Weight
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight
                                                                    </th>
                                                                    <th>
                                                                        Return Weight
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
                            <div class="tab-pane active" id="tab_b">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">HLSO</h2>
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
                                <div id="grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading</h2>
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
                                                            <label>Weight</label>
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
                                                                        Weight
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
                                <div id="soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking </h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
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
                                <div id="glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing</h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
                                                                </th>
                                                                <th>
                                                                    Glazing Weight
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
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50kg
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
                                <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
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
                                                                        Weight
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight
                                                                    </th>
                                                                    <th>
                                                                        Return Weight
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
                            <div class="tab-pane active" id="tab_c">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                  <!--------p_d_tail_on Modals----------->
                                  <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">HLSO</h2>
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
                                <div id="grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading</h2>
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
                                                            <label>Weight</label>
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
                                                                        Weight
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
                                <div id="soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking </h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
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
                                <div id="glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing</h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
                                                                </th>
                                                                <th>
                                                                    Glazing Weight
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
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50kg
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
                                <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
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
                                                                        Weight
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight
                                                                    </th>
                                                                    <th>
                                                                        Return Weight
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
                            <div class="tab-pane active" id="tab_d">
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--------p_d_tail_off Modals----------->
                                <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">HLSO</h2>
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
                                <div id="grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading</h2>
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
                                                            <label>Weight</label>
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
                                                                        Weight
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
                                <div id="soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking </h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
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
                                <div id="glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing</h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
                                                                </th>
                                                                <th>
                                                                    Glazing Weight
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
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50kg
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
                                <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return</h2>
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
                                                                        Weight
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight
                                                                    </th>
                                                                    <th>
                                                                        Return Weight
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
                            <div class="tab-pane active" id="tab_e">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>Special Cut List</b>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <!--------special_cut Modals----------->
                                 <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">HLSO (Special Cut)</h2>
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
                                <div id="grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <label>Weight</label>
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
                                                                        Weight
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
                                <div id="soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                <p><b>HLSO:</b> 50kg</p>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Grade
                                                                </th>
                                                                <th>
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
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
                                <div id="glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                <p><b>HLSO:</b> 50kg</p>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Grade
                                                                </th>
                                                                <th>
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
                                                                </th>
                                                                <th>
                                                                    Glazing Weight
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
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50kg
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
                                <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (Special Cut)</h2>
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
                                                                        Weight
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight
                                                                    </th>
                                                                    <th>
                                                                        Return Weight
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
                            <div class="tab-pane active" id="tab_f">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>HLSO Easy Peel List</b>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <!--------hlso_easy_peel Modals----------->
                                 <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">HLSO (Easy Peel)</h2>
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
                                <div id="grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (Easy Peel)</h2>
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
                                                            <label>Weight</label>
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
                                                                        Weight
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
                                <div id="soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (Easy Cut) </h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
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
                                <div id="glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (Easy Peel)</h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
                                                                </th>
                                                                <th>
                                                                    Glazing Weight
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
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50kg
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
                                <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (Easy Peel)</h2>
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
                                                                        Weight
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight
                                                                    </th>
                                                                    <th>
                                                                        Return Weight
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
                            <div class="tab-pane active" id="tab_g">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>Butterfly PUD Skewer List</b>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                  <!--------butterfly_pud_skewer Modals----------->
                                  <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">HLSO (Butterfly)</h2>
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
                                <div id="grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                            <label>Weight</label>
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
                                                                        Weight
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
                                <div id="soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                <p><b>HLSO:</b> 50kg</p>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Grade
                                                                </th>
                                                                <th>
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
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
                                <div id="glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                <p><b>HLSO:</b> 50kg</p>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Grade
                                                                </th>
                                                                <th>
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
                                                                </th>
                                                                <th>
                                                                    Glazing Weight
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
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50kg
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
                                <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                                        Weight
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight
                                                                    </th>
                                                                    <th>
                                                                        Return Weight
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
                            <div class="tab-pane active" id="tab_h">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <b>PUD Pull Vein List</b>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1002
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grade" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#soaking" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Soaking</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#glazing" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i> Glazing</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                 <!--------pdu_pull_vein Modals----------->
                                 <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">HLSO (Vein)</h2>
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
                                <div id="grade" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading (Vein)</h2>
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
                                                            <label>Weight</label>
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
                                                                        Weight
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
                                <div id="soaking" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Soaking (Vein) </h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
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
                                <div id="glazing" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Glazing (Vein)</h2>
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
                                                                    Weight
                                                                </th>
                                                                <th>
                                                                   Soaking Weight
                                                                </th>
                                                                <th>
                                                                    Return Weight
                                                                </th>
                                                                <th>
                                                                    Glazing Weight
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
                                                                    100
                                                                </td>
                                                                <td>
                                                                    50kg
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
                                <div id="WastageReturn" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    {{csrf_field()}}
                                    <input type="hidden" value="" id="delete_id">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="#" method="POST">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Wastage & Return (Vein)</h2>
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
                                                                        Weight
                                                                    </th>
                                                                    <th>
                                                                        Soaking Weight
                                                                    </th>
                                                                    <th>
                                                                        Return Weight
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
                        </div>
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



