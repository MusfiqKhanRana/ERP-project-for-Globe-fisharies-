@extends('backend.master')
@section('site-title')
    Sale Contract Invoice
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
    .table tr th *{
            text-align: left;
        }
   
    #dvContainer {
        background-color: rgb(255, 255, 255);
    }
    @media print {
        body * {
            margin-block-end: 20%;
           visibility: hidden; // part to hide at the time of print
           
        }
        body {
        margin: 2.5cm 0;
        }
        
        .table tr th *{
            text-align: left;
        }
        #dvContainer {
           background-color: blue !important;
        }
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
            <h3 class="page-title bold">Sale Contract
                <small> Invoice</small>
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
            <div class="row" id="dvContainer">
                <div class="col-md-12">
                    <div class="" style="margin-left: 2%" >
                        <div class="portlet-body" style="height: auto; margin-top:7%">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center">
                                    <h2><b>SALES CONTRACT</b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <span> GFL/EXP/DUBAI/HRA/01/2022/S01</span>
                                <span style="margin-left:45%">
                                    <b>Date :</b> 
                                    @php
                                        use Carbon\Carbon;
                                        $currentTime = Carbon::now();
                                        echo $currentTime->toDateString();
                                    @endphp
                                </span>
                            </div><br>
                            <div class="row" style="background-color:#d6d9e3">
                                <table class="table table-bordered" style="width: 100%; font-size:70%;  border: 1px solid black">
                                    <thead>
                                        <tr>
                                            <th style="text-align: left">Manufacture / Exporter</th>
                                            <th style="text-align: right">Consignee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sale_contracts as  $key=> $data)
                                        <tr>
                                            <td><b>Globe Fishries Limited</b><br>Alipur, Maijdee Road<br>Begumgong, Noakhali<br>Bangladesh</td>
                                            <td style="text-align: right">
                                                <span><b>{{$data->export_buyer->consignee_name}}</b></span><br>
                                                <span>{{$data->export_buyer->consignee_address}}</span><br>
                                                <span>{{$data->export_buyer->consignee_contact_number}}</span><br>
                                                <span>{{$data->export_buyer->consignee_email}}</span><br>
                                                <span>{{$data->export_buyer->consignee_country}}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3; text-align:center;  border: 1px solid black" >
                                <label for="" ><b >COUNTRY ORIGIN : BANGLADESH</b></label>
                            </div><br>
                            <div class="row">
                                <table class="table table-striped table-bordered table-hover" style='font-family:"helvetica", monospace; font-size:70%; border: 1px solid black; border-collapse: initial'>
                                    <thead>
                                        <tr style="background-color:#d6d9e3">
                                            <th style="text-align: center; border: 1px solid black">Sl.</th>
                                            <th style="text-align: center; border: 1px solid black">HS Code</th>
                                            <th style="text-align: center; border: 1px solid black">Type</th>
                                            <th style="text-align: center; border: 1px solid black">Item</th>
                                            <th style="text-align: center; border: 1px solid black">Variant</th>
                                            <th style="text-align: center; border: 1px solid black">Grade</th>
                                            <th style="text-align: center; border: 1px solid black">Scientific Name</th>
                                            <th style="text-align: center; border: 1px solid black"> Quantity / Master Carton</th>
                                            <th style="text-align: center; border: 1px solid black">Pack Size / MC size</th>
                                            <th style="text-align: center; border: 1px solid black">Rate Per Kg CFR (USD $)</th>
                                            <th style="text-align: center; border: 1px solid black">Rate Per Master Carton CFR (USD $)</th>
                                            <th style="text-align: center; border: 1px solid black">Rate Per Kg CIF (USD $)</th>
                                            <th style="text-align: center; border: 1px solid black">Rate Per Master Carton CIF (USD $)</th>
                                            <th style="text-align: center; border: 1px solid black">Total Amount</th>
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
                                                    <td style="text-align: center; border: 1px solid black">{{++$key}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->hs_code}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->processing_type}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->supply_item->name}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->processing_variant}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->fish_grade->name}}</td>
                                                    <td style="text-align: center; border: 1px solid black">Pangasius Hypophthalmus</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->cartons}}</td>
                                                    @php
                                                        $total_master_carton += $s_c_item->cartons;
                                                    @endphp
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->export_pack_size->name}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->total_cfr_rate}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->total_amount_cfr}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->total_cif_rate}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->total_amount_cif}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->total_amount}}</td>
                                                    @php
                                                        $expototal_amount += $s_c_item->total_amount;
                                                    @endphp
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        <tr  style="background-color:#d6d9e3">
                                            <th colspan="7" style="text-align: center; border: 1px solid black">Total Master Carton & Amount </th>
                                            <th style="text-align: center; border: 1px solid black">{{$total_master_carton}}</th>
                                            
                                            <th colspan="6" style="text-align: right; border: 1px solid black">{{$expototal_amount}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <h5><b>TOTAL AMOUNT (IN WORD) :   </b></h5>
                                    <b><h4>
                                        @php
                                        
                                            $digit = new NumberFormatter("EN", NumberFormatter::SPELLOUT);
                                            echo ucfirst($digit->format($expototal_amount)); 
                                        @endphp
                                    </h4></b>
                                    
                            </div><br>
                            <div class="row">
                                <table  class="table table-striped table-hover table-bordered"  style='width:100%; font-size:80%'>
                                    @foreach ($sale_contracts as $sale_contract)
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Payment Method</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->payment_method}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Port Of Loading</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->port_of_loading}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Advising Bank</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->advising_bank->bank_name}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Port Of Discharge</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->port_of_discharge}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Importer Bank</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->bank_name}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Pre Carriage By</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->final_destination}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Bank Charge</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->port_of_discharge}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Partial Shipment</th>
                                            <td style=" border: 1px solid black">
                                                @if($sale_contract->partial_shipment == 0)
                                                    <span>Not Allowed</span>
                                                @else
                                                    <span>Allowed</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Shipment Remark</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->remark}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Offer Validity</th>
                                            <td style=" border: 1px solid black">{{$sale_contract->offer_validity}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 25%">
                                <span style="text-decoration:overline"><b>Exporter Signature</b></span>
                                <span style="margin-left:55%; text-decoration:overline"><b>Imporeter Signature</b></span>
                        </div><br>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div><br>
            <!-- END PAGE CONTENT-->
            <div class="row" style="text-align: center" >
                <a class="btn blue" style="background-color:#29931D"  href="{{ url()->previous() }}"><i class="fa fa-backward"></i>  Back</a>
                <button id="printNow" onclick="divPrinting();" class="btn red" ><i class="fa fa-print" aria-hidden="true">  Print Invoice</i></button>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    function addStyling(){
      document.style.background = "skyblue";
    }
    function divPrinting(){
    var divContents = document.getElementById("dvContainer").innerHTML; 
          var a = window.open('', '', 'left=40','top=40','height=500', 'width=800'); 
          a.document.write('<html>'); 
          a.document.write('<head> <title> document-printed-by-javascript </title> </head>'); 
          a.document.write('<body>'); 
          a.document.write(divContents); 
          a.document.write('</body></html>'); 
          a.document.close(); 
          a.print();
    }
  </script>