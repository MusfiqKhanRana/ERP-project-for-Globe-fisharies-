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
            <a class="btn green-meadow pull-right disburse_salary" data-toggle="modal" href="#addareaModal">
                Salary Disburse
            <i class="fa fa-plus"></i> </a>
            <div id="addareaModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h4 class="modal-title">Add New Area</h4>
                        </div>
                        <br>
                        <form class="form-horizontal" role="form" method="post" action="{{route('disburse-salary.store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="inputEmail1" class="col-md-2 control-label">Status</label>
                                <div class="col-md-8">
                                    <select  class="form-control" name="status" id="status" required>
                                        <option value="">--select--</option>
                                        <option value="paid">Paid</option>
                                        <option value="unpaid">Unpaid</option>
                                    </select>
                                    <input type="hidden" name="users" value="" class="users_array">
                                </div>
                            </div>
                            <div class="form-group disbursement_date">
                                <label for="inputEmail1" class="col-md-2 control-label">Disbursement Date</label>
                                <div class="col-md-8">
                                    <div class="input-group input-medium date date-picker"  data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                        <input type="text" class="form-control" name="disbursement_date" placeholder="" id="clearance_date" readonly >
                                        <span class="input-group-btn">
                                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-hover" id="tblEmployee">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Employee Info.</th>
                                <th>Gross Salary (TK)</th>
                                <th>Addition (TK)</th>
                                <th>Deduction.</th>
                                <th>Net Paybele (TK)</th>
                                <th>Attendance Info. (Day)</th>
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
            $('.disburse_salary').hide();
            getdata(designations.id)
            $('.degsignation').click(function() {
                $('.users_array').val('');
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
                            var attendance_count = getAttendanceCount(value.attendances,value.user_shift);
                            $.each(value.increments,function(key,increment){
                                amount+=increment.amount;
                            });
                            var deduction = calcutaleDeduction(value,amount,attendance_count.late_count,attendance_count.absent_count);
                            var get_overtime = getOverTime(value,attendance_count.total_overtime,deduction.per_day_salary);
                            // console.log();
                            if (value.payments.length == 0) {
                                employeeTable.append('<tr>'+
                                    '<td><input type="checkbox" class="salary_check"'+
                                    'data-overtime="'+ get_overtime +'"'+
                                    'data-absent_fine="'+ deduction.absent_fine.toFixed(2) +'"'+
                                    'data-late_fine="'+ deduction.late_fine.toFixed(2) +'"'+
                                    'data-advance_salary="'+ deduction.advance_salary.toFixed(2) +'"'+
                                    'data-installment_amount="'+ deduction.loan_installment_amount.toFixed(2) +'"'+
                                    'data-net_payment="'+ ((value.basic+value.medical_allowance+value.house_rent+amount)-deduction.total_deduction).toFixed(2) +'"'+
                                    ' data-gross_salary="'+ (value.basic+value.medical_allowance+value.house_rent+amount) +'" value="'+ value.id+'"></td>'+
                                    '<td>'+value.id+'</td>'+
                                    '<td><ul>'+
                                        '<li> Name: '+value.name+'</li>'+
                                        '<li> Department: '+value.department.name+'</li>'+
                                        '<li> Designation: '+value.designation.deg_name+'</li>'+
                                        '</ul></td>'+
                                    '<td>'+(value.basic+value.medical_allowance+value.house_rent+amount)+'</td>'+
                                    '<td>'+'Overtime: '+get_overtime+'</td>'+
                                    '<td><ul>'+
                                        '<li> Absent Fine: '+deduction.absent_fine.toFixed(2) +'</li>'+
                                        '<li> Late Fine: '+deduction.late_fine.toFixed(2) +'</li>'+
                                        '<li> Advance Salary: '+deduction.advance_salary.toFixed(2) +'</li>'+
                                        '<li> Loan installment: '+deduction.loan_installment_amount.toFixed(2) +'</li>'+
                                        '<li> Total Deduction: '+deduction.total_deduction.toFixed(2) +'</li>'+
                                        '</ul></td>'+
                                    '<td>'+((value.basic+value.medical_allowance+value.house_rent+amount)-deduction.total_deduction).toFixed(2)+'</td>'+
                                    '<td><ul>'+
                                        '<li> Present: '+attendance_count.present_count+'</li>'+
                                        '<li> Absent: '+attendance_count.absent_count+'</li>'+
                                        '<li> Late: '+attendance_count.late_count+'</li>'+
                                        '<li> Leave: '+attendance_count.leave_count+'</li>'+
                                        '</ul></td>'+
                                '</tr>');
                            }
                        });
                        showSalaryButton();
                    }
                });
            }
            function getAttendanceCount(attendances,shift){
                var present_count = 0;
                var absent_count = 0;
                var late_count = 0;
                var leave_count = 0;
                var total_over_time=0;
                $.each(attendances,function( key, attendance ) {
                    if (attendance.status == "Present") {
                        present_count+=1;
                        total_over_time=timeDifference(shift.out_time,attendance.out_time);
                        // console.log(total_over_time);
                    }else if(attendance.status == "Delay"){
                        // total_over_time+=timeDifference(shift.out_time,attendance.out_time);
                    }else if(attendance.status == "Absent"){
                        absent_count+=1;
                    }else if(attendance.status == "Late"){
                        late_count+=1;
                        total_over_time+=timeDifference(shift.out_time,attendance.out_time);
                        // console.log(total_over_time);
                    }else if(attendance.status == "Medical" || attendance.status == "Casual"|| attendance.status == "Special" || attendance.status == "Earned"|| attendance.status == "Office"){
                        leave_count+=1;
                    }
                })
                console.log(total_over_time);
                // console.log(present_count,absent_count,late_count,leave_count);
                return {'present_count':present_count,'absent_count':absent_count,'late_count':late_count,'leave_count':leave_count,'total_overtime':total_over_time};
            }
            function timeDifference(shift_out_time,attendance_out_time) {
                if (attendance_out_time) {
                    shift_out_time = moment(shift_out_time,"hh:mm:ss");
                    attendance_out_time = moment(attendance_out_time,"hh:mm:ss");
                    return attendance_out_time.diff(shift_out_time, 'minute')/60;
                }
                else{
                    return 0;
                }
            }
            function calcutaleDeduction(user,increments,late,absent){
                var advance_salary = 0;
                var loan_installment_amount = 0;
                var total_salary = parseInt(increments)+user.basic+user.medical_allowance+user.house_rent;
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
                return {'per_day_salary':per_day_salary,'advance_salary':advance_salary,'loan_installment_amount':loan_installment_amount,'absent_fine':absent_fine,'late_fine':late_fine,'total_deduction':total_deduction};
            }
            function showSalaryButton() {
                var selected_user_ids = [];
                $('.salary_check').click(function(){
                    if($(this).prop("checked") == true){
                        $('.disburse_salary').show();
                        let user_salary = {id:$(this).val(),gross_salary:$(this).data('gross_salary'), overtime:$(this).data('overtime'), absent_fine:$(this).data('absent_fine'), late_fine:$(this).data('late_fine'), advance_salary:$(this).data('advance_salary'), installment_amount:$(this).data('installment_amount') , net_payment:$(this).data('net_payment')};
                        selected_user_ids.push(user_salary);
                        selected_user_ids = [...new Map(selected_user_ids.map(item => [item['id'], item])).values()];
                        $('.users_array').val(JSON.stringify(selected_user_ids));
                    }
                    else if($(this).prop("checked") == false){
                        selected_user_ids.splice(selected_user_ids.findIndex(item => item.id === $(this).val()), 1)
                        $('.users_array').val(JSON.stringify(selected_user_ids));
                        if (selected_user_ids.length==0) {
                            $('.disburse_salary').hide();
                        }
                    }
                });
            }
            function getOverTime(user,total_overtime,per_day_salary) {
                var total_over_time =0;
                if (user.isOvertime==1){
                    if (user.overtime_type=="Regular") {
                        console.log(total_overtime*(per_day_salary/8));
                        total_over_time = total_overtime*(per_day_salary/8);
                    }else if (user.overtime_type=="Fixed") {
                        console.log(total_overtime*user.overtime_amount);
                        total_over_time = total_overtime*user.overtime_amount;
                    }
                    return total_over_time;
                    // console.log(user,total_overtime,per_day_salary);
                }else{
                    return 0;
                }
            }
            $('.disbursement_date').hide();
            $('#status').change(function(){
                if ($(this).val()=="paid") {
                    $('.disbursement_date').show();
                }else{
                    $('.disbursement_date').hide();
                }
            });
        });
    </script>
@endsection