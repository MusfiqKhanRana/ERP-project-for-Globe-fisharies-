@extends('backend.master')
@section('site-title')
   Requisition
@endsection 
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <span class="page-title" class="portlet box dark"><b>Production Requisition: </b><span>{{ request()->status}} list</span>
            </span>
            <a class="btn btn-danger" href="{{route('production-requisition.index',['status'=>'Pending','page'=>1])}}"><i class="fa fa-spinner"></i> Pending List ({{$production_requisition_pending_count}})</a>
            {{-- <a class="btn btn-primary"  href="{{route('order-history.index',"status=Confirm")}}"><i class="fa fa-check-circle"></i> Confirm Order List ({{$confirmcount}})</a> --}}
            <a class="btn btn-success" href="{{route('production-requisition.index',['status'=>'Confirm','page'=>1])}}"><i class="fa fa-cart-plus"></i> Request  List ({{$production_requisition_Confirm_count}})</a>
            <a class="btn purple" href="{{route('production-requisition.index',['status'=>'Approved','page'=>1])}}"><i class="fa fa-check"></i> Approved List ({{$production_requisition_Approved_count}})</a>
                <br><br>
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
                        <div class="portlet-body">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        
                                        <th style="text-align: center;">Serial</th>
                                        <th style="text-align: center"> Supplier Name</th>
                                        <th style="text-align: center"> Status</th>
                                        <th style="text-align: center"> Details</th>
                                        <th style="text-align: center"> Enlisted Item</th>
                                        <th style="text-align: center"> Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($production_requisition as $key=> $data)
                                            <tr id="row1">
                                                <td>{{++$key}}</td>
                                                <td class="text-align: center;"> {{$data->production_supplier->name}}</td>
                                                <td class="text-align: center;"> {{$data->status}}</td>
                                                <td class="text-align: center;"> {{$data->details}}</td>
                                                <td>
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Sl.</th>
                                                                <th>Name</th>
                                                                <th>Grade Name</th>
                                                                <th>Quantity(kg)</th>
                                                                <th>Rate</th>
                                                                <th>Amount(total)</th>
                                                                @if (request()->status=="Pending")
                                                                    <th>Action</th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $total = 0;
                                                            @endphp
                                                            @foreach($data->production_requisition_items as $key2=> $item)
                                                                <tr>
                                                                    <th>{{++$key2}}</th>
                                                                    <th>{{$item->name}}</th>
                                                                    <th>{{$item->grade->name}}</th>
                                                                    <th>{{$item->pivot->quantity}}</th>  
                                                                    <th>{{$item->pivot->rate}}</th>  
                                                                    <th>
                                                                        @php
                                                                            $total+=$item->pivot->quantity*$item->pivot->rate;
                                                                        @endphp
                                                                        {{$item->pivot->quantity*$item->pivot->rate}}
                                                                    </th> 
                                                                    @if (request()->status=="Pending")
                                                                        <th>
                                                                            <a class="btn red" data-toggle="modal" href="#deletproductModal{{$item->pivot->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                                            
                                                                            <a class="btn blue"  data-toggle="modal" href="#edit_product_Modal{{$item->pivot->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                                        </th>
                                                                    @endif 
                                                                </tr>
                                                                <div id="edit_product_Modal{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                <h4 class="modal-title">Update Requisition Item </h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form class="form-horizontal" role="form" method="post" action="{{route('production-requisition.update', $item->pivot->id)}}">
                                                                                    {{csrf_field()}}
                                                                                    {{method_field('put')}}
                                                                                    <div class="form-body">
                                                                                        <div class="form-section">
                                                                                            
                                                                                            <label class="col-md-2 control-label pull-left bold">Supplier Name: </label>
                                                                                            <div class="col-md-9">
                                                                                                <span class="form-control" selected><b>{{$data->production_supplier->name}}</b></span>
                                                                                            </div>
                                                                                        </div><br><br>
                                                                                    </div>
                                                                                    <div class="row" style="margin-top:2%">
                                                                                        <div class="col-md-12">
                                                                                            <div class="card">
                                                                                                <div class="card-header">
                                                                                                    <h4><b>Product Info</b></h4>
                                                                                                </div>
                                                                                                <div class="card-body">
                                                                                                    <div class="row">
                                                                                                        <div class="col-md-3">
                                                                                                            <label for="">Item</label>
                                                                                                            <select class="form-control" value="{{$item->name}}" id="item">
                                                                                                                @foreach ($data->production_supplier->supplier_items as $item)
                                                                                                                    <option value="{{$item->id}}" data-grade_name="{{$item->grade->name}}" data-grade_id="{{$item->grade->id}}" data-item_name="{{$item->name}}">{{$item->name}}</option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div class="col-md-2">
                                                                                                            <label for="product">Grade</label>
                                                                                                            <input type="text" class="form-control" value="{{$item->grade->name}}" id="grade" readonly>
                                                                                                        </div>
                                                                                                        <div class="col-md-2">
                                                                                                            <label for="product">Unit Price</label>
                                                                                                            <input type="text" class="form-control" value="{{$item->pivot->rate}}" id="suppliers_rate"  name="rate" readonly>
                                                                                                        </div>
                                                                                                        <div class="col-md-2">
                                                                                                            <label for="product">Quantity</label>
                                                                                                            <input type="text" class="form-control" value="{{$item->pivot->quantity}}" id="quantity">
                                                                                                        </div>
                                                                                                        <div class="col-md-2">
                                                                                                            <label for="product">Amount</label>
                                                                                                            <input type="text" class="form-control" id="amount" value="{{$item->pivot->quantity*$item->pivot->rate}}" readonly>     
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br>
                                                                                    {{-- <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="inputEmail1" class="col-md-2 control-label">Select Item</label>
                                                                                            <div class="col-md-10">
                                                                                                <input type="text" class="form-control" value="{{$item->pivot->price}}" required name="production_requisition_id">
                                                                                                <input type="hidden" value="{{$item->pivot->id}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="inputEmail1" class="col-md-2 control-label">Grade Name</label>
                                                                                            <div class="col-md-10">
                                                                                                <input type="text" class="form-control" value="{{$item->pivot->price}}" required name="supply_item_id">
                                                                                                <input type="hidden" value="{{$item->pivot->id}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="inputEmail1" class="col-md-2 control-label">Quantity</label>
                                                                                            <div class="col-md-10">
                                                                                                <input type="text" class="form-control" value="{{$item->pivot->price}}" required name="quantity">
                                                                                                <input type="hidden" value="{{$item->pivot->id}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="inputEmail1" class="col-md-2 control-label">Rate</label>
                                                                                            <div class="col-md-10">
                                                                                                <input type="text" class="form-control" value="{{$item->pivot->price}}" required name="rate">
                                                                                                <input type="hidden" value="{{$item->pivot->id}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br><br><br>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label for="inputEmail1" class="col-md-2 control-label">Total</label>
                                                                                            <div class="col-md-10">
                                                                                                <input type="text" class="form-control" value="{{$item->pivot->price}}" required name="total">
                                                                                                <input type="hidden" value="{{$item->pivot->id}}">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div><br><br><br> --}}
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                                        <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="deletproductModal{{$item->pivot->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                                    {{csrf_field()}}
                                                                    <input type="hidden" value="" id="delete_id">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                                            </div>
                                                                            <div class="modal-footer " >
                                                                                <div class="d-flex justify-content-between">
                                                                                    <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                                                </div>
                                                                                <div class="caption pull-right">
                                                                                    <form action="{{route('production-requisition-item.destroy',[$item->pivot->id])}}" method="POST">
                                                                                        @method('DELETE')
                                                                                        @csrf
                                                                                        <button class="btn red"><i class="fa fa-trash"></i>Delete</button>               
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                            <tr>
                                                                <th colspan="5" class="text-center">Total</th>
                                                                <th>{{$total}}</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td style="text-align: center">
                                                    @if (request()->status=="Pending")
                                                        <a class="btn blue"  data-toggle="modal" href="#edit_partyModal{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                        <a class="btn red" data-toggle="modal" href="#deleteModal{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                        <a class="btn green" data-toggle="modal" href="#confirmModal{{$data->id}}"><i class="fa fa-check"></i>Confirm</a>
                                                    @elseif(request()->status=="Confirm")
                                                        <a class="btn green" data-toggle="modal" href="#approveModal{{$data->id}}"><i class="fa fa-check"></i>Approve</a>
                                                        <a class="btn btn-danger" data-toggle="modal" href="#rejectModal{{$data->id}}"><i class="fa fa-times-circle-o fa-2"></i> Reject</a>
                                                        <a class="btn purple" data-toggle="modal" href="#returnModal{{$data->id}}"><i class="fa fa-undo"></i> Return</a>
                                                    @elseif(request()->status=="Approved")
                                                        <a class="btn green" data-toggle="modal" href="#dispatchModal{{$data->id}}"><i class="fa fa-arrow-circle-right"></i>Send to Production</a>
                                                        <a class="btn purple" data-toggle="modal" href="{{route('requisition.print',$data->id)}}"><i class="fa fa-print"></i> Show & Print</a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <div id="deleteModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                {{csrf_field()}}
                                                <input type="hidden" value="" id="delete_id">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                        </div>
                                                        <div class="modal-footer " >
                                                            <div class="d-flex justify-content-between">
                                                                <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                            </div>
                                                            <div class="caption pull-right">
                                                                <form action="{{route('production-requisition.destroy',[$data->id])}}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                                </form>
                                                            </div>
                                                            <!-- <a type="submit" href="{{route('pack.destroy',$data->id)}}" class="btn red" id="delete"><i class="fa fa-trash"></i> Delete</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div id="edit_partyModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Update Party</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('party.update', $data->id)}}">
                                                                {{csrf_field()}}
                                                                {{method_field('put')}}

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Code</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_code}}" required name="party_code">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Name</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_name}}" required name="party_name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Phone</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->phone}}" required name="phone">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Type</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_type}}" required name="party_type">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label">Party Short Name</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->party_short_name}}" required name="party_short_name">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="inputEmail1" class="col-md-2 control-label"> Address</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" value="{{$data->address}}" required name="address">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div id="confirmModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Confirm Requisition</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('production_requisition.status')}}">
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <input type="hidden" value="{{$data->id}}" name="id">
                                                                    <input type="hidden" value="Confirm" name="status">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Total Selling Price</label>
                                                                    <div class="col-md-8">
                                                                        {{$total}} <b>TK.</b> <small>All Item</small>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Supplier Name</label>
                                                                    <div class="col-md-8">
                                                                        {{$data->production_supplier->name}}
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Note</label>
                                                                    <div class="col-md-8">
                                                                         <b>{{"If you do this action This will go to Admin"}}</b> <small>(Important)</small>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- request list modal start --}}

                                            <div id="approveModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Approve Requisition</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('production_requisition.status')}}">
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <input type="hidden" value="{{$data->id}}" name="id">
                                                                    <input type="hidden" value="Approved" name="status">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Total Selling Price</label>
                                                                    <div class="col-md-8">
                                                                        {{$total}} <b>TK.</b> <small>All Item</small>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Supplier Name</label>
                                                                    <div class="col-md-8">
                                                                        {{$data->production_supplier->name}}
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Note</label>
                                                                    <div class="col-md-8">
                                                                         <b>{{"If you do this action This will go to Approve List"}}</b> <small>(Important)</small>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="rejectModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Reject Requisition</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('production_requisition.status')}}">
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <input type="hidden" value="{{$data->id}}" name="id">
                                                                    <input type="hidden" value="Reject" name="status">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Total Selling Price</label>
                                                                    <div class="col-md-8">
                                                                        {{$total}} <b>TK.</b> <small>All Item</small>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Supplier Name</label>
                                                                    <div class="col-md-8">
                                                                        {{$data->production_supplier->name}}
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Note</label>
                                                                    <div class="col-md-8">
                                                                        <textarea placeholder="Why You reject this item" name="reject_note"></textarea>
                                                                         
                                                                    </div><br><br>
                                                                   
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="returnModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Return Requisition</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('production_requisition.status')}}">
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <input type="hidden" value="{{$data->id}}" name="id">
                                                                    <input type="hidden" value="Returned" name="status">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Total Selling Price</label>
                                                                    <div class="col-md-8">
                                                                        {{$total}} <b>TK.</b> <small>All Item</small>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Supplier Name</label>
                                                                    <div class="col-md-8">
                                                                        {{$data->production_supplier->name}}
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Note</label>
                                                                    <div class="col-md-8">
                                                                        <textarea placeholder="Why you return this item" name="return_note" required></textarea>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Send to production Modal --}}
                                            <div id="dispatchModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                            <h4 class="modal-title">Send to Production</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal" role="form" method="post" action="{{route('production_requisition.status')}}">
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <input type="hidden" value="{{$data->id}}" name="id">
                                                                    <input type="hidden" value="InProduction" name="status">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Total Selling Price</label>
                                                                    <div class="col-md-8">
                                                                        {{$total}} <b>TK.</b> <small>All Item</small>
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Supplier Name</label>
                                                                    <div class="col-md-8">
                                                                        {{$data->production_supplier->name}}
                                                                    </div><br><br>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputEmail1" class="col-md-4 control-label">Note</label>
                                                                    <div class="col-md-8">
                                                                         <b>{{"If you do this action You won't be able to do any print out and send it into the production"}}</b> <small>(Important)</small>
                                                                    </div><br><br><br>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                    <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Confirm</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                                {{ $production_requisition->withQueryString()->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function() {
           
            var item_id,item_name,item_grade_id,item_grade_name,item_unit_price,total_price,quantity = null;
            var product_array = [];
            $('#quantity').keyup(function(){
                quantity = $(this).val();
                $("#amount").val(quantity * item_unit_price);
                total_price = quantity * item_unit_price;
            })
            $('#item').change(function(){
                item_id = $(this).val();
                item_name = $(this).find(':selected').data("name");
                item_grade_id = $(this).find(':selected').data("grade_id");
                item_unit_price = $(this).find(':selected').data("unit_price");
                $.ajax({
                    type:"get",
                    url:"/admin/production-requisition-item/"+item_grade_id,
                    success:function(data){
                        $("#grade").val(data.name);
                    }
                });
                $("#unit_price").val(item_unit_price);
            })
            $(document).on('keyup','#percentage_id',function() {
                let main_price = total_price - (total_price*$(this).val())/100;
                $('#price').val(main_price);
                discount_in_percentage = $(this).val()
            });
            $(document).on('keyup','#amount_id',function() {
                let main_price = total_price - ($(this).val());
                discount_in_amount = $(this).val();
                $('#price').val(main_price);
            });
                nullmaking();
            });
            function total() {
                var inTotal = 0;
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        inTotal+= parseInt(product.total_price);
                    }
                    
                });
                return inTotal;
            }
            
        });
    </script>
@endsection


