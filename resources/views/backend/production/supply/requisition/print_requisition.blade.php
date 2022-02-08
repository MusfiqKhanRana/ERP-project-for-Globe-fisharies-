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
                            <table class="col-md-4">
                                <tr >
                                    <th><b>Invoice Code</b></th>
                                    <td >  :  {{$data->invoice_code}}</td>
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
                            </table><br><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><b>Products</b></h4>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Sl.
                                                </th>
                                                <th>
                                                    Item
                                                </th>
                                                <th>
                                                    Grade
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                <th>Rate</th>
                                                <th style="text-align: center">
                                                    Amount
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                             $total=0;   
                                            @endphp
                                            @foreach ($data->production_requisition_items as $key2=> $item)
                                                <tr>
                                                    <td>{{++$key2}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->grade->name}}</td>
                                                    <td>
                                                        {{$item->pivot->quantity}}
                                                    </td>
                                                    <td>
                                                        {{$item->pivot->rate}}
                                                    </td>
                                                    <td style="text-align: center"> 
                                                        @php
                                                            $total+=$item->pivot->quantity*$item->pivot->rate;
                                                        @endphp
                                                        {{$item->pivot->quantity*$item->pivot->rate}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th colspan="5" style="text-align: right"><h4><b>Total :</b></h4></th>
                                                <th  colspan="6" style="text-align: center" ><h4><b>{{$total}}</b></h4></th>
                                            </tr>
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
                <a class="btn blue" style="background-color:#29931D"  href="{{ route('production-requisition.index',['status'=>'Approved','page'=>1])}}"><i class="fa fa-backward"></i>  Back</a>
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
                $("#printrequisition").print();
            });
        });
    </script>
@endsection