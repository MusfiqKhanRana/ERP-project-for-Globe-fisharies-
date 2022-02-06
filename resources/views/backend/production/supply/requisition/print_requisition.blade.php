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
                    <div class="portlet box blue-chambray">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-briefcase"></i>Requisition
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body" style="background-image: url('C:\Users\GTCL-Core PC DEV\Pictures\Screenshots\Medical.PNG')">
                            <div class="row">
                                <div class="col">
                                    <h4>Invoice Code:   <b>
                                        @php
                                            echo uniqid();
                                        @endphp
                                    </b></h4>
                                </div>
                                <div class="col">
                                    <h4>Supplyer Name:   <b>{{$data->production_supplier->name}}</b></h4>
                                </div>
                                <div class="col">
                                    <h4>Phone: <b>{{$data->production_supplier->phone}}</b>  </h4>
                                </div>
                                <div class="col">
                                    <h4>Address: <b>{{$data->production_supplier->address}}</b>  </h4>
                                </div>
                                <div class="col">
                                    <h4>Date: <b>
                                        @php
                                          use Carbon\Carbon;
                                            $currentTime = Carbon::now();
                                            echo $currentTime->toDateTimeString();
                                        @endphp
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <h4>Products</h4>
                                </div>
                                <div class="col">
                                    <table class="table table-striped table-bordered table-hover">
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
                                                    <td style="text-align: center"> @php
                                                        $total+=$item->pivot->quantity*$item->pivot->rate;
                                                    @endphp
                                                    {{$item->pivot->quantity*$item->pivot->rate}}</td>
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
            <div class="row">
                <button id="printbtn" class="btn btn-primary" >Print</button>
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