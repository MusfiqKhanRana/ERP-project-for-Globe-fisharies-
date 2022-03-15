@extends('backend.master')
@section('site-title')
    Unload Unit
@endsection
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@section('main-content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title bold">Production Data</h3>
            <a class="btn btn-danger" class="active" href="#GeneralItem"><i class="fa fa-spinner"></i> General Item Check Item </a>
            <a class="btn btn-success" href="#RawMaterial"><i class="fa fa-cart-plus"></i> Raw Material Check In</a>
                <div class="col pull-right">
                    <button type="submit" class="btn btn-primary"  autocomplete="off" >Search</button>
                </div>
            <div class="col pull-right">
                <input type="text" name="invoice_no" class="form-control" id="" placeholder="Please Write your Invoice No">
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box grey-salt">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-clipboard "></i>History List
                            </div>
                        </div>
                        <div class="tab-pane active" id="GeneralItem">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-header">
                                            <h2 style="margin-left: 2%"> General Item Check Item</h2> 
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
                                                <h2 class="modal-title" style="color: rgb(75, 65, 65);">Process Data (HLSO)</h2>
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
@endsection
