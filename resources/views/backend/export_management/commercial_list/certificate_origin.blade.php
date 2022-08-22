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
            <div class="row" id="dvContainer">
                <div class="col-md-12">
                    <div class="" style="margin-left: 2%" >
                        <div class="portlet-body" style="height: auto;">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center">
                                    <h2><b>CERTIFICATE OF ORIGIN</b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table table-bordered" style='font-family:"verdana", monospace; font-size:70%; border: 1px solid black; width:98%'>
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
                                </table><br>
                                <table class="table table-striped table-hover"  style='font-family:"verdana", monospace; font-size:70%; border: 1px solid black; width:98%'>
                                    
                                        <tr>
                                            <td style="border: 1px solid black; "><b>Sale Contract No. :  </b>{{$data->id}}</td>
                                            <td style="border: 1px solid black; "><b>Date: </b></td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid black; "><b>Commercial Invoicxe No. :</b></td>
                                            <td style="border: 1px solid black; "><b>Date:</b> </td>
                                        </tr>
                                </table>
                                
                            </div><br>
                            <div class="row"  style="text-align:center;" >
                                <label for="" ><b >COUNTRY ORIGIN : BANGLADESH</b></label>
                            </div><br>
                            <div class="row">
                                <table class="table table-striped table-hover"  style='font-family:"verdana", monospace; font-size:70%; border: 1px solid black; width:98%'>
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; border: 1px solid black;">Sl.</th>
                                            <th style="text-align: center; border: 1px solid black;">HS Code</th>
                                            <th style="text-align: center; border: 1px solid black;">Item Name</th>
                                            <th style="text-align: center; border: 1px solid black;">Category</th>
                                            <th style="text-align: center; border: 1px solid black;">Variant</th>
                                            <th style="text-align: center; border: 1px solid black;">Grade</th>
                                            <th style="text-align: center; border: 1px solid black;">Quantity / MC</th>
                                            <th style="text-align: center; border: 1px solid black;">Net Weight</th>
                                            <th style="text-align: center; border: 1px solid black;">Gross Weight</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $expototal_amount = 0;
                                            $total_master_carton = 0;
                                        @endphp
                                        @foreach ($data->sales_contract_items as $key=> $s_c_item)
                                            <tr>
                                                <td style="text-align: center; border: 1px solid black;">{{++$key}}</td>
                                                <td style="text-align: center; border: 1px solid black;">{{$s_c_item->hs_code}}</td>
                                                <td style="text-align: center; border: 1px solid black;">{{$s_c_item->supply_item->name}}</td>
                                                <td style="text-align: center; border: 1px solid black;">
                                                    @php
                                                        $replace = str_replace("_"," ",$s_c_item->processing_type);
                                                    @endphp
                                                    {{ucwords($replace)}}
                                                </td>
                                                <td style="text-align: center; border: 1px solid black;">{{ucfirst($s_c_item->processing_variant)}}</td>
                                                <td style="text-align: center; border: 1px solid black;">{{$s_c_item->fish_grade->name}}</td>
                                                <td style="text-align: center; border: 1px solid black;">{{$s_c_item->cartons}}</td>
                                                @php
                                                    $total_master_carton += $s_c_item->cartons;
                                                @endphp
                                                <td style="text-align: center; border: 1px solid black;">{{$data->net_weight}}</td>
                                                <td style="text-align: center; border: 1px solid black;">{{$data->gross_weight}}</td>
                                                @php
                                                    $expototal_amount += $s_c_item->total_amount;
                                                @endphp
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="6" style="border: 1px solid black;">Total</th>
                                            <th style="text-align: center; border: 1px solid black;">{{$total_master_carton}}</th>
                                            <th colspan="4" style="text-align: right; border: 1px solid black;"></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="row">
                                <table  class="table table-striped table-hover table-bordered"  style='font-family:"verdana", monospace; font-size:70%; border: 1px solid black; width:98%'>
                                  
                                        <tr>
                                            <th style="text-align: left; border: 1px solid black;">Payment Method</th>
                                            <td style="border: 1px solid black;">{{$data->payment_method}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; border: 1px solid black;">Pre-Carriage By</th>
                                            <td style="border: 1px solid black;">{{$data->pre_carring_by}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; border: 1px solid black;">Port of Loading</th>
                                            <td style="border: 1px solid black;">{{$data->port_of_loading}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; border: 1px solid black;">Port Of Dischargr</th>
                                            <td style="border: 1px solid black;">{{$data->port_of_discharge}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; border: 1px solid black;">Final Destination</th>
                                            <td style="border: 1px solid black;">{{$data->final_destination}}</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; border: 1px solid black;">Marks & Nos/Cointainer</th>
                                            <td style="border: 1px solid black;">RA 003474387</td>
                                        </tr>
                                        <tr>
                                            <th style="text-align: left; border: 1px solid black;">No. & King of pkgs</th>
                                            <td style="border: 1px solid black;">{{$data->exp_no}}</td>
                                        </tr>
                                </table>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <table class="table table-striped table-hover table-bordered" style='font-family:"verdana", monospace; font-size:70%; border: 1px solid black; width:98%'>
                                <td style="border: 1px solid black; margin-bottom: 65%">
                                    <span style="text-align: center"><h3><b>CERTIFICATE</b></h3></span>
                                    <span style="text-align: center"><p>It is hereby certified that to the best our knowledge and belief the above mentioned goods are of<br> Bangladesh Origin</p></span>
                                    <span style="text-align: center"><h3><b>STAMP</b></h3></span>
                                    <span style="text-align: center"><p>The Noakhali Chamber of commerce & Industry</p></span><br><br><br><br><br><br><br><br><br>
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
                <button id="printNow" onclick="divPrinting();" class="btn red "><i class="fa fa-print" aria-hidden="true">  Print Invoice</i></button>
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