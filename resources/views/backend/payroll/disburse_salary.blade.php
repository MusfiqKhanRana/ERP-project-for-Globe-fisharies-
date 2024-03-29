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
            <div class="portlet-body">
                @foreach ($departments as $data)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 bodered border-dark">
                        <div class="dashboard-stat" style="background-color: rgb(245, 243, 241)">
                            <h4 class="more"><b>Department: {{$data->name}}</b> </h4>
                            <div style="margin: 1%; padding:1%; margin-top:0%">
                                @foreach ($data->designation as $designation)
                                    <button class="nav-link btn btn-success btn-sm degsignation" style="margin: 1%" data-id="{{$designation->id}}">
                                        {{$designation->deg_name}}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
           <div>
                <a class="btn green-meadow pull-right disburse_salary" style="margin:2%;" data-toggle="modal" href="#addareaModal">
                    Salary Disburse
                <i class="fa fa-plus"></i> </a>
           </div>
            
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @php
            $current_date = \Carbon\Carbon::now()->format('Y-m-1');
        @endphp
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var designations = @json($designations)[0];
            var working_days = @json($working_days);
            var current_date = @json($current_date);
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
                                amount+= parseInt(increment.amount);
                            });
                            var combained_salary = amount + (parseInt(value.basic)+parseInt(value.medical_allowance)+parseInt(value.house_rent));
                            var get_provident_fund = getProvidentFund(value.provident_fund_users,combained_salary);
                            var deduction = calcutaleDeduction(value,combained_salary,attendance_count.late_count,attendance_count.absent_count,get_provident_fund);
                            var get_overtime = getOverTime(value,attendance_count.total_overtime,deduction.per_day_salary);
                            if (value.payments.length == 0) {
                                employeeTable.append('<tr>'+
                                    '<td><input type="checkbox" class="salary_check"'+
                                    'data-overtime="'+ get_overtime +'"'+
                                    'data-absent_fine="'+ decimalePlace(deduction.absent_fine)+'"'+
                                    'data-late_fine="'+ decimalePlace(deduction.late_fine) +'"'+
                                    'data-advance_salary="'+ decimalePlace(deduction.advance_salary) +'"'+
                                    'data-installment_amount="'+ decimalePlace(deduction.loan_installment_amount) +'"'+
                                    'data-provident_fund="'+ decimalePlace(get_provident_fund) +'"'+
                                    'data-net_payment="'+ (combained_salary-deduction.total_deduction).toFixed(2) +'"'+
                                    ' data-gross_salary="'+ combained_salary +'" value="'+ value.id+'"></td>'+
                                    '<td>'+value.id+'</td>'+
                                    '<td><ul>'+
                                        '<li> Name: '+value.name+'</li>'+
                                        '<li> Department: '+value.department.name+'</li>'+
                                        '<li> Designation: '+value.designation.deg_name+'</li>'+
                                        '</ul></td>'+
                                    '<td>'+combained_salary+'</td>'+
                                    '<td>'+'Overtime: '+get_overtime+'</td>'+
                                    '<td><ul>'+
                                        '<li> Absent Fine: '+ decimalePlace(deduction.absent_fine) +'</li>'+
                                        '<li> Late Fine: '+decimalePlace(deduction.late_fine) +'</li>'+
                                        '<li> Advance Salary: '+decimalePlace(deduction.advance_salary) +'</li>'+
                                        '<li> Loan installment: '+ decimalePlace(deduction.loan_installment_amount) +'</li>'+
                                        '<li> Provident Fund: '+ decimalePlace(get_provident_fund) +'</li>'+
                                        '<li> Total Deduction: '+decimalePlace(deduction.total_deduction) +'</li>'+
                                        '</ul></td>'+
                                    '<td>'+decimalePlace(combained_salary-deduction.total_deduction)+'</td>'+
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
            // console.log(decimalePlace(0),"decimal place");
            function getProvidentFund(provident_funds,combained_salary) {
                let findDate = null;
                var total_deduction = 0;
                $.each( provident_funds , function( key, provident_fund ) {
                    findDate = provident_fund.installments.find(fruit => fruit === current_date);
                    let deduction = 0;
                    if (findDate) {
                        deduction = combained_salary/(provident_fund.provident_fund.amount*100)
                        total_deduction+=deduction;
                    }
                    // console.log(provident_fund.provident_fund,combained_salary,total_deduction);
                });
                return total_deduction;
            }
            function decimalePlace(number) {
                return Number(Math.round(number +'e'+ 2) +'e-'+ 2).toFixed(2);
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
            function calcutaleDeduction(user,combained_salary,late,absent,provident_fund){
                var advance_salary = 0;
                var loan_installment_amount = 0;
                var total_salary = combained_salary;
                var per_day_salary = total_salary/working_days;
                var absent_fine = absent*per_day_salary;
                var late_fine = Math.round(late/3)*per_day_salary;
                $.each( user.loans , function( key, loan ){
                    advance_salary+=loan.amount;
                });   
                $.each( user.loan_installments , function( key, loan ){
                    loan_installment_amount+=loan.office_loan.amount/loan.office_loan.instalment;
                });
                var total_deduction = parseFloat(advance_salary)+parseFloat(loan_installment_amount)+parseFloat(absent_fine)+parseFloat(late_fine)+parseFloat(provident_fund);
                return {'per_day_salary':per_day_salary,'advance_salary':advance_salary,'loan_installment_amount':loan_installment_amount,'absent_fine':absent_fine,'late_fine':late_fine,'total_deduction': parseFloat(total_deduction)};
            }
            function showSalaryButton() {
                var selected_user_ids = [];
                $('.salary_check').click(function(){
                    if($(this).prop("checked") == true){
                        $('.disburse_salary').show();
                        let user_salary = {id:$(this).val(),gross_salary:$(this).data('gross_salary'), overtime:$(this).data('overtime'), absent_fine:$(this).data('absent_fine'), late_fine:$(this).data('late_fine'), advance_salary:$(this).data('advance_salary'), installment_amount:$(this).data('installment_amount'),'provident_fund':$(this).data('provident_fund') , net_payment:$(this).data('net_payment')};
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