@extends('backend.master')
@section('site-title')
    Commercial List Invoice
@endsection
@section('style')
<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
    .table td, .table th {
        font-size: 10px;
    }
   
</style>
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
            <h3 class="page-title bold">Commercial List
                <small> Certificate</small>
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
            <div class="row" id="printcertificate">
                <div class="col-md-12">
                    <div class="" style="margin-left: 2%" >
                        <div class="portlet-body" style="height: auto;">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center">
                                    <h2><b>CERTIFICATE OF ORIGIN</b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table table-bordered" style="width: 100%; font-size:50%; border: 1px solid black;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: left">Manufacture / Exporter</th>
                                            <th style="text-align: left">Consignee</th>
                                            <th style="text-align: left">Notify Party</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sale_contracts as  $key=> $data)
                                        <tr>
                                            <td><b>GLOVE FISHRIES LIMITED</b><br>ALIPUR, MAIJDEE ROAD<br>BEGUMGONG,NOAKHALI<br>BANGLADESH</td>
                                            <td>
                                                <span><b>{{$data->export_buyer->consignee_name}}</b></span><br>
                                                <span>{{$data->export_buyer->consignee_address}}</span><br>
                                                <span>{{$data->export_buyer->consignee_contact_number}}</span><br>
                                                <span>{{$data->export_buyer->consignee_email}}</span><br>
                                                <span>{{$data->export_buyer->consignee_country}}</span>
                                            </td>
                                            <td>
                                                <span><b>{{$data->export_buyer->notify_party_name}}</b></span><br>
                                                <span>{{$data->export_buyer->notify_party_address}}</span><br>
                                                <span>{{$data->export_buyer->notify_party_contact}}</span><br>
                                                <span>{{$data->export_buyer->notify_party_email}}</span><br>
                                                <span>{{$data->export_buyer->notify_party_country}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="2">Sale Contract No. :</th>
                                            <th>Date: </th>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Commercial Invoicxe No. :</th>
                                            <th>DAte: </th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="row"  style="text-align:center;" >
                                <label for="" ><b >COUNTRY ORIGIN : BANGLADESH</b></label>
                            </div><br>
                            <div class="row">
                                <table class="table table-striped table-hover"  style='font-family:"verdana", monospace; font-size:50%; border: 1px solid black; width:100%'>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">Sl.</th>
                                            <th style="text-align: center">HS Code</th>
                                            <th style="text-align: center">Item Name</th>
                                            <th style="text-align: center">Category</th>
                                            <th style="text-align: center">Variant</th>
                                            <th style="text-align: center">Grade</th>
                                            <th style="text-align: center">Quantity / MC</th>
                                            <th style="text-align: center">Net Weight</th>
                                            <th style="text-align: center">Gross Weight</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $expototal_amount = 0;
                                            $total_master_carton = 0;
                                        @endphp
                                        @foreach ($sale_contracts as $item)
                                            @foreach ($item->sales_contract_items as $key=> $s_c_item)
                                                <tr>
                                                    <td style="text-align: center">{{++$key}}</td>
                                                    <td style="text-align: center">{{$s_c_item->hs_code}}</td>
                                                    <td style="text-align: center">{{$s_c_item->supply_item->name}}</td>
                                                    <td style="text-align: center">{{$s_c_item->processing_type}}</td>
                                                    <td style="text-align: center">{{$s_c_item->processing_variant}}</td>
                                                    <td style="text-align: center">{{$s_c_item->fish_grade->name}}</td>
                                                    <td style="text-align: center">{{$s_c_item->cartons}}</td>
                                                    @php
                                                        $total_master_carton += $s_c_item->cartons;
                                                    @endphp
                                                    <td style="text-align: center">{{$item->net_weight}}</td>
                                                    <td style="text-align: center">{{$item->gross_weight}}</td>
                                                    @php
                                                        $expototal_amount += $s_c_item->total_amount;
                                                    @endphp
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        <tr>
                                            <th colspan="6">Total</th>
                                            <th style="text-align: center">{{$total_master_carton}}</th>
                                            <th colspan="4" style="text-align: right"></th>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <h6><b>TOTAL AMOUNT (IN WORD) :</b></h6>
                            </div><br>
                            <div class="row">
                                <table  class="table table-striped table-hover table-bordered"  style='font-family:"helvetica", monospace; font-size:70%; border: 1px solid black; width:100%; border-collapse: initial'>
                                    @foreach ($sale_contracts as $sale_contract)
                                        <tr>
                                            <th style="text-align: left">Payment Method</th>
                                            <td>{{$sale_contract->payment_method}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left">Pre-Carriage By</th>
                                            <td>{{$sale_contract->pre_carring_by}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left">Port of Loading</th>
                                            <td>{{$sale_contract->port_of_loading}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left">Port Of Dischargr</th>
                                            <td>{{$sale_contract->port_of_discharge}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left">Final Destination</th>
                                            <td>{{$sale_contract->final_destination}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left">Marks & Nos/Cointainer</th>
                                            <td>RA 003474387</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left">No. & King of pkgs</th>
                                            <td>{{$sale_contract->exp_no}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div><br>
                        <div class="row">
                            <table class="table table-striped table-hover table-bordered" style='font-family:"helvetica", monospace; font-size:70%; border: 1px solid black; width:100%; border-collapse: initial'>
                                <td>
                                    <span style="text-align: center"><h3><b>CERTIFICATE</b></h3></span>
                                    <span style="text-align: center"><p>It is hereby certified that to the best our knowledge and belief the above mentioned goods are of<br> Bangladesh Origin</p></span>
                                    <span style="text-align: center"><h3><b>STAMP</b></h3></span>
                                    <span style="text-align: center"><p>The Noakhali Chamber of commerce & Industry</p></span>
                                </td>
                            </table>
                        </div>
                        
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div><br>
            <!-- END PAGE CONTENT-->
            <div class="row" style="text-align: center" >
                <a class="btn blue" style="background-color:#29931D"  href="{{ url()->previous() }}"><i class="fa fa-backward"></i>  Back</a>
                <button id="printbtn"  class="btn red"><i class="fa fa-print" aria-hidden="true">  Print Invoice</i></button>
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