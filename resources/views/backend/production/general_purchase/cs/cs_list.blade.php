@extends('backend.master')
@section('site-title')
    Add Requisition
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <h3 class="page-title bold">Purchase Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Quotation List
                </div>
                    {{-- <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#add_procution_purchase_units">
                            Add New
                        <i class="fa fa-plus"></i> </a>
                    </div> --}}
                    <div class="tools">
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Department</th>
                            <th>Requested By</th>
                            <th>Remark</th>
                            <th>Items</th>
                            {{-- <th style="text-align: center">Action</th> --}}
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($requisition as $key=> $data)
                            {{-- @php
                                dd($data);
                            @endphp --}}
                            <tr id="row1">
                                <td>{{++ $key }}</td>
                                <td class="text-align: center;"> {{$data->departments->name}}</td>
                                <td class="text-align: center;"> {{$data->users->name}}</td>
                                <td class="text-align: center;"> {{$data->remark}}</td>
                                <td class="text-align: center;">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Sl.
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
                                                    Remark
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             @foreach ($data->items as $key2 => $item) 
                                               
                                                <tr>
                                                    <td>{{++$key2}}</td>
                                                    <td>{{$item->pivot->image}}</li><li>{{$item->pivot->item_name}}</li><li>{{$item->pivot->item_type_name}}</li><li>{{$item->pivot->item_unit_name}}</td>
                                                    <td>{{$item->pivot->demand_date}}</td>
                                                    <td>{{$item->pivot->quantity}}</td>
                                                    <td>{{$item->pivot->specification}}</td>
                                                    <td>{{$item->pivot->remark}}</td>  
                                                    
                                                        <td>
                                                            @if ($item->pivot->status === "AddQuotation")
                                                            <a class="btn btn-success addquation" data-toggle="modal" href="#addquation" data-pivot="{{$item->pivot}}" data-all="{{$data}}"> Add Quationtion </a>
                                                            @endif
                                                        </td>
                                                   
                                                    
                                                        <td>
                                                            @if ($item->pivot->status == "ShowQuotation")
                                                            <a class="btn btn-success addquation" href="{{route('production-quotation-all-list.create')}}" data-pivot="{{$item->pivot}}" data-all="{{$data}}"> Show Quationtion </a>
                                                            @endif
                                                        </td>
                                                    
                                                    
                                                        <td>
                                                            @if ($item->pivot->status == "ConfirmQuotation")
                                                            <a class="btn btn-success addquation" href="{{route('production-quotation-confirmquotation')}}" data-pivot="{{$item->pivot}}" data-all="{{$data}}"> Confirm Quationtion </a>
                                                            @endif
                                                        </td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div id="addquation" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h2 class="modal-title">Add Supplier for Requisition</h2>
                                </div>
                                
                                    <div class="row" style="margin: 3%" >
                                        <p ><b>Item name:</b> <span id="item_name"></span> </p>
                                        <p ><b>Department:</b> <span id="department"></span> </p>
                                        <p ><b>Request By:</b> <span id="request_by"></span></p>
                                        <p ><b>Demand Date:</b> <span id="demand_date"></span> </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label class="col-md-3 control-label"> Supplier</label>
                                            <select class="form-control supplier_name" style="margin-left: 5%" id="supplier_id" name="supplier_id">
                                                <option selected>Select Supplier</option>
                                                @foreach ($supplier as $item)
                                                    <option value="{{$item->id}}" data-supplier_name="{{$item->name}}">{{$item->name}}</option>
                                                @endforeach 
                                            </select>
                                            {{-- <div >
                                                <button class="btn btn-info" style="margin-left: 7%">+ Add Supplier</button>
                                            </div> --}}
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-md-3 control-label">Price</label>
                                            <input type="text" class="form-control" placeholder="Price" id="price" name="price">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-md-3 control-label">Speciality</label>
                                                <input type="text" class="form-control" placeholder="Speciality" id="speciality" name="speciality" >
                                        </div>
                                        <div class="col-md-1">
                                            <label></label>
                                            <button type="button" class="btn btn-success ItemAdd" style="margin-top: =10%">+  Add</button>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-md-2 control-label">Supllier Info</label>
                                        <div class="col-md-9">
                                            <table  class="table table-striped table-bordered table-hover itemsTable">
                                                <tr>
                                                    <th>Supplier Name</th>
                                                    <th>Price</th>
                                                    <th>Speciality</th>
                                                    <th>Action</th>
                                                </tr>
                                                <tr>
        
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <form class="form-horizontal" action="{{route('production-quotation-all-list.store')}}" method="POST">
                                        {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                        <input type="hidden" value="" id="requisition_item_id" name="requisition_item_id">
                                        <input type="hidden" value="" id="requisition_id" name="requisition_id">
                                        <input type="hidden" value="" id="provided_item" name="provided_item">
                                        <div class="col-md-9">
                                            <textarea type="text" class="form-control"  name="remark"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                        <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Submit</button>
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

