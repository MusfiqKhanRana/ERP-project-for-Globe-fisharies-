@extends('backend.master')
@section('site-title')
    Disburse Salary
@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
        <div class="page-content">
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
            @if(Session::has('msg'))
                <script>
                    $(document).ready(function(){
                        swal("{{Session::get('msg')}}","", "success");
                    });
                </script>
            @endif
            <h3 class="page-title bold">HR Management</h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-briefcase"></i>Disburse Salary List
                    </div>
                    <div class="tools"></div>
                </div>
            </div>
            @foreach ($designation as $item)
                <button class="nav-link btn btn-info degsignation" data-id="{{$item->id}}">
                    {{$item->deg_name}}
                </button>
            @endforeach
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover" id="tblEmployee">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Employee Info.</th>
                                <th>Gross Salary</th>
                                <th>Addition</th>
                                <th>Deduction.</th>
                                <th>Net Paybele</th>
                                <th>Attendance Info.</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr id="row1">
                                <td><input type="checkbox" id="vehicle1" name="vehicle1" value="Bike"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                                <td style="text-align: center;"></td>
                            </tr>  --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var designations = @json($designation)[0];
            var working_days = @json($working_days);
            getdata(designations.id)
            $('.degsignation').click(function() {
                getdata($(this).data("id"));
            });
            function getdata(id) {
                $.ajax({
                    url: "disburse-salary/"+id,
                    type: 'GET',
                    success: function(data) {
                        var employeeTable = $('#tblEmployee tbody');
                        employeeTable.empty();
                        $('#tblEmployee').show();
                        $.each( data, function( key, value ) {
                            var amount = 0;
                            var attendance_count = getAttendanceCount(value.attendances);
                            $.each(value.increments,function(key,increment){
                                amount+=increment.amount;
                            });
                            var deduction = calcutaleDeduction(value,amount,attendance_count.late_count,attendance_count.absent_count);
                            // console.log(deduction);
                            employeeTable.append('<tr>'+
                                    '<td><input type="checkbox" class="vehicle1" name="vehicle1" value="'+ value.id+'"></td>'+
                                    '<td>'+value.id+'</td>'+
                                    '<td><ul>'+
                                        '<li> Name: '+value.name+'</li>'+
                                        '<li> Department: '+value.department.name+'</li>'+
                                        '<li> Designation: '+value.designation.deg_name+'</li>'+
                                        '</ul></td>'+
                                    '<td>'+(parseInt(value.salary)+amount)+'</td>'+
                                    '<td>'+0+'</td>'+
                                    '<td><ul>'+
                                        '<li> Absent Fine: '+deduction.absent_fine.toFixed(2) +'</li>'+
                                        '<li> Late Fine: '+deduction.late_fine.toFixed(2) +'</li>'+
                                        '<li> Advance Salary: '+deduction.advance_salary.toFixed(2) +'</li>'+
                                        '<li> Loan installment: '+deduction.loan_installment_amount.toFixed(2) +'</li>'+
                                        '<li> Total Deduction: '+deduction.total_deduction.toFixed(2) +'</li>'+
                                        '</ul></td>'+
                                    '<td>'+((parseInt(value.salary)+amount)-deduction.total_deduction).toFixed(2)+'</td>'+
                                    '<td><ul>'+
                                        '<li> Present: '+attendance_count.present_count+'</li>'+
                                        '<li> Absent: '+attendance_count.absent_count+'</li>'+
                                        '<li> Late: '+attendance_count.late_count+'</li>'+
                                        '<li> Leave: '+attendance_count.leave_count+'</li>'+
                                        '</ul></td>'+
                                '</tr>');
                        });
                    }
                });
            }
            function getAttendanceCount(attendances){
                var present_count = 0;
                var absent_count = 0;
                var late_count = 0;
                var leave_count = 0;
                $.each(attendances,function( key, attendance ) {
                    if (attendance.status == "Present") {
                        present_count+=1;
                    }else if(attendance.status == "Absent"){
                        absent_count+=1;
                    }else if(attendance.status == "Late"){
                        late_count+=1;
                    }else if(attendance.status == "Medical" || attendance.status == "Casual"|| attendance.status == "Special" || attendance.status == "Earned"|| attendance.status == "Office"){
                        leave_count+=1;
                    }
                })
                // console.log(present_count,absent_count,late_count,leave_count);
                return {'present_count':present_count,'absent_count':absent_count,'late_count':late_count,'leave_count':leave_count};
            }
            function calcutaleDeduction(user,increments,late,absent){
                var advance_salary = 0;
                var loan_installment_amount = 0;
                var total_salary = parseInt(increments)+parseInt(user.salary);
                var per_day_salary = total_salary/working_days;
                var absent_fine = absent*per_day_salary;
                var late_fine = Math.round(late/3)*per_day_salary;
                $.each( user.loans , function( key, loan ){
                    advance_salary+=loan.amount;
                });   
                $.each( user.loan_installments , function( key, loan ){
                    loan_installment_amount+=loan.office_loan.amount/loan.office_loan.instalment;
                });
                var total_deduction = advance_salary+loan_installment_amount+absent_fine+late_fine;
                return {'advance_salary':advance_salary,'loan_installment_amount':loan_installment_amount,'absent_fine':absent_fine,'late_fine':late_fine,'total_deduction':total_deduction};
            }
        });
    </script>
@endsection