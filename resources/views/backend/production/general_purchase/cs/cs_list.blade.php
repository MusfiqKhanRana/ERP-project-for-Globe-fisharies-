@extends('backend.master')
@section('site-title')
    CS List
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
                <i class="fa fa-briefcase"></i>CS List
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
                                             @foreach ($data->production_requisition_item as $key2 => $item)
                                             @if($item->status == "ShowQuotation") 
                                                <tr>
                                                    <td>{{++$key2}}</td>
                                                    <td>{{$item->image}}</li><li>{{$item->item_name}}</li><li>{{$item->item_type_name}}</li><li>{{$item->item_unit_name}}</td>
                                                    <td>{{$item->demand_date}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{$item->specification}}</td>
                                                    <td>{{$item->remark}}</td>  
                                                    <td>
                                                        <a class="btn btn-success addquation" href="{{route('production-cs-show',$item->id)}}"> Confirm Quationtion </a>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection

