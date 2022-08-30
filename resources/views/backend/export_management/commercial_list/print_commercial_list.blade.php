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
                                <span> GFL/EXP/DUBAI/HRA/01/2022/S01</span>
                                <span style="margin-left: 45%">
                                    <b>Date :</b> 
                                    @php
                                        use Carbon\Carbon;
                                        $currentTime = Carbon::now();
                                        echo \Carbon\Carbon::now("Asia/Dhaka")->format('d-m-Y')
                                    @endphp
                                </span>
                            </div><br>
                            <div class="row" style="background-color:#d6d9e3">
                                <table class="table table-bordered" style='font-family:"helvetica", monospace; font-size:70%; width:100%; border: 1px solid black; border-collapse: initial'>
                                    <thead>
                                        <tr>
                                            <th style="text-align: left">Manufacture / Exporter</th>
                                            <th style="text-align: left">Consignee</th>
                                            <th style="text-align: left">Notify Party</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3; text-align:center; border: 1px solid black" >
                                <label for="" ><b >COUNTRY ORIGIN : BANGLADESH</b></label>
                            </div><br>
                            <div class="row">
                                <table class="table table-striped table-hover"  style='font-family:"helvetica", monospace; font-size:70%; border: 1px solid black; border-collapse: initial'>
                                    <thead>
                                        <tr style="background-color:#d6d9e3">
                                            <th style="text-align: center; border: 1px solid black;">Sl.</th>
                                            <th style="text-align: center; border: 1px solid black">HS Code</th>
                                            <th style="text-align: center; border: 1px solid black">Production Date</th>
                                            <th style="text-align: center; border: 1px solid black">EXP Date</th>
                                            <th style="text-align: center; border: 1px solid black">Type</th>
                                            <th style="text-align: center; border: 1px solid black">Item</th>
                                            <th style="text-align: center; border: 1px solid black">Variant</th>
                                            <th style="text-align: center; border: 1px solid black">Grade</th>
                                            <th style="text-align: center; border: 1px solid black">Scientific Name</th>
                                            <th style="text-align: center; border: 1px solid black"> Quantity / Master Carton</th>
                                            <th style="text-align: center; border: 1px solid black">Pack Size</th>
                                            <th style="text-align: center; border: 1px solid black">Rate Per Kg CFR (USD $)</th>
                                            <th style="text-align: center; border: 1px solid black">Rate Per Master Carton CFR (USD $)</th>
                                            <th style="text-align: center; border: 1px solid black">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $expototal_amount = 0;
                                            $total_master_carton = 0;
                                        @endphp
                                            @foreach ($data->sales_contract_items as $key=> $s_c_item)
                                                @php
                                                    $grade = null;
                                                    $itme_array= $s_c_item->toArray();
                                                        if ($s_c_item->fish_grade_id != null)
                                                            $grade = $itme_array['fish_grade']['name']
                                                @endphp
                                                <tr>
                                                    <td style="text-align: center; border: 1px solid black">{{++$key}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->hs_code}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$data->production_date}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->expiry_date}}</td>
                                                    <td style="text-align: center; border: 1px solid black">
                                                        @php
                                                            $replace = str_replace("_"," ",$s_c_item->processing_type);
                                                        @endphp
                                                        {{ucwords($replace)}}
                                                    </td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->supply_item->name}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{ucfirst($s_c_item->processing_variant)}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$grade}}</td>
                                                    <td style="text-align: center; border: 1px solid black">Pangasius Hypophthalmus</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->cartons}}</td>
                                                    @php
                                                        $total_master_carton += $s_c_item->cartons;
                                                    @endphp
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->export_pack_size_id}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->total_cfr_rate}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->total_amount_cfr}}</td>
                                                    <td style="text-align: center; border: 1px solid black">{{$s_c_item->total_amount}}</td>
                                                    @php
                                                        $expototal_amount += $s_c_item->total_amount;
                                                    @endphp
                                                </tr>
                                            @endforeach
                                        <tr  style="background-color:#d6d9e3; border: 1px solid black">
                                            <th colspan="9"; style="border: 1px solid black">Total Master Carton & Weight </th>
                                            <th style="text-align: center; border: 1px solid black">{{$total_master_carton}}</th>
                                            <th colspan="4" style="text-align: right; border: 1px solid black">{{$expototal_amount}}</th>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <h6><b>TOTAL AMOUNT (IN WORD) :</b> 
                                @php
                                    $digit = new NumberFormatter("EN", NumberFormatter::SPELLOUT);
                                    echo ucfirst($digit->format($expototal_amount)); 
                                @endphp</h6>
                            </div><br>
                            <div class="row">
                                <table  class="table table-striped table-hover table-bordered"  style='font-family:"helvetica", monospace; font-size:70%; width:100%; border: 1px solid black; border-collapse: initial'>
                                    {{-- @foreach ($sale_contracts as $sale_contract) --}}
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Sale Contract No.</th>
                                            <td style="text-align:left; border: 1px solid black">GFL/EXP/DUBAI/HRA/07/2022</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Final Destination</th>
                                            <td style="text-align:left; border: 1px solid black">{{$data->final_destination}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Sale Contract Date</th>
                                            <td style="text-align:left; border: 1px solid black">2022/07/11</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">ERC No.</th>
                                            <td style=" text-align:left; border: 1px solid black">RA 003474387</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Payment Method</th>
                                            <td style="text-align:left; border: 1px solid black">{{$data->payment_method}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Vat Regd No.</th>
                                            <td style=" text-align:left; border: 1px solid black">RA 003474387</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">EXP No.</th>
                                            <td style=" text-align:left; border: 1px solid black">{{$data->exp_no}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Tin No.</th>
                                            <td style=" text-align:left; border: 1px solid black">RA 003474387</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">EXP Date</th>
                                            <td style="text-align:left; border: 1px solid black">{{$data->exp_date}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Total Master Cartons</th>
                                            <td style="text-align:left; border: 1px solid black">{{$total_master_carton}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Port Of Dischargr</th>
                                            <td style="text-align:left; border: 1px solid black">{{$data->port_of_discharge}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Net Weight</th>
                                            <td style="text-align:left; border: 1px solid black">{{$data->net_weight}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Pre-Carriage By</th>
                                            <td style="text-align:left; border: 1px solid black">{{$data->pre_carring_by}}</td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Gross Weight</th>
                                            <td style="text-align:left; border: 1px solid black">{{$data->gross_weight}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">Partial Shipment</th>
                                            <td style="text-align:left; border: 1px solid black">
                                                @if($data->partial_shipment == 0)
                                                    <span>Not Allowed</span>
                                                @else
                                                    <span>Allowed</span>
                                                @endif
                                            </td>
                                            <th style="background-color:#d6d9e3; text-align:left; border: 1px solid black">CBM</th>
                                            <td style="text-align:left; border: 1px solid black">{{$data->cbm}}</td>
                                        </tr>
                                    {{-- @endforeach --}}
                                </table>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 25%;">
                            <div class="row">
                                <div class="col-md-6">
                                    <span style="margin-left: 0%"><b>Declaration:</b><br>
                                    We declare that this invoice shows that actual price of goods<br> described and that particulars are true and correct</span>
                                </div>
                                <div class="col-md-6" style="margin-left:45%">
                                    <span style="margin-left:45%; text-align:right; text-decoration:overline">Globe Fisheries Limited</span><br> <span style="margin-left:45%">Authorized Signatory</span>
                                </div>
                            </div>
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