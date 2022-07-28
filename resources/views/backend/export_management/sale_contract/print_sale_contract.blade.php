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
                        <div class="portlet-body" style="height: auto;">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center">
                                    <h2><b>SALES CONTRACT</b></h2>
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
                                <label for="" ><b >COUNTRY ORIGIN : BANGLADESH</b></label>
                            </div><br>
                            <div class="row">
                                <table class="table table-striped table-hover"  style='font-family:"Poppins", monospace; font-size:50%'>
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
                                            <th style="text-align: center">Gross Weight (KG)</th>
                                            <th style="text-align: center">Net Weight (KG)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">3</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">4</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">5</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">6</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">7</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">8</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">9</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">10</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">3</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">4</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">5</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">6</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">7</td>
                                            <td style="text-align: center">564875bkjhvb</td>
                                            <td style="text-align: center">2022/07/03</td>
                                            <td style="text-align: center">2022/08/03</td>
                                            <td style="text-align: center">IQF</td>
                                            <td style="text-align: center">Pangus</td>
                                            <td style="text-align: center">Gutted Clean</td>
                                            <td style="text-align: center">1 Kg Up</td>
                                            <td style="text-align: center">Lorem ipsum dolor sit amet.</td>
                                            <td style="text-align: center">100</td>
                                            <td style="text-align: center">300-500</td>
                                            <td style="text-align: center">50</td>
                                            <td style="text-align: center">45</td>
                                        </tr>
                                        <tr  style="background-color:#d6d9e3">
                                            <th colspan="9">Total Master Carton & Weight </th>
                                            <th>100</th>
                                            <th></th>
                                            <th>50</th>
                                            <th>45</th>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <h6><b>TOTAL AMOUNT (IN WORD) :</b></h6>
                            </div><br>
                            <div class="row">
                                <table  class="table table-striped table-hover table-bordered"  style='font-family:"Poppins", monospace; font-size:80%'>
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
                                        <td>T.T At Sight</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">EXP No.</th>
                                        <td>1019-00244-094887</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">EXP Date</th>
                                        <td>2022/08/11</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Port Of Dischargr</th>
                                        <td>Jabel Ali Sea Port</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Pre-Carriage By</th>
                                        <td>By Sea</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Partial Shipment</th>
                                        <td>Allowed</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Final Destination</th>
                                        <td>UAE</td>
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
                                        <td>19876395867-908756</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Net Weight</th>
                                        <td>200</td>
                                    </tr>
                                    <tr>
                                        <th style="background-color:#d6d9e3">Gross Weight</th>
                                        <td>300</td>
                                    </tr>
                                    <tr>
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