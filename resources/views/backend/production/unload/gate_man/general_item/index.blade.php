
@extends('backend.master')
@section('site-title')
    Unload Report
@endsection

@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title" class="portlet box dark"><b>Production Management</b>
                <small> Unload Unit General Item Check in </small>
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
                    <div class="panel panel-default">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            S.l
                                        </th>
                                        <th style="text-align: center">
                                            Item Description
                                        </th>
                                        <th style="text-align: center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($production_requistion as $key=> $data)
                                    <tr id="row1">
                                        <td>{{++$key}}</td>
                                        <td class="text-align: center;"> {{$data->requisition_code}}</td>
                                        <td class="text-align: center;">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Sl.
                                                        </th>
                                                        <th>
                                                            Supplier Info
                                                        </th>
                                                        <th>
                                                            Item Details
                                                        </th>
                                                        <th>
                                                            Demand Date
                                                        </th>
                                                        <th>
                                                            Quantity
                                                        </th>
                                                        <th>
                                                           Specification
                                                        </th>
                                                        <th>
                                                            Confirm Rate
                                                        </th>
                                                        <th>
                                                            Remark
                                                        </th>
                                                        {{-- <th>
                                                            Action
                                                        </th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data->production_requisition_item as $key2 => $item)
                                                        <tr>
                                                            <td>{{++$key2}}</td>
                                                            <td class="text-align: center;"> 
                                                                <li>Supplier Name : {{$item->supplier->name}}</li> 
                                                                <li>Supplier Phone : {{$item->supplier->phone}}</li>
                                                                <li>Supplier Address : {{$item->supplier->address}}</li>
                                                                <li>Supplier Email : {{$item->supplier->email}}</li>
                                                            </td>
                                                            <td><ul><li>{{$item->image}}</li><li>{{$item->item_name}}</li><li>{{$item->item_type_name}}</li><li>{{$item->item_unit_name}}</li></ul></td>
                                                            <td>{{$item->demand_date}}</td>
                                                            <td>{{$item->quantity}}</td>
                                                            <td>{{$item->specification}}</td>
                                                            <td>{{$item->confirm_rate}}</td>
                                                            <td>{{$item->remark}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </td>
                                        <td>
                                            <button style="margin-bottom:3px" data-toggle="modal" href="#general_modal" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i>Check</button>
                                        </td>
                                        <div id="general_modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            {{csrf_field()}}
                                            <input type="hidden" value="" id="delete_id">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{route('production.unload.gateman.general_item.check')}}" method="POST">
                                                        {{csrf_field()}}
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h2 class="modal-title" style="color: rgb(75, 65, 65);">General Item Check Item</h2>
                                                        </div>
                                                        <div class="modal-body">
                                                                @csrf
                                                                <div class="col-md-12" style="overflow: scroll;">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <b>Item Details</b>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <b>Demand Date</b>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <b>Quantity</b>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <b>supplier Info</b>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    @foreach ($data->production_requisition_item as $key2 => $item)
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <ul><li>{{$item->image}}</li><li>{{$item->item_name}}</li><li>{{$item->item_type_name}}</li><li>{{$item->item_unit_name}}</li></ul>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                {{$item->demand_date}}
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                {{$item->quantity}}
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <li>Supplier Name : {{$item->supplier->name}}</li> 
                                                                                <li>Supplier Phone : {{$item->supplier->phone}}</li>
                                                                                <li>Supplier Address : {{$item->supplier->address}}</li>
                                                                                <li>Supplier Email : {{$item->supplier->email}}</li>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                    @endforeach           
                                                                </div>
                                                            <hr>
                                                            <div class="row">
                                                                <label for="inputEmail1" class="col-md-3 control-label">Vehicle Number :</label>
                                                                <div class="col-md-9">
                                                                    <input type="hidden" class="form-control" value="{{$data->id}}" name="requisition_id">
                                                                    <input type="text" name="vehicle_number" class="form-control" value="" placeholder="Type Vehicle Number"><br>
                                                                </div>
                                                                <label for="inputEmail1" class="col-md-3 control-label">Challan No. :</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="challan_no" class="form-control" value="" placeholder="Type Challan No."><br>
                                                                </div>
                                                                <label for="inputEmail1" class="col-md-3 control-label">Remark :</label>
                                                                <div class="col-md-9">
                                                                    <textarea type="text" name="unload_remark" class="form-control" value="" placeholder="Note"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="submit" class="m-10 btn btn-success">Confirm</button>
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
       jQuery(document).ready(function() {
            $("#printbtn").click(function () {
                $("#print").print();
            });
        });
    </script>
@endsection








