@extends('backend.master')
@section('site-title')
     Commercial List Print
@endsection
@section('style')
<style>
    .table td, .table th {
        font-size: 10px;
    }
   
    #dvContainer {
        background-color: rgb(255, 255, 255);
    }
    @media print {
        body * {
           visibility: hidden; // part to hide at the time of print
           -webkit-print-color-adjust: exact !important; // not necessary use if colors not visible
        }

        #dvContainer {
           background-color: blue !important;
        }
    }
</style>
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
                    <div class="" style="margin-left: 2%; margin-right: 2%;" >
                        <div class="portlet-body" style="height: auto;">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center">
                                    <h2><b>Commercial Invoice</b></h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" >
                                    Invoice No: 56784589
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
                                <table class="table table-bordered" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Manufacture / Exporter</th>
                                            <th>Notify Party</th>
                                            <th>Consignee</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3; text-align:center;" >
                                <label for="" ><b >Conuntry Origin : Bangladesh</b></label>
                            </div><br>
                            <div class="row">
                                <table class="table table-bordered" style="width:100%">
                                    <thead>
                                        <tr style="background-color:#d6d9e3">
                                            <th>Sl.</th>
                                            <th>HS Code</th>
                                            <th>Production Date</th>
                                            <th>EXP Date</th>
                                            <th>Type</th>
                                            <th>Item</th>
                                            <th>Variant</th>
                                            <th>Grade</th>
                                            <th>Scientific Name</th>
                                            <th> Quantity / Master Carton</th>
                                            <th>Pack Size</th>
                                            <th>Gross Weight (KG)</th>
                                            <th>Net Weight (KG)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>564875bkjhvb</td>
                                            <td>2022/07/03</td>
                                            <td>2022/08/03</td>
                                            <td>IQF</td>
                                            <td>Pangus</td>
                                            <td>Gutted Clean</td>
                                            <td>1 Kg Up</td>
                                            <td>Lorem ipsum dolor sit amet.</td>
                                            <td>100</td>
                                            <td>300-500</td>
                                            <td>50</td>
                                            <td>45</td> 
                                            
                                        </tr>
                                        <tr  style="background-color:#d6d9e3">
                                            <th colspan="9">Total Amount Master Carton & Weight </th>
                                            <th>100</th>
                                            <th></th>
                                            <th>50</th>
                                            <th>45</th>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div><br>
                            <div class="row">
                                <table  class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th style="background-color:#d6d9e3">Sale Contract No.</th>
                                        <td>GFL/EXP/DUBAI/HRA/07/2022</td>
                                        <th style="background-color:#d6d9e3">Partial Shipment</th>
                                        <td>Allowed</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Sale Contract Date</th>
                                        <td>2022/07/11</td>
                                        <th style="background-color:#d6d9e3">Final Destination</th>
                                        <td>UAE</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Payment Method</th>
                                        <td>T.T At Sight</td>
                                        <th style="background-color:#d6d9e3">ERC No.</th>
                                        <td>RA 003474387</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">EXP No.</th>
                                        <td>1019-00244-094887</td>
                                        <th style="background-color:#d6d9e3">Vat Regd No.</th>
                                        <td>RA 003474387</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">EXP Date</th>
                                        <td>2022/08/11</td>
                                        <th style="background-color:#d6d9e3">Tin No.</th>
                                        <td>RA 003474387</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Port Of Discharge</th>
                                        <td>Jabel Ali Sea Port</td>
                                        <th style="background-color:#d6d9e3">Total Master Cartons</th>
                                        <td>19876395867-908756</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Pre-Carriage By</th>
                                        <td>By Sea</td>
                                        <th style="background-color:#d6d9e3">Net Weight</th>
                                        <td>200</td>
                                    </tr>
                                  
                                    <tr>
                                        <th style="background-color:#d6d9e3">Gross Weight</th>
                                        <td>300</td>
                                        <th style="background-color:#d6d9e3">CBM</th>
                                        <td>90</td>
                                    </tr>
                                    
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
{{-- @section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
<script>
    jQuery(document).ready(function() {
        $("#printbtn").click(function () {
            $("#printrequisition").print();
        });
    });
</script>
@endsection --}}
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