@extends('backend.master')
@section('site-title')
    Employee Print
@endsection
@section('style')
<style>
    .table th, .table td {
        font-size: 15px;
    }
    table th, .table td {
        text-align: left;
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
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row" id="dvContainer">
                <div class="col-md-12">
                    <div class="" style="margin-left: 2%" >
                        <div class="portlet-body" style="width: 100%">
                            <span><h3 style="text-align: center"><b>Empoloyee Details</b></h3></span><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="" style="max-width: 80px; max-height: 120px; margin-left: 45%;">
                                            <img style="height: 100px;" src="{{asset('assets/images/employee/images/'. $employee->image)}}">
                                        </div>
                                        <div style="text-align: left">
                                            <h3 tyle="text-align: right"><b>{{$employee->name}}</b></h3>
                                            Employee ID: {{$employee->employee_id}}<br>
                                            Email : {{$employee->email}}<br>
                                            Phone : {{$employee->phone}}
                                        </div>
                                    </div>
                                </div><br>
                                    {{-- <span class="pull-right">
                                        <h3>{{$employee->name}}</h3>
                                        Employee ID: {{$employee->employee_id}}<br>
                                        Email : {{$employee->email}}<br>
                                        Phone : {{$employee->phone}}
                                    </span>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 80px; max-height: 120px;">
                                        <img style="height: 100px;" src="{{asset('assets/images/employee/images/'. $employee->image)}}">
                                    </div> --}}
                                
                            
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for=""><b>Personal Details</b></label>
                            </div>
                            <div class="row">
                                <table  class="table table-striped table-hover">
                                    <tr>
                                        <th style="text-align: left">Father's Name</th>
                                        <td>{{$employee->f_name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Mother's Name</th>
                                        <td>{{$employee->mother_name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Date of Birth</th>
                                        <td>{{$employee->b_date}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Gender</th>
                                        <td>{{$employee->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Blood Group</th>
                                        <td>{{$employee->blood}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Present Address</th>
                                        <td>{{$employee->local_add}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Permanent Address</th>
                                        <td>{{$employee->per_add}}</td>
                                    </tr>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Company Details</b></label>
                            </div>
                            <div class="row">
                                <table  class="table table-striped table-hover">
                                    <tr>
                                        <th style="text-align: left">Departmant</th>
                                        <td>{{$employee->department->name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Designation</th>
                                        <td>{{$employee->designation->deg_name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Joining Date</th>
                                        <td>{{$employee->date}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Branch Address</th>
                                        <td>{{$employee->branch_address}}</td>
                                    </tr>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Bank Details</b></label>
                            </div>
                            <div class="row">
                                <table  class="table table-striped table-hover">
                                    <tr>
                                        <th style="text-align: left">Account Name</th>
                                        <td style="text-align: left">{{$employee->ac_name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Account Number</th>
                                        <td style="text-align: left">{{$employee->ac_num}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Bank Name</th>
                                        <td style="text-align: left">{{$employee->bank_name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="text-align: left">Branch</th>
                                        <td style="text-align: left">{{$employee->branch}}</td>
                                    </tr>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Salary Description</b></label>
                            </div>
                            <div class="row">
                                <table  class="table table-striped table-hover" style="width:100%">
                                    <tr>
                                        <th style="text-align: left">Basic:</th>
                                        <td>{{$employee->basic}}</td>
                                        <th>Medical:</th>
                                        <td>{{$employee->medical_allowance}}</td>
                                        <th  style="text-align: center">House Rent:</th>
                                        <td>{{$employee->house_rent}}</td>
                                        <th  style="text-align: right">Total:</th>
                                        <td>{{$employee->basic + $employee->medical_allowance + $employee->house_rent}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Leave Description</b></label>
                            </div>
                            <div class="row">
                                <table  class="table table-striped table-hover" style="width:100%">
                                    <tr>
                                        <th style="text-align: left">Medical Leave:</th>
                                        <td>{{$employee->m_leave}}</td>
                                        <th style="text-align: center">Casual Leave:</th>
                                        <td>{{$employee->c_leave}}</td>
                                        <th style="text-align: right">Total Leave:</th>
                                        <td>{{$employee->m_leave + $employee->c_leave}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Overtime</b></label>
                            </div>
                            <div class="row">
                                <span>{{$employee->overtime_type}}</span>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Income Tax</b></label>
                            </div><br>
                           
                            <div class="row">
                                @if ($employee->in_percentage != 0)
                                    <span>{{$employee->in_percentage}} %</span>
                                @else
                                    <span>{{$employee->in_amount}} Tk</span>
                                @endif
                                
                            </div><br>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <div class="row" style="text-align: center" >
                <a class="btn blue" style="background-color:#151515"  href="{{ url()->previous() }}"><i class="fa fa-backward"></i>  Back</a>
                <button id="printNow" onclick="divPrinting();" class="btn red" ><i class="fa fa-print" aria-hidden="true">  Print Invoice</i></button>
            </div>
        </div>
    </div>
@endsection
{{-- @section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
        $(document).ready(function () {
            $("#printbtn").click(function () {
                $("#printEmployeeDetails").print();
            });
        })
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


