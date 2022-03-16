
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockCounter" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Block Counter</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#excess" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i> Excess Volume</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
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
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#processData_b" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Process Data</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#grading_b" class="btn btn-success"><i class="fa fa-bar-chart" aria-hidden="true"></i> Grading</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#blockCounter_b" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Block Counter</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#excess_b" class="btn blue"><i class="fa fa-calculator" aria-hidden="true"></i>Excess Volume</button>
                                                <button style="margin-bottom:3px" data-toggle="modal" href="#WastageReturn_b" class="btn btn-danger"><i class="fa fa-refresh" aria-hidden="true"></i> Wastage/Return</button>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div id="processData" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Whole Weight</h2>
                                            </div>
                                            <div class="modal-body">
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <label>Whole Weight (Kg)</label>
                                                        <input type="text" class="form-control" placeholder="Type Whole weight">
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
                            <div id="grading" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);"> Grading </h2>
                                            </div>
                                            <div class="modal-body">
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <p><b>Whole Weight (Kg):</b> 50kg</p>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label>Block Size</label>
                                                        <select type="text" class="form-control" >
                                                            <option>10</option>
                                                            <option>12</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label>Size</label>
                                                        <select type="text" class="form-control">
                                                            <option>10</option>
                                                            <option>12</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
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
                                                                    Block Size
                                                                </th>
                                                                <th style="text-align: center">
                                                                    Size
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
                            <div id="blockCounter" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Block Counter </h2>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                            <p><b>Invoice no:</b> 1111111</p>
                                            <p><b>Item Name:</b> Pangas</p>
                                            <p><b>Quantity:</b> 50kg</p>
                                            <p><b>Whole Weight:</b> 50kg</p>
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Block Size
                                                            </th>
                                                            <th>
                                                                Size
                                                            </th>
                                                            <th style="text-align: center">
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
                                                                5
                                                            </td>
                                                            <td>
                                                                <div class="row-col">
                                                                    <div>
                                                                        <input type="text" class="form-control" placeholder="Type Block Quantity(Pc)">

                                                                        <input type="text" class="form-control" placeholder="Type Block Weight(Kg)">
                                                                    </div>

                                                                </div>
                                                                
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
                            <div id="excess" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Excess Volume </h2>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                            <p><b>Invoice no:</b> 1111111</p>
                                            <p><b>Item Name:</b> Pangas</p>
                                            <p><b>Quantity:</b> 50kg</p>
                                            <p><b>Whole Weight:</b> 50kg</p>
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Block Size
                                                            </th>
                                                            <th>
                                                                Size
                                                            </th>
                                                            <th style="text-align: center">
                                                               Block Quantity(Pc)
                                                            </th>
                                                            <th style="text-align: center">
                                                                Block Weight(Kg)
                                                             </th>
                                                             <th>
                                                                 Excess Volume (Kg)
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
                                                                50
                                                            </td>
                                                            <td>
                                                                60
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Excess Volume">
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
                                                    <p><b>Whole Weight (Kg):</b> 50kg</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Block Size
                                                                </th>
                                                                <th>
                                                                    Size
                                                                </th>
                                                                <th>
                                                                    Block Quantity (Pc)
                                                                </th>
                                                                <th>
                                                                    Block Weight (Kg)
                                                                </th>
                                                                <th>
                                                                    Excess Volume (Kg)
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
                                                                    4
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
                            <div id="processData_b" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Whole Weight</h2>
                                            </div>
                                            <div class="modal-body">
                                                    @csrf
                                                <p><b>Invoice no:</b> 1111111</p>
                                                <p><b>Item Name:</b> Pangas</p>
                                                <p><b>Quantity:</b> 50kg</p>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label>Whole Weight</label>
                                                        <input type="text" class="form-control" placeholder="Type Weight After Cleaning">
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
                            <div id="grading_b" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                <p><b>Whole Weight (Kg):</b> 50kg</p>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <label>Block Size</label>
                                                        <select type="text" class="form-control" >
                                                            <option>10</option>
                                                            <option>12</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label>Size</label>
                                                        <select type="text" class="form-control">
                                                            <option>10</option>
                                                            <option>12</option>
                                                            <option>15</option>
                                                            <option>20</option>
                                                        </select>
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
                                                                    Block Size
                                                                </th>
                                                                <th style="text-align: center">
                                                                    Size
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
                            <div id="blockCounter_b" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Block Counter </h2>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                            <p><b>Invoice no:</b> 1111111</p>
                                            <p><b>Item Name:</b> Pangas</p>
                                            <p><b>Quantity:</b> 50kg</p>
                                            <p><b>Whole Weight:</b> 50kg</p>
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Block Size
                                                            </th>
                                                            <th>
                                                                Size
                                                            </th>
                                                            <th style="text-align: center">
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
                                                                5
                                                            </td>
                                                            <td>
                                                                <div class="row-col">
                                                                    <div>
                                                                        <input type="text" class="form-control" placeholder="Type Block Quantity(Pc)">

                                                                        <input type="text" class="form-control" placeholder="Type Block Weight(Kg)">
                                                                    </div>

                                                                </div>
                                                                
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
                            <div id="excess_b" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                {{csrf_field()}}
                                <input type="hidden" value="" id="delete_id">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="#" method="POST">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Excess Volume </h2>
                                            </div>
                                            <div class="modal-body">
                                                @csrf
                                            <p><b>Invoice no:</b> 1111111</p>
                                            <p><b>Item Name:</b> Pangas</p>
                                            <p><b>Quantity:</b> 50kg</p>
                                            <p><b>Whole Weight:</b> 50kg</p>
                                            <div class="col-md-12">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                Block Size
                                                            </th>
                                                            <th>
                                                                Size
                                                            </th>
                                                            <th style="text-align: center">
                                                               Block Quantity(Pc)
                                                            </th>
                                                            <th style="text-align: center">
                                                                Block Weight(Kg)
                                                             </th>
                                                             <th>
                                                                 Excess Volume (Kg)
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
                                                                50
                                                            </td>
                                                            <td>
                                                                60
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control" placeholder="Excess Volume">
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
                            <div id="WastageReturn_b" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
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
                                                    <p><b>Whole Weight (Kg):</b> 50kg</p>
                                                </div>
                                                <div class="col-md-12">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    Block Size
                                                                </th>
                                                                <th>
                                                                    Size
                                                                </th>
                                                                <th>
                                                                    Block Quantity (Pc)
                                                                </th>
                                                                <th>
                                                                    Block Weight (Kg)
                                                                </th>
                                                                <th>
                                                                    Excess Volume (Kg)
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
                                                                    4
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



