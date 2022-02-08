@extends('backend.master')
@section('site-title')
    Invoice
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
            <h3 class="page-title bold">Order
                <small> Order-Managment </small>
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
                            @php
                                // dd($data->toArray());
                            @endphp
                            {{-- <div class="row">
                                 <div class="col-md-12">
                                    <label class="col-md-2 control-label"><b>Invoice Code</b></label>
                                        :   {{$data->id}}
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-2 control-label"> <b>Customer Name  </b></label>
                                        :    {{$data->customer->full_name}}
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-2 control-label"> <b>Phone </b></label>
                                    :    {{$data->customer->phone}}
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-2 control-label"><b>Address </b></label>
                                    :    {{$data->customer->address}}
                                </div>
                                <div class="col-md-12">
                                    <label class="col-md-2 control-label"><b>Date </b></label>
                                    :   
                                </div>
                            </div> --}}
                            {{-- <div class="mb-3">{!! DNS1D::getBarcodeHTML(123456, 'CODABAR') !!}</div> --}}
                            <table class="col-md-4">
                                <tr >
                                    <th><b>Invoice Code</b></th>
                                    <td >   @php echo  DNS1D::getBarcodeSVG("444564", "CODABAR",2,28,'black', true); @endphp </td>
                                </tr>
                                <tr>
                                    <th><b>Supplyer Name</th>
                                    <td>  :  {{$data->customer->full_name}}</td>
                                </tr>
                                <tr>
                                    <th><b>Phone </b></th>
                                    <td>  :  {{$data->customer->phone}}</td>
                                </tr>
                                <tr>
                                    <th><b>Address </b></th>
                                    <td>  :  {{$data->customer->address}}</td>
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
                                                    Category
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Quantity
                                                </th>
                                                <th>Discount</th>
                                                <th style="text-align: center">
                                                    Selling Price
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total=0; 
                                                $total_amount = 0;
                                                $intotal_amount = 0;
                                                $single_total =0;  
                                            @endphp
                                            @foreach ($data->products as $key2=> $item)
                                                <tr>
                                                    <td>{{++$key2}}</td>
                                                    <td>
                                                        {{$item->category->name}}
                                                    </td>
                                                    <td>
                                                        {{$item->product_name}}
                                                    </td>
                                                    <td>
                                                        {{$item->pivot->quantity}}
                                                    </td>
                                                    <td>
                                                        @php
                                                            if($item->pivot->discount_in_amount){
                                                                echo $item->pivot->discount_in_amount." TK";
                                                                $single_total = ($item->pivot->rate * $item->pivot->quantity)-$item->pivot->discount_in_amount;
                                                            }
                                                            elseif ($item->pivot->discount_in_percentage) {
                                                                echo $item->pivot->discount_in_percentage." Percent";
                                                                $single_total =(($item->pivot->rate * $item->pivot->quantity)-(($item->pivot->rate * $item->pivot->quantity)*($item->pivot->discount_in_percentage/100)));
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td style="text-align: center"> 
                                                        {{$single_total}}
                                                        @php
                                                            $total_amount += $single_total;
                                                        @endphp
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <th colspan="5" style="text-align: right"><h4><b>Total :</b></h4></th>
                                                <th  colspan="6" style="text-align: center" ><h4><b>{{$total_amount}}</b></h4></th>
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
                <a class="btn blue" style="background-color:#29931D"  href="{{ url()->previous() }}"><i class="fa fa-backward"></i>  Back</a>
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