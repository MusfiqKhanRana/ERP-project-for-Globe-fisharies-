
<div class="page-sidebar-wrapper">

    <div class="page-sidebar navbar-collapse collapse">

        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">

                <div class="sidebar-toggler"> </div>

            </li>
            <li class="sidebar-search-wrapper">

            </li>
            <br>
            <br>
            <li class="nav-item start @php echo "active",(request()->path() != 'admin/dashboard')?:"";@endphp">
                <a href="{{route('admin.dashboard')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>


            <li class="nav-item @if( request()->path() == 'admin/department' || request()->path() == 'admin/department' ) active open @endif
                @if( request()->path() == '' || request()->path() == '' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/tiffin-bill' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/show-cause-application' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/absent-application' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee-attendance' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/bonus' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/office/loan' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/increment' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/payroll.chart' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/disburse-salary' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/payroll' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/provident-fund' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/payroll/chart' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/add-employee' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/individual-attendance' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/user-shift' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/assign/shift' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance-count' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/edit-employee' ) active open @endif
                @php echo "active",(request()->path() != 'admin/payroll')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/payroll/chart')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/payroll/salary/sheet')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/award')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/award/create')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/award/edit/{$url}')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/user-performance')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/tiffin-bill')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/employee/attendance')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/employee-attendance')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/provident-fund')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/payroll/chart')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/bonus')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/office/loan')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/increment')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/payroll.chart')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/disburse-salary')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/payroll')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/absent-application')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/show-cause-application')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/attendance')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/task-add')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/notice')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/notice/create')?:"";@endphp
                @php if (request()->path() == 'admin/notice/edit/{id}') echo "active" @endphp
                @php echo "active",(request()->path() != 'admin/holidays')?:"";@endphp
                @php echo "active",(request()->path() != 'holidays')?:"";@endphp">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <span class="title">HR Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/department')?:"";@endphp">
                        <a href="{{route('admin.department')}}" class="nav-link nav-toggle">
                            <i class="icon-briefcase"></i>
                            <span class="title">Manage Departments</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee' ) active open @endif
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/add-employee' ) active open @endif
                    {{-- @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance' ) active open @endif --}}
                    {{-- @if( request()->path() == 'admin/employee' || request()->path() == 'admin/individual-attendance' ) active open @endif --}}
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/user-shift' ) active open @endif
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/assign/shift' ) active open @endif
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance-count' ) active open @endif
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/tiffin-bill' ) active open @endif
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/edit-employee' ) active open @endif">
                    
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Employee</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == 'admin/employee' ) active open @endif">
                                <a href="{{route('employee.list')}}" class="nav-link ">
                                    <span class="title">Employee List</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item  @if( request()->path() == 'admin/individual-attendance' ) active open @endif
                            @if( request()->path() == 'individual-attendance' ) active open @endif">
                                <a href="{{route('employee.individual')}}" class="nav-link">
                                    <span class="title">Individual Attendance</span>
                                </a>
                            </li> --}}
                            <li class="nav-item  @if( request()->path() == 'admin/tiffin-bill') active open @endif
                                @if( request()->path() == 'tiffin-bill' ) active open @endif">
                                    <a href="{{route('tiffin-bill.index')}}" class="nav-link">
                                        <span class="title">Employee Bill</span>
                                    </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/user-shift') active open @endif
                                @if( request()->path() == 'user-shift' ) active open @endif">
                                    <a href="{{route('user-shift.index')}}" class="nav-link">
                                        <span class="title">Employee Shift</span>
                                    </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/employee/assign/shift') active open @endif
                                @if( request()->path() == 'assign/shift' ) active open @endif">
                                    <a href="{{route('assign-shift')}}" class="nav-link">
                                        <span class="title">Assign Shift</span>
                                    </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/attendt')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/employee/attendance')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/employee-attendance')?:"";@endphp 
                        @php echo "active",(request()->path() != 'admin/absent-application')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/show-cause-application')?:"";@endphp"
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee-attendance' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/absent-application' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/show-cause-application' ) active open @endif>
                       
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <span class="title">Attendance </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                
    
                                <li class="nav-item @if( request()->path() == 'admin/employee/attendance') active open @endif
                                    @if( request()->path() == 'employee.attend' ) active open @endif">
                                    <a href="{{route('employee.attend')}}" class="nav-link ">
                                        <span class="title">Attendance List</span>
                                    </a>
                                </li>
                                <li class="nav-item  @if( request()->path() == 'admin/employee-attendance') active open @endif
                                    @if( request()->path() == 'employee-attendance' ) active open @endif">
                                    <a href="{{route('employee-attendance.index')}}" class="nav-link ">
                                        <span class="title">My Attendance</span>
                                    </a>
                                </li>
                                <li class="nav-item  @if( request()->path() == 'admin/absent-application' ) active open @endif">
                                    <a href="{{route('absent-application.index')}}" class="nav-link ">
                                        <span class="title">Absent Application</span>
                                    </a>
                                </li>
                                <li class="nav-item  @if( request()->path() == 'admin/show-cause-application') active open @endif
                                    @if( request()->path() == 'show-cause-application' ) active open @endif">
                                    <a href="{{route('show-cause-application.index')}}" class="nav-link ">
                                        <span class="title">Late/Delay Application</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    {{-- <li class="nav-item  @if( request()->path() == 'admin/employee/attendance' ) active open @endif">
                        <a href="{{route('employee.attend')}}" class="nav-link ">
                            <span class="title">Attendance Management</span>
                        </a>
                    </li> --}}
                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/payroll')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/payroll')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/disburse-salary')?:"";@endphp 
                        @php echo "active",(request()->path() != 'admin/payroll.chart')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/increment')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/office/loan')?:"";@endphp 
                        @php echo "active",(request()->path() != 'admin/bonus')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/payroll/chart')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/provident-fund')?:"";@endphp"
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/payroll' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/disburse-salary' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/payroll.chart' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/increment' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/office/loan' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/bonus' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/payroll/chart' ) active open @endif
                        @if( request()->path() == 'admin/employee' || request()->path() == 'admin/provident-fund' ) active open @endif>
                    
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-money"></i>
                            <span class="title">Employee Payroll</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            {{-- <li class="nav-item  @if( request()->path() == 'admin/payroll') active open @endif
                                @if( request()->path() == 'payroll' ) active open @endif">
                                <a href="{{route('payroll.index')}}" class="nav-link ">
                                    <span class="title">Employee Salary</span>
                                </a>
                            </li> --}}
                            <li class="nav-item  @if( request()->path() == 'admin/disburse-salary') active open @endif
                                @if( request()->path() == 'disburse-salary' ) active open @endif">
                                <a href="{{route('disburse-salary.index')}}" class="nav-link ">
                                    <span class="title">Disburse Salary</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/payroll/chart') active open @endif
                                @if( request()->path() == 'payroll/chart' ) active open @endif">
                                <a href="{{route('payroll.chart')}}" class="nav-link ">
                                    <span class="title">Salary Chart</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/increment') active open @endif
                                @if( request()->path() == 'increment' ) active open @endif">
                                <a href="{{route('increment.index')}}" class="nav-link ">
                                    <span class="title">Increment/Decrement</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/office/loan') active open @endif
                                @if( request()->path() == 'office/loan' ) active open @endif">
                                <a href="{{route('office.loan.manange')}}" class="nav-link ">
                                    <span class="title">Advance/Loan</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/provident-fund') active open @endif
                                @if( request()->path() == 'provident-fund' ) active open @endif">
                                <a href="{{route('provident-fund.index')}}" class="nav-link ">
                                    <span class="title">Provident Fund</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/bonus') active open @endif
                                @if( request()->path() == 'bonus' ) active open @endif">
                                <a href="{{route('bonus.index')}}" class="nav-link ">
                                    <span class="title">Bonus / Additions</span>
                                </a>
                            </li>

                        </ul>
                    </li>

                    @php
                        $url = request()->path();
                        $url = Find_fist_int($url);
                    @endphp
                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/award')?:"";@endphp
                    @php echo "active",(request()->path() != 'admin/award/create')?:"";@endphp
                    @php echo "active",(request()->path() != 'admin/award/edit/{$url}')?:"";@endphp">
                        <a href="{{route('award.index')}}" class="nav-link nav-toggle">
                            <i class="icon-trophy"></i>
                            <span class="title">Award Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/user-performance')?:"";@endphp
                    @php echo "active",(request()->path() != 'admin/employee/task-add')?:"";@endphp">
                        <a href="{{route('user-performance.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <span class="title">Worker Performance</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    {{-- <li class="nav-item start @php echo "active",(request()->path() != 'admin/employee/task')?:"";@endphp
                    @php echo "active",(request()->path() != 'admin/employee/task-add')?:"";@endphp">
                        <a href="{{route('employee.task')}}" class="nav-link nav-toggle">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <span class="title">Task Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>--}}
                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/notice')?:"";@endphp
                    @php echo "active",(request()->path() != 'admin/notice/create')?:"";@endphp
                    @php if (request()->path() == 'admin/notice/edit/{id}') echo "active" @endphp">
                        <a href="{{route('notice.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-clipboard"></i>
                            <span class="title">Notice Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/holidays')?:"";@endphp
                    @php echo "active",(request()->path() != 'holidays')?:"";@endphp">
                        <a href="{{route('holiday.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-toggle-off"></i>
                            <span class="title">Holiday Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item   @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts' ) active open @endif
                @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts/transaction' ) active open @endif
                @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts/total-income' ) active open @endif
                @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/account/income-expense' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-files-o" aria-hidden="true"></i>
                    <span class="title">Accounts Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts' ) active open @endif
                        @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts/transaction' ) active open @endif
                        @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/accounts/total-income' ) active open @endif
                        @if( request()->path() == 'admin/accounts' || request()->path() == 'admin/account/income-expense' ) active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-university"></i>
                            <span class="title">Office Accounts</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == 'admin/account/income-expense' ) active open @endif">
                                <a href="{{route('income.expense')}}" class="nav-link ">
                                    <span class="title">Income/Expense</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/accounts/transaction' ) active open @endif">
                                <a href="{{route('trans.index')}}" class="nav-link ">
                                    <span class="title">Transaction Purpose</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/accounts' ) active open @endif">
                                <a href="{{route('account.index')}}" class="nav-link ">
                                    <span class="title">Accounts Chart</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/bank' || request()->path() == 'admin/bank' ) active open @endif
                        @if( request()->path() == 'admin/transaction' || request()->path() == 'admin/transaction' ) active open @endif
                        @if( request()->path() == 'admin/add/transaction' || request()->path() == 'admin/add/transaction' ) active open @endif
                        @if( request()->path() == 'admin/expense/history' || request()->path() == 'admin/expense/history' ) active open @endif
                        @if( request()->path() == 'admin/bank/transaction' || request()->path() == 'admin/bank/transaction' ) active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-bold" aria-hidden="true"></i>
                            <span class="title">Bank Management</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == '' ) active open @endif
                            @if( request()->path() == 'admin/bank' ) active open @endif">
                                <a href="{{route('bank.account.index')}}" class="nav-link ">
                                    <span class="title">Bank Account</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/bank/transaction' ) active open @endif
                            @if( request()->path() == 'admin/bank/transaction' ) active open @endif">
                               <a href="{{route('transaction.index')}}" class="nav-link ">
                                    <span class="title">Credit/Balance</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/add/transaction' ) active open @endif
                            @if( request()->path() == 'admin/transaction' ) active open @endif
                            @if( request()->path() == 'admin/expense/history' ) active open @endif">
                                <a href="{{route('expanse.transaction.index')}}" class="nav-link ">
                                    <span class="title">Transaction</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/add/personal/loan' || request()->path() == 'admin/add/personal/loan' ) active open @endif
                        @if( request()->path() == 'admin/personal/loan' || request()->path() == 'admin/personal/loan' ) active open @endif
                        @if( request()->path() == 'admin/office/loan' || request()->path() == 'admin/office/loan' ) active open @endif
                        @if( request()->path() == 'admin/add/office/loan' || request()->path() == 'admin/add/office/loan' ) active open @endif">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-money" aria-hidden="true"></i>
                                <span class="title">Loan Management</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item @if( request()->path() == 'admin/add/personal/loan' || request()->path() == 'admin/add/personal/loan' ) active open @endif
                                    @if( request()->path() == 'admin/personal/loan' || request()->path() == 'admin/personal/loan' ) active open @endif">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Personal Loan</span>
                                        <span class="arrow open"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item  @if( request()->path() == 'admin/add/personal/loan' ) active open @endif
                                        @if( request()->path() == '' ) active open @endif">
                                            <a href="{{route('personal.loan.index')}}" class="nav-link ">
                                                <span class="title">Add Person</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  @if( request()->path() == 'admin/personal/loan' ) active open @endif
                                        @if( request()->path() == '' ) active open @endif">
                                            <a href="{{route('manage.loan')}}" class="nav-link ">
                                                <span class="title">Manage Loan</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="nav-item @if( request()->path() == 'admin/add/office/loan' || request()->path() == 'admin/add/office/loan' ) active open @endif
                                    @if( request()->path() == 'admin/office/loan' || request()->path() == 'admin/office/loan' ) active open @endif">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <span class="title">Office Loan</span>
                                        <span class="arrow open"></span>
                                    </a>
                                    <ul class="sub-menu" >
                                        <li class="nav-item  @if( request()->path() == 'admin/add/office/loan' ) active open @endif
                                        @if( request()->path() == '' ) active open @endif">
                                            <a href="{{route('add.office.loan')}}" class="nav-link ">
                                                <span class="title">Add Person</span>
                                            </a>
                                        </li>
                                        <li class="nav-item  @if( request()->path() == '' ) active open @endif
                                        @if( request()->path() == 'admin/office/loan' ) active open @endif">
                                            <a href="{{route('office.loan.manange')}}" class="nav-link ">
                                                <span class="title">Manage Loan</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item start @php echo "active",(request()->path() != '')?:"";@endphp
                        @php echo "active",(request()->path() != '')?:"";@endphp">
                        <a href="" class="nav-link nav-toggle">
                        <i class="fa fa-money" aria-hidden="true"></i>
                            <span class="title">Patty Cash</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li> --}}

            {{-- <li class="nav-item @if( request()->path() == 'admin/customer/management' || request()->path() == 'admin/customer/management' ) active open @endif
                @if( request()->path() == 'admin/customer/balance' || request()->path() == 'admin/customer/balance' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="title"  style="text-align: right;">Customer Relationship</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/customer/management' ) active open @endif
                    @if( request()->path() == '' ) active open @endif">
                        <a href="{{route('customer.index')}}" class="nav-link ">
                            <span class="title">Customer</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/customer/balance' ) active open @endif
                    @if( request()->path() == '' ) active open @endif">
                        <a href="{{route('balance.index')}}" class="nav-link ">
                            <span class="title">Balance</span>
                        </a>
                    </li>

                </ul>
            </li> --}}

            <li class="nav-item @if( request()->path() == 'admin/products' || request()->path() == 'admin/products' ) active open @endif
                @if( request()->path() == 'admin/category' || request()->path() == 'admin/category' ) active open @endif
                @if( request()->path() == 'admin/product/stock' || request()->path() == 'admin/product/stock' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-indent" aria-hidden="true"></i>
                    <span class="title">Product Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    {{-- <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/category' ) active open @endif">
                        <a href="{{route('product.catagory.index')}}" class="nav-link ">
                            <span class="title">Product Category</span>
                        </a>
                    </li> --}}
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/products' ) active open @endif">
                        <a href="{{route('product.index')}}" class="nav-link ">
                            <span class="title">Product List</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/product/stock' ) active open @endif">
                        <a href="{{route('product.stock')}}" class="nav-link ">
                            <span class="title">Product Stock</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if( request()->path() == 'admin/sale' || request()->path() == 'admin/sale' ) active open @endif
                @if( request()->path() == 'admin/party-management' || request()->path() == 'admin/party-management' ) active open @endif
                @if( request()->path() == 'admin/party/create' || request()->path() == 'admin/party/create' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <span class="title">Party Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/party/create' ) active open @endif
                    @if( request()->path() == 'admin/party/create' ) active open @endif">
                        <a href="{{route('party.create')}}" class="nav-link ">
                            <span class="title">Create Party</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/party-management' ) active open @endif
                    @if( request()->path() == 'admin/party-management' ) active open @endif">
                        <a href="{{route('party-management.index')}}" class="nav-link ">
                            <span class="title">Party List</span>
                        </a>
                    </li>

                </ul>
            </li>

            {{-- <li class="nav-item @if( request()->path() == 'admin/sale' || request()->path() == 'admin/sale' ) active open @endif
                @if( request()->path() == 'admin/stock/product/history' || request()->path() == 'admin/stock/product/history' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <span class="title">Sales Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/sale' ) active open @endif
                    @if( request()->path() == '' ) active open @endif">
                        <a href="{{route('product.sale.index')}}" class="nav-link ">
                            <span class="title">Sale</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/stock/product/history' ) active open @endif">
                        <a href="{{route('sold.index')}}" class="nav-link ">
                            <span class="title">Sold History</span>
                        </a>
                    </li>

                </ul>
            </li> --}}
            <li class="nav-item @if( request()->path() == 'admin/sale' || request()->path() == 'admin/sale' ) active open @endif
                @if( request()->path() == 'admin/order-history' || request()->path() == 'admin/order-history' ) active open @endif
                @if( request()->path() == 'admin/order/create' || request()->path() == 'admin/order/create' ) active open @endif">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="title">Order Management</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  @if( request()->path() == 'admin/order/create' ) active open @endif
                        @if( request()->path() == 'admin/order/create' ) active open @endif">
                            <a href="{{route('order.create')}}" class="nav-link ">
                                <span class="title">Create Order</span>
                            </a>
                        </li>
                        <li class="nav-item  @if( request()->path() == '' ) active open @endif
                        @if( request()->path() == 'admin/order-history' ) active open @endif">
                            <a href="{{route('order-history.index',"status=Pending")}}" class="nav-link ">
                                <span class="title">Order List</span>
                            </a>
                        </li>
    
                    </ul>
                </li>

            <li class="nav-item @if( request()->path() == 'admin/requisition' || request()->path() == 'requisition.receive.index' || request()->path() == 'add.purchase' || request()->path() == 'purchase.reports') active open @endif
                @if( request()->path() == 'admin/requisition' || request()->path() == 'admin/requisition' ) active open @endif
                @if( request()->path() == 'admin/requisition-receive' || request()->path() == 'admin/requisition-receive' ) active open @endif
                @if( request()->path() == 'admin/add/purchase' || request()->path() == 'admin/add/purchase' ) active open @endif
                @if( request()->path() == 'admin/purchase' || request()->path() == 'admin/purchase' ) active open @endif
                @if( request()->path() == 'admin/requisition' || request()->path() == 'admin/requisition/status' ) active open @endif
                @if( request()->path() == 'admin/requisition' || request()->path() == 'admin/requisition/receive/status' ) active open @endif
                @if( request()->path() == 'admin/requisition' || request()->path() == 'admin/requisition/receive/index' ) active open @endif">
            
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="title">Requisition</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/requisition' || request()->path() == 'admin/requisition/status') active open @endif">
                        <a href="{{route('requisition.index')}}" class="nav-link ">
                            <span class="title">Request Requisition</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/requisition-receive' || request()->path() == 'admin/requisition/receive/status' ) active open @endif">
                        <a href="{{route('requisition.receive.index')}}" class="nav-link ">
                            <span class="title">Dispatch Requisition</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item  @if( request()->path() == 'admin/add/purchase' ) active open @endif">
                        <a href="{{route('add.purchase')}}" class="nav-link ">
                            <span class="title">Add Purchase</span>
                        </a>
                    </li> --}}

                    {{-- <li class="nav-item  @if( request()->path() == 'admin/purchase' ) active open @endif">
                        <a href="{{route('purchase.reports')}}" class="nav-link ">
                            <span class="title">Purchase Reports</span>
                        </a>
                    </li> --}}

                </ul>
            </li>

            {{-- <li class="nav-item @if( request()->path() == 'admin/supplier' || request()->path() == 'admin/supplier' ) active open @endif
                @if( request()->path() == 'admin/supply/management' || request()->path() == 'admin/supply/management' ) active open @endif
                @if( request()->path() == 'admin/supply/reports' || request()->path() == 'admin/supply/reports' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-ticket" aria-hidden="true"></i>
                    <span class="title">Supplier Chain</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/supplier' ) active open @endif">
                        <a href="{{route('supplier.index')}}" class="nav-link ">
                            <span class="title">Manage Suppliers</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/supply/management' ) active open @endif">
                        <a href="{{route('supply.management')}}" class="nav-link ">
                            <span class="title">Supply Management</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == 'admin/supply/reports' ) active open @endif">
                        <a href="{{route('supply.reports')}}" class="nav-link ">
                            <span class="title">Reports</span>
                        </a>
                    </li>

                </ul>
            </li>            --}}
            <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/microbiological-test') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/medical_report') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/temp_monitoring') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production_test') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/metal-detector/create') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/metal-detector') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/temp-thermocouple') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/ro-plant') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/ro-plant/create') active open @endif
                {{-- @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/user-performance') active open @endif --}}
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/chill-room') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/chill-room/total-stock') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/chill-room/return-stock') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/processing-grade') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production_test') active open @endif
                
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-requisition/create') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-supply') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-requisition') active open @endif
                
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/supply-item') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-supplier') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-purchase-item') active open @endif

                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-purchase-requisition/Order') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-purchase-requisition/create') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-purchase-requisition') active open @endif
                
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/purchase/quotation') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/purchase/negotiation') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-quotation-confirmquotation') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/iqf') active open @endif 

                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/iqf') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/block_frozen') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/raw_bf_shrimp') active open @endif
                
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/raw_iqf_shrimp') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/semi_iqf') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/cooked_iqf_shrimp') active open @endif 
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/blanched_iqf_shrimp') active open @endif
                
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-unload') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/store-in') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/store-out') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/unload/gate_man/raw_item') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/unload/gate_man/general_item') active open @endif 
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/cold_storage/bulk_storage') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/cold_storage/export_storage_1') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/cold_storage/export_storage_2') active open @endif 
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/store_in') active open @endif 
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/manage-location/Locate_item') active open @endif 
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/medical_report') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/processing-grade') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/processing-block') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/processing-block-size') active open @endif
                @if( request()->path() == 'admin/general/stock' || request()->path() == 'admin/general/stock/total' || request()->path() == 'admin/general/stock/disbursement/list') active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <span class="title">Production Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if( request()->path() == 'admin/processing-block-size' || request()->path() == 'admin/processing-block-size' ) active open @endif
                        @if( request()->path() == 'admin/processing-block' || request()->path() == 'admin/processing-block' ) active open @endif
                        @if( request()->path() == 'admin/processing-grade' || request()->path() == 'admin/processing-grade' ) active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="title">Configuration</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item @if( request()->path() == 'admin/processing-grade' ) active open @endif">
                                <a href="{{route('processing-grade.index')}}" class="nav-link ">
                                    <span class="title">Grade List</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/processing-block' ) active open @endif">
                                <a href="{{route('processing-block.index')}}" class="nav-link ">
                                    <span class="title">Block List</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/processing-block-size' ) active open @endif">
                                <a href="{{route('processing-block-size.index')}}" class="nav-link ">
                                    <span class="title">Size List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/microbiological-test' ||  request()->path() == 'admin/temp_monitoring' ||  request()->path() == 'admin/production_test' ||  request()->path() == 'admin/temp-thermocouple' ||  request()->path() == 'admin/metal-detector' ||  request()->path() == 'admin/metal-detector/create' ||  request()->path() == 'admin/medical_report' ||  request()->path() == 'admin/ro-plant/create' ||  request()->path() == 'admin/ro-plant') active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Production Data</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == 'admin/medical_report' ) active open @endif">
                                <a href="{{route('medical_report.index')}}" class="nav-link ">
                                    <span class="title">Medical Report</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/temp_monitoring' ) active open @endif">
                                <a href="{{route('temp_monitoring.index')}}" class="nav-link ">
                                    <span class="title">Storage Temp. Monitoring</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/production_test' ) active open @endif">
                                <a href="{{route('production_test.index')}}" class="nav-link ">
                                    <span class="title">Maintenance Records</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item  @if( request()->path() == 'admin/user-performance' ) active open @endif">
                                <a href="{{route('user-performance.index')}}" class="nav-link ">
                                    <span class="title">User Performance</span>
                                </a>
                            </li> --}}
                            <li class="nav-item  @if( request()->path() == 'admin/temp-thermocouple' ) active open @endif">
                                <a href="{{route('temp-thermocouple.index')}}" class="nav-link ">
                                    <span class="title">Temperature Thermocouple</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/metal-detector' || request()->path() == 'admin/metal-detector/create' || request()->path() == 'admin/metal-detector' ) active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Metal Detector Check</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/metal-detector/create' ) active open @endif">
                                        <a href="{{route('metal-detector.create')}}" class="nav-link ">
                                            <span class="title">Create</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/metal-detector' ) active open @endif">
                                        <a href="{{route('metal-detector.index')}}" class="nav-link ">
                                            <span class="title">Check List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/ro-plant'|| request()->path() == 'admin/ro-plant' || request()->path() == 'admin/ro-plant/create') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Ro Plant</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/ro-plant/create' ) active open @endif">
                                        <a href="{{route('ro-plant.create')}}" class="nav-link ">
                                            <span class="title">Create Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/ro-plant' ) active open @endif">
                                        <a href="{{route('ro-plant.index')}}" class="nav-link ">
                                            <span class="title">Report List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/microbiological-test' ) active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Microbiological Test Reports</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/report-genarate' ) active open @endif">
                                        <a href="{{route('microbiological.test.report.genarate')}}" class="nav-link ">
                                            <span class="title">Report Genarate</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/microbiological-test' ) active open @endif">
                                        <a href="{{route('microbiological-test.index')}}" class="nav-link ">
                                            <span class="title">Reports</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/production/chill-room' || request()->path() == 'admin/production/chill-room' ) active open @endif
                        @if( request()->path() == 'admin/production/chill-room/return-stock' || request()->path() == 'admin/production/chill-room/return-stock' ) active open @endif
                        @if( request()->path() == 'admin/production/chill-room/total-stock' || request()->path() == 'admin/production/chill-room/total-stock' ) active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-print" aria-hidden="true"></i>
                            <span class="title">Chill Room</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item @if( request()->path() == 'admin/production/chill-room' ) active open @endif">
                                <a href="{{route('production.chill_room.index')}}" class="nav-link ">
                                    <span class="title">Stock Details</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/chill-room/total-stock' ) active open @endif">
                                <a href="{{route('production.chill_room.total_stock')}}" class="nav-link ">
                                    <span class="title">Total Stock</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/chill-room/return-stock' ) active open @endif">
                                <a href="{{route('production.chill_room.return_stock')}}" class="nav-link ">
                                    <span class="title">Return Stock</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item @if( request()->path() == 'admin/production/chill-room' ) active open @endif">
                        <a href="{{route('production.chill_room.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Chill Room</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item @if( request()->path() == 'admin/processing-grade' ) active open @endif">
                        <a href="{{route('processing-grade.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="title">Configuration</span>
                        </a>
                    </li> --}}
                    
                    <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/supply-item' ||  request()->path() == 'admin/production-supplier'  ||  request()->path() == 'admin/production-requisition'  ||  request()->path() == 'admin/production-supply'  ||  request()->path() == 'admin/production-requisition/create') active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Supply </span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == 'admin/supply-item' ) active open @endif">
                                <a href="{{route('supply-item.index')}}" class="nav-link ">
                                    <span class="title">Items</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/production-supplier' ) active open @endif">
                                <a href="{{route('production-supplier.index')}}" class="nav-link ">
                                    <span class="title">Manage Suplyer</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-requisition/create' ||  request()->path() == 'admin/production-supply' ||  request()->path() == 'admin/production-requisition') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Requisition</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/production-requisition/create' ) active open @endif">
                                        <a href="{{route('production-requisition.create')}}" class="nav-link ">
                                            <span class="title">Add Requisition</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/production-supply' ) active open @endif">
                                        <a href="{{route('production-supply.index')}}" class="nav-link ">
                                            <span class="title">Production Supply List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/production-requisition' ) active open @endif">
                                        <a href="{{route('production-requisition.index',['status'=>'Pending','page'=>1])}}" class="nav-link ">
                                            <span class="title">Requisition List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/purchase/item'||  request()->path() == 'admin/production-purchase-item' ||  request()->path() == 'admin/production-purchase-requisition/create'  ||  request()->path() == 'admin/production-purchase-requisition'  ||  request()->path() == 'admin/production/purchase/quotation' ||  request()->path() == 'admin/production/purchase/negotiation'  ||  request()->path() == 'admin/production-quotation-confirmquotation' ||  request()->path() == 'admin/production-purchase-requisition/Order' || request()->path() == 'admin/general/stock' || request()->path() == 'admin/general/stock/total' || request()->path() == 'admin/general/stock/disbursement/list') active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">General Purchase </span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == 'admin/production-purchase-item') active open @endif">
                                <a href="{{route('production-purchase-item.index')}}" class="nav-link ">
                                    <span class="title">Items</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/general/stock' || request()->path() == 'admin/general/stock/total' || request()->path() == 'admin/general/stock/disbursement/list' ) active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">General Stock</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/general/stock') active open @endif">
                                        <a href="{{route('general.stock')}}" class="nav-link ">
                                            <span class="title">Disbursement</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/general/stock/disbursement/list' ) active open @endif">
                                        <a href="{{route('general.stock.disbursement.list')}}" class="nav-link ">
                                            <span class="title">Disbursement List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/general/stock/total' ) active open @endif">
                                        <a href="{{route('general.stock.total')}}" class="nav-link ">
                                            <span class="title">Total Stock</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item   @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production-purchase-requisition/create' || request()->path() == 'admin/production-purchase-requisition' || request()->path() == 'admin/production/purchase/quotation' || request()->path() == 'admin/production/purchase/negotiation' ||  request()->path() == 'admin/production-quotation-confirmquotation' || request()->path() == 'admin/production-purchase-requisition/Order') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Requisition</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/production-purchase-requisition/create' ) active open @endif">
                                        <a href="{{route('production-purchase-requisition.create')}}" class="nav-link ">
                                            <span class="title">Add Requisition</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/production-purchase-requisition' ) active open @endif">
                                        <a href="{{route('production-purchase-requisition.index',"status=Pending")}}" class="nav-link ">
                                            <span class="title">Requisition List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/production/purchase/quotation' ) active open @endif">
                                        <a href="{{route('production-purchase-quotation')}}" class="nav-link ">
                                            <span class="title">Quotation List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  @if( request()->path() == 'admin/production/purchase/negotiation' ) active open @endif">
                                        <a href="{{route('production.purchase.negotiation')}}" class="nav-link ">
                                            <span class="title">Negotiation List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  @if( request()->path() == 'admin/production-quotation-confirmquotation' ) active open @endif">
                                        <a href="{{route('production-quotation-confirmquotation')}}" class="nav-link ">
                                            <span class="title">CS List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  @if( request()->path() == 'admin/production-purchase-requisition/Order' ) active open @endif">
                                        <a href="{{route('production-purchase-requisition.order')}}" class="nav-link ">
                                            <span class="title">Purchase Order</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/unload/gate_man/general_item'||  request()->path() == 'admin/production/unload/gate_man/raw_item' ||  request()->path() == 'admin/production-unload') active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Unload Unit</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/unload/gate_man/general_item'||  request()->path() == 'admin/production/unload/gate_man/raw_item') active open @endif">
                                {{-- <a href="{{route('production.processing.iqf')}}" class="nav-link ">
                                    <span class="title">IQF</span>
                                </a> --}}
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Gate Man</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/production/unload/gate_man/general_item') active open @endif">
                                        {{-- <a href="{{route('production.processing.iqf')}}" class="nav-link ">
                                            <span class="title">IQF</span>
                                        </a> --}}
                                        <a href="{{route('production.unload.gateman.general_item')}}" class="nav-link ">
                                            <span class="title">General Item Check In</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/production/unload/gate_man/raw_item') active open @endif">
                                        <a href="{{route('production.unload.gateman.raw_item')}}" class="nav-link ">
                                            <span class="title">Raw Item Check In</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/production-unload') active open @endif">
                                <a href="{{route('production-unload-index')}}" class="nav-link ">
                                    <i class="fa fa-remove"></i>
                                    <span class="title">Raw Item Unload</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/production/processing-unit/iqf'||  request()->path() == 'admin/production/processing-unit/block_frozen' ||  request()->path() == 'admin/production/processing-unit/raw_bf_shrimp'  ||  request()->path() == 'admin/production/processing-unit/raw_iqf_shrimp'  ||  request()->path() == 'admin/production/processing-unit/semi_iqf'  ||  request()->path() == 'admin/production/processing-unit/cooked_iqf_shrimp' ||  request()->path() == 'admin/production/processing-unit/blanched_iqf_shrimp') active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Processing Unit</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/iqf') active open @endif">
                                <a href="{{route('production.processing.iqf')}}" class="nav-link ">
                                    <span class="title">IQF</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/block_frozen') active open @endif">
                                <a href="{{route('production.processing.block_frozen')}}" class="nav-link ">
                                    <span class="title">Block Frozen</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/raw_bf_shrimp') active open @endif">
                                <a href="{{route('production.processing.raw_bf_shrimp')}}" class="nav-link ">
                                    <span class="title">RAW BF(Shrimp)</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/raw_iqf_shrimp') active open @endif">
                                <a href="{{route('production.processing.raw_iqf_shrimp')}}" class="nav-link ">
                                    <span class="title">RAW IQF(Shrimp)</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/semi_iqf') active open @endif">
                                <a href="{{route('production.processing.semi_iqf')}}" class="nav-link ">
                                    <span class="title">Semi IQF</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/cooked_iqf_shrimp') active open @endif">
                                <a href="{{route('production.processing.cooked_iqf_shrimp')}}" class="nav-link ">
                                    <span class="title">Cooked IQF(Shrimp)</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/blanched_iqf_shrimp') active open @endif">
                                <a href="{{route('production.processing.blanched_iqf_shrimp')}}" class="nav-link ">
                                    <span class="title">Blanched IQF(Shrimp)</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Other Processing</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/iqf') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Vegetable/Fruit</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/production/other_processing/vegetable/iqf') active open @endif">
                                        <a href="{{route('production.other_processing.vegetable.iqf')}}" class="nav-link ">
                                            <span class="title">IQF</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/production/other_processing/vegetable/block') active open @endif">
                                        <a href="{{route('production.other_processing.vegetable.block')}}" class="nav-link ">
                                            <span class="title">Block</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/processing-unit/iqf') active open @endif">
                                <a href="{{route('production.other_processing.dryfish.index')}}" class="nav-link nav-toggle">
                                    <span class="title">Dry Fish</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/store-in'||  request()->path() == 'admin/production/unload/gate_man/raw_item' ||  request()->path() == 'admin/inventory/cold_storage/export_storage_2' ||  request()->path() == 'admin/inventory/cold_storage/export_storage_1' ||  request()->path() == 'admin/inventory/cold_storage/bulk_storage'  ||  request()->path() == 'admin/inventory/store_in' ||  request()->path() == 'admin/inventory/manage-location/Locate_item') active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title"><small> Inventory Management</small></span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/store-in') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Store</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/inventory/store-in') active open @endif">
                                        <a href="{{route('inventory.store_in')}}" class="nav-link ">
                                            <span class="title">Store In</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == '') active open @endif">
                                        <a href="{{route('inventory.store_in')}}" class="nav-link ">
                                            <span class="title">Store Out</span>
                                        </a>
                                    </li>  
                                </ul>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/manage-location/Locate_item'||  request()->path() == 'admin/production/unload/gate_man/raw_item') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Manage Location</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/inventory/manage-location/Locate_item') active open @endif">
                                        <a href="{{route('inventory.location.locate_item')}}" class="nav-link ">
                                            <span class="title">Locate Item</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == '') active open @endif">
                                        <a href="{{route('inventory.location.located_item_list')}}" class="nav-link ">
                                            <span class="title">Located Item List</span>
                                        </a>
                                    </li>  
                                </ul>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/inventory/adjustment/create' || request()->path() == 'admin/inventory/adjustment/list') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Adjustment</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/inventory/adjustment/create') active open @endif">
                                        <a href="{{route('inventory.adjustment.create')}}" class="nav-link ">
                                            <span class="title">Create</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/inventory/adjustment/list') active open @endif">
                                        <a href="{{route('inventory.adjustment.list',"status=Pending")}}" class="nav-link ">
                                            <span class="title">List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/inventory/cold_storage/bulk_storage'||  request()->path() == 'admin/inventory/cold_storage/export_storage_1' ||  request()->path() == 'admin/inventory/cold_storage/export_storage_2') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Cold Storage</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/inventory/cold_storage/bulk_storage') active open @endif">
                                        <a href="{{route('inventory.cold_storage.bulk_storage')}}" class="nav-link ">
                                            <span class="title">Bulk Storage</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/inventory/cold_storage/export_storage_1') active open @endif">
                                        <a href="{{route('inventory.cold_storage.export_storage_1')}}" class="nav-link ">
                                            <span class="title">Export Storage 1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/inventory/cold_storage/export_storage_2') active open @endif">
                                        <a href="{{route('inventory.cold_storage.export_storage_2')}}" class="nav-link ">
                                            <span class="title">Export Storage 2</span>
                                        </a>
                                    </li>  
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if( request()->path() == 'admin/export/sale/contract/create' || request()->path() == 'admin/export/sale/contract/create' ) active open @endif
                @if( request()->path() == 'admin/export-buyer' || request()->path() == 'admin/export-buyer' ) active open @endif
                @if( request()->path() == 'admin/export/sale/contract/list' || request()->path() == 'admin/export/sale/contract/list' ) active open @endif
                @if( request()->path() == 'admin/export/commercial/list' || request()->path() == 'admin/export/commercial/list' ) active open @endif
                @if( request()->path() == 'admin/export/packing/list' || request()->path() == 'admin/export/packing/list' ) active open @endif
                @if( request()->path() == 'admin/export-pack' || request()->path() == 'admin/export-pack' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <span class="title">Export Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if( request()->path() == 'admin/production/chill-room' || request()->path() == 'admin/production/chill-room' ) active open @endif
                        @if( request()->path() == 'admin/production/chill-room/return-stock' || request()->path() == 'admin/production/chill-room/return-stock' ) active open @endif
                        @if( request()->path() == 'admin/export-pack' || request()->path() == 'admin/export-pack' ) active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="title">Configuration</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item @if( request()->path() == 'admin/export-pack' ) active open @endif">
                                <a href="{{route('export-pack.index')}}" class="nav-link ">
                                    <span class="title">Export Pack Size</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/export-buyer' ) active open @endif">
                                <a href="{{route('export-buyer.index')}}" class="nav-link ">
                                    <span class="title">Manage Buyer</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item @if( request()->path() == 'admin/export/sale/contract/create' ) active open @endif">
                        <a href="{{route('sale_contract.create')}}" class="nav-link ">
                            <span class="title">Create Sales Contract</span>
                        </a>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/export/sale/contract/list' ) active open @endif">
                        <a href="{{route('sale_contract.index',"status=Pending")}}" class="nav-link ">
                            <span class="title">Sales Contract List</span>
                        </a>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/export/commercial/list' ) active open @endif">
                        <a href="{{route('commercial.list',"status=Pending")}}" class="nav-link ">
                            <span class="title">Commercial List</span>
                        </a>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/export/packing/list' ) active open @endif">
                        <a href="{{route('packing.list',"status=Pending")}}" class="nav-link ">
                            <span class="title">Packing List</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @if( request()->path() == 'admin/raw_wastage' || request()->path() == 'admin/raw_wastage' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <span class="title">Wastage Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if( request()->path() == 'admin/raw_wastage' ) active open @endif">
                        <a href="{{route('raw_wastage.index')}}" class="nav-link ">
                            <span class="title">Wastage Release</span>
                        </a>
                    </li>
                    <li class="nav-item @if( request()->path() == 'admin/wastage-management' ) active open @endif">
                        <a href="" class="nav-link ">
                            <span class="title">Release List</span>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item  @if( request()->path() == 'admin/office' || request()->path() == 'admin/office' ) active open @endif
                @if( request()->path() == 'admin/food/mill' || request()->path() == 'admin/food/mill' ) active open @endif
                @if( request()->path() == 'admin/catering/system' || request()->path() == 'admin/catering/system' ) active open @endif
                @if( request()->path() == 'admin/catering/add' || request()->path() == 'admin/catering/add' ) active open @endif
                @php echo "active",(request()->path() != 'admin/account/catering')?:"";@endphp
                @php echo "active",(request()->path() != '')?:"";@endphp
                    ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cutlery" aria-hidden="true"></i>
                    <span class="title">Catering Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/office')?:"";@endphp
                    @php echo "active",(request()->path() != '')?:"";@endphp">
                        <a href="{{route('office.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <span class="title">Office Manage</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/food/mill')?:"";@endphp
                    @php echo "active",(request()->path() != '')?:"";@endphp">
                        <a href="{{route('food.mill.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-spoon" aria-hidden="true"></i>
                            <span class="title">Meal Package</span>
                            <span class="selected"></span>
                        </a>
                    </li>




                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/catering/system')?:"";@endphp
                    @php echo "active",(request()->path() != '')?:"";@endphp">
                        <a href="{{route('catering.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-bus" aria-hidden="true"></i>
                            <span class="title">Food Delivery</span>
                            <span class="selected"></span>
                        </a>
                    </li>

            
                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/account/catering')?:"";@endphp
                    @php echo "active",(request()->path() != '')?:"";@endphp">
                        <a href="{{route('catering.accounts.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-balance-scale"></i>
                            <span class="title">Catering Due History</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li> --}}
            
            <li class="nav-item  @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/user-type') active open @endif
                @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/general') active open @endif
                ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span class="title">General Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start @if( request()->path() == 'admin/user-type') active open @endif">
                        <a href="{{route('user-type.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <span class="title">Menu</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start @if( request()->path() == 'admin/general') active open @endif">
                        <a href="{{route('general.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-cog"></i>
                            <span class="title">General Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</div>
