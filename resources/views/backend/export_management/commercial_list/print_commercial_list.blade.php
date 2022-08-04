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
    
   
    #dvContainer {
        background-color: rgb(255, 255, 255);
    }
    @media print {
        body * {
            margin-block-end: 20%;
           visibility: hidden; // part to hide at the time of print
           -webkit-print-color-adjust: exact !important; // not necessary use if colors not visible
        }
        body {
        margin: 2.5cm 0;
        }
        
        .table th *{
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
            <h3 class="page-title bold">Commercial List
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
                        <div class="portlet-body" style="height: auto;">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center">
                                    <h2><b>COMMERCIAL INVOICE</b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    GFL/EXP/DUBAI/HRA/01/2022/S01
                                </div>
                                <div class="col-md-6" style="text-align: right">
                                    <b>Date :</b> @php
                                    use Carbon\Carbon;
                                    $currentTime = Carbon::now();
                                    echo $currentTime->toDateString();
                                @endphp
                                 </div>
                                
                            </div><br>
                            <div class="row" style="background-color:#d6d9e3">
                                <table class="table table-bordered" style="width: 100%; font-size:50%;">
                                    <thead>
                                        <tr>
                                            <th>Manufacture / Exporter</th>
                                            <th>Consignee</th>
                                            <th>Notify Party</th>
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
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3; text-align:center;" >
                                <label for="" ><b >COUNTRY ORIGIN : BANGLADESH</b></label>
                            </div><br>
                            <div class="row">
                                <table class="table table-striped table-hover"  style='font-family:"verdana", monospace; font-size:50%'>
                                    <thead>
                                        <tr style="background-color:#d6d9e3">
                                            <th style="text-align: center">Sl.</th>
                                            <th style="text-align: center">HS Code</th>
                                            <th style="text-align: center">Production Date</th>
                                            <th style="text-align: center">EXP Date</th>
                                            <th style="text-align: center">Type</th>
                                            <th style="text-align: center">Item</th>
                                            <th style="text-align: center">Variant</th>
                                            <th style="text-align: center">Grade</th>
                                            <th style="text-align: center">Scientific Name</th>
                                            <th style="text-align: center"> Quantity / Master Carton</th>
                                            <th style="text-align: center">Pack Size</th>
                                            <th style="text-align: center">Rate Per Kg CFR (USD $)</th>
                                            <th style="text-align: center">Rate Per Master Carton CFR (USD $)</th>
                                            <th style="text-align: center">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $expototal_amount = 0;
                                            $total_master_carton = 0;
                                        @endphp
                                        @foreach ($sale_contracts as $item)
                                            @foreach ($item->sales_contract_items as $s_c_item)
                                                <tr>
                                                    <td style="text-align: center"></td>
                                                    <td style="text-align: center">{{$s_c_item->hs_code}}</td>
                                                    <td style="text-align: center">{{$item->production_date}}</td>
                                                    <td style="text-align: center">{{$s_c_item->expiry_date}}</td>
                                                    <td style="text-align: center">{{$s_c_item->processing_type}}</td>
                                                    <td style="text-align: center">{{$s_c_item->supply_item->name}}</td>
                                                    <td style="text-align: center">{{$s_c_item->processing_variant}}</td>
                                                    <td style="text-align: center">{{$s_c_item->fish_grade->name}}</td>
                                                    <td style="text-align: center">Pangasius Hypophthalmus</td>
                                                    <td style="text-align: center">{{$s_c_item->cartons}}</td>
                                                    @php
                                                        $total_master_carton += $s_c_item->cartons;
                                                    @endphp
                                                    <td style="text-align: center">{{$s_c_item->export_pack_size_id}}</td>
                                                    <td style="text-align: center">{{$s_c_item->total_cfr_rate}}</td>
                                                    <td style="text-align: center">{{$s_c_item->total_amount_cfr}}</td>
                                                    <td style="text-align: center">{{$s_c_item->total_amount}}</td>
                                                    @php
                                                        $expototal_amount += $s_c_item->total_amount;
                                                    @endphp
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        <tr  style="background-color:#d6d9e3">
                                            <th colspan="9">Total Master Carton & Weight </th>
                                            <th style="text-align: center">{{$total_master_carton}}</th>
                                            <th colspan="4" style="text-align: right">{{$expototal_amount}}</th>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <h6><b>TOTAL AMOUNT (IN WORD) :</b></h6>
                            </div><br>
                            <div class="row">
                                <table  class="table table-striped table-hover table-bordered"  style='font-family:"Poppins", monospace; font-size:80%'>
                                    @foreach ($sale_contracts as $sale_contract)
                                        <tr>
                                            <th style="background-color:#d6d9e3">Sale Contract No.</th>
                                            <td>GFL/EXP/DUBAI/HRA/07/2022</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Sale Contract Date</th>
                                            <td>2022/07/11</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Payment Method</th>
                                            <td>{{$sale_contract->payment_method}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">EXP No.</th>
                                            <td>{{$sale_contract->exp_no}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">EXP Date</th>
                                            <td>{{$sale_contract->exp_date}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Port Of Dischargr</th>
                                            <td>{{$sale_contract->port_of_discharge}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Pre-Carriage By</th>
                                            <td>{{$sale_contract->pre_carring_by}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Partial Shipment</th>
                                            <td>
                                                @if($sale_contract->partial_shipment == 0)
                                                    <span>Not Allowed</span>
                                                @else
                                                    <span>Allowed</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Final Destination</th>
                                            <td>{{$sale_contract->final_destination}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">ERC No.</th>
                                            <td>RA 003474387</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Vat Regd No.</th>
                                            <td>RA 003474387</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Tin No.</th>
                                            <td>RA 003474387</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Total Master Cartons</th>
                                            <td>{{$sale_contract->cartons}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Net Weight</th>
                                            <td>{{$sale_contract->net_weight}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">Gross Weight</th>
                                            <td>{{$sale_contract->gross_weight}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3">CBM</th>
                                            <td>{{$sale_contract->cbm}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
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