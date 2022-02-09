@extends('backend.master')
@section('site-title')
    Requisition
@endsection
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
            <h3 class="page-title bold">Requisition
                <small> Requisition-managment </small>
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
            <!-- BEGIN PAGE CONTENT-->
            <div class="row" id="printrequisition">
                <div class="col-md-12">
                    <div class="" style="margin-left: 2%" >
                        <div class="portlet-body">
                            <div class="col" style="text-align: center">
                                <h2><b>GLOBE FISHERIES LIMITED</b>
                                </h2>
                            </div>
                            <div class="col" style="text-align: center">
                                <h5>Mirwarishpur, Begumganj, Noakhali
                                </h5>
                            </div>
                            <div class="col" style="text-align: center">
                                Phone: +8801 562 458 621, 02 5865235, Email: sales@globefisheries.com
                            </div><br><br>
                            {{-- <div class="col" >
                                @php echo  DNS1D::getBarcodeSVG($requisition->id, "CODABAR",2,28,'black', false); @endphp
                                <br>
                                Invoice No: {{$requisition->id}}
                                
                            </div> --}}
                            <div class="col" style="text-align: right">
                               <b>Date :</b> @php
                               use Carbon\Carbon;
                               $currentTime = Carbon::now();
                               echo $currentTime->toDateTimeString();
                           @endphp
                            </div>
                            <div class="col">
                                <h5><b>Info</b></h5>
                                <p>Department: {{$requisition->departments->name}}</p>
                                <p>Requested By: {{$requisition->users->name}}</p>
                                {{-- {{$data->production_supplier->name}}<br>
                                {{$data->production_supplier->phone}}<br>
                                {{$data->production_supplier->address}}<br><br><br> --}}
                            </div>
                           
                            {{--<div class="row">
                                 <div class="col-md-12">
                                    <label class="col-md-2 control-label"><b>Invoice Code</b></label>
                                        :   {{$data->invoice_code}}
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-2 control-label"> <b>Supplyer Name  </b></label>
                                        :    {{$data->production_supplier->name}}
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-2 control-label"> <b>Phone </b></label>
                                    :    {{$data->production_supplier->phone}}
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-2 control-label"><b>Address </b></label>
                                    :    {{$data->production_supplier->address}}
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-2 control-label"><b>Date </b></label>
                                    :   
                                </div>
                            </div> --}}
                            {{-- <table class="col-md-4">
                                <tr >
                                    <th><b>Invoice Code</b></th>
                                    <td>  :  {{$data->invoice_code}}</td>
                                </tr>
                                <tr>
                                    <th><b>Supplyer Name</th>
                                    <td>  :  {{$data->production_supplier->name}}</td>
                                </tr>
                                <tr>
                                    <th><b>Phone </b></th>
                                    <td>  :  {{$data->production_supplier->phone}}</td>
                                </tr>
                                <tr>
                                    <th><b>Address </b></th>
                                    <td>  :  {{$data->production_supplier->address}}</td>
                                </tr>
                                <tr>
                                    <th><b>Date </b></th>
                                    <td> 
                                        :   @php
                                            use Carbon\Carbon;
                                            $currentTime = Carbon::now();
                                            echo $currentTime->toDateTimeString();
                                        @endphp
                                    </td>
                            </table><br><br><br> --}}
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><b>Products</b></h4>
                                </div>
                                <div class="col-md-12">
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
                                                {{-- <th>
                                                    Action
                                                </th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <tr>
                                                    <td>{{++$key2}}</td>
                                                    <td><ul><li>{{$requisition->items->pivot->image}}</li><li>{{$item->pivot->item_name}}</li><li>{{$item->pivot->item_type_name}}</li><li>{{$item->pivot->item_unit_name}}</li></ul></td>
                                                    <td>{{$requisition->items->pivot->demand_date}}</td>
                                                    <td>{{$requisition->items->pivot->quantity}}</td>
                                                    <td>{{$requisition->items->pivot->specification}}</td>
                                                    <td>{{$requisition->items->pivot->remark}}</td>
                                                    {{-- <td><button class="btn btn-success">Edit</button><button class="btn btn-danger">Delete</button></td> --}}
                                                </tr>
                                                {{-- <div id="addProductModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                    {{csrf_field()}}
                                                    <input type="hidden" value="" id="delete_id">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{route('requisition.receive.updatesubmitted')}}" method="POST">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                    <h2 class="modal-title" style="color: rgb(75, 65, 65);">Add Products</h2>
                                                                </div>
                                                                <br>
                                                                <div class="modal-body">
                                                                        @csrf
                                                                        <input type="hidden" name="requisition_id" value="{{$data->id}}">
                                                                        @foreach ($data->products as $keyupdated => $value)
                                                                            <div class="m-5 row">
                                                                                <input type="hidden" name="requisition_product_id[{{$keyupdated}}]" value="{{$value->pivot->id}}">
                                                                                <div class="col-md-4">
                                                                                    <b>Product Name: {{$value->product_name}}</b>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <b>Requested Quantity: {{$value->pivot->quantity}}</b>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <input name="final_quantity[{{$keyupdated}}]" value="{{$value->pivot->final_quantity}}" class="form-control" type="number" required placeholder="Dispatch Quantity">
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                </div>
                                                                <br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="m-10 btn btn-success">Save</button>
                                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
            <div class="row" style="text-align: center" >
                {{-- <a class="btn blue" style="background-color:#29931D"  href="{{ route('production-requisition.index',['status'=>'Approved','page'=>1])}}"><i class="fa fa-backward"></i>  Back</a> --}}
                <button id="printbtn" class="btn red" ><i class="fa fa-print" aria-hidden="true">  Print Invoice</i></button>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
       jQuery(document).ready(function() {
            $("#printbtn").click(function () {
                $("#printrequisition").print({
                    mediaPrint : false,
                });
            });
        });
    </script>
@endsection