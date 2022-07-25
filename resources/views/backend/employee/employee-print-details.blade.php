@extends('backend.master')
@section('site-title')
    Employee Print
@endsection
@section('main-content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row" id="printEmployeeDetails">
                <div class="col-md-12">
                    <div class="" style="margin-left: 2%" >
                        <div class="portlet-body" style="height: auto;">
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                <img style="height: 100px;" src="{{asset('assets/images/employee/images/'. $employee->image)}}">
                            </div>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Personal Details</b></label>
                            </div>
                            <div class="row">
                                <table  class="table table-striped table-hover">
                                    <tr>
                                        <th>Father's Name</th>
                                        <td>{{$employee->f_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Mother's Name</th>
                                        <td>{{$employee->mother_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Birth</th>
                                        <td>{{$employee->b_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{$employee->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th>Blood Group</th>
                                        <td>{{$employee->blood}}</td>
                                    </tr>
                                    <tr>
                                        <th>Present Address</th>
                                        <td>{{$employee->local_add}}</td>
                                    </tr>
                                    <tr>
                                        <th>Permanent Address</th>
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
                                        <th>Departmant</th>
                                        <td>{{$employee->department->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>{{$employee->designation->deg_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Joining Date</th>
                                        <td>{{$employee->date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Branch Address</th>
                                        <td>{{$employee->branch_address}}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Bank Details</b></label>
                            </div><br>
                           
                            <div class="row">
                                <table  class="table table-striped table-hover">
                                    <tr>
                                        <th>Account Name</th>
                                        <td>{{$employee->ac_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number</th>
                                        <td>{{$employee->ac_num}}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Name</th>
                                        <td>{{$employee->bank_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Branch</th>
                                        <td>{{$employee->branch}}</td>
                                    </tr>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Salary Description</b></label>
                            </div>
                            <div class="row">
                                <table  class="table table-striped table-hover">
                                    <tr>
                                        <th>Basic:</th>
                                        <td>{{$employee->basic}}</td>
                                        <th>Medical:</th>
                                        <td>{{$employee->medical_allowance}}</td>
                                        <th>House Rent:</th>
                                        <td>{{$employee->house_rent}}</td>
                                        <th>Total:</th>
                                        <td>{{$employee->basic + $employee->medical_allowance + $employee->house_rent}}</td>
                                    </tr>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Leave Description</b></label>
                            </div>
                            <div class="row">
                                <table  class="table table-striped table-hover">
                                    <tr>
                                        <th>Medical Leave:</th>
                                        <td>{{$employee->m_leave}}</td>
                                        <th>Casual Leave:</th>
                                        <td>{{$employee->c_leave}}</td>
                                        <th>Total Leave:</th>
                                        <td>{{$employee->m_leave + $employee->c_leave}}</td>
                                    </tr>
                                </table>
                            </div><br>
                            <div class="row"  style="background-color:#d6d9e3;" >
                                <label for="" ><b >Overtime</b></label>
                            </div><br>
                           
                            <div class="row">
                                <span>{{$employee->overtime_type}}</span>
                            </div>
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
                <button id="printbtn" class="btn red" ><i class="fa fa-print" aria-hidden="true">  Print Invoice</i></button>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
        $(document).ready(function () {
            $("#printbtn").click(function () {
                $("#printEmployeeDetails").print();
            });
        })
    </script>
@endsection


