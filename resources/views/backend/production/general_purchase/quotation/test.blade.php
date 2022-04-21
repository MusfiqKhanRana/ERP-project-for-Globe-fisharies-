
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
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/add-employee' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/individual-attendance' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance-count' ) active open @endif
                @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/edit-employee' ) active open @endif
                @php echo "active",(request()->path() != 'admin/payroll')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/payroll/chart')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/payroll/salary/sheet')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/award')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/award/create')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/award/edit/{$url}')?:"";@endphp
                @php echo "active",(request()->path() != 'admin/employee/task')?:"";@endphp
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
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance' ) active open @endif
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/individual-attendance' ) active open @endif
                    @if( request()->path() == 'admin/employee' || request()->path() == 'admin/employee/attendance-count' ) active open @endif
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
                            <li class="nav-item  @if( request()->path() == 'admin/individual-attendance' ) active open @endif
                            @if( request()->path() == 'individual-attendance' ) active open @endif">
                                <a href="{{route('employee.individual')}}" class="nav-link">
                                    <span class="title">Individual Attendance</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/tiffin-bill') active open @endif
                                @if( request()->path() == 'tiffin-bill' ) active open @endif">
                                    <a href="{{route('tiffin-bill.index')}}" class="nav-link">
                                        <span class="title">Employee Tiffin Bill</span>
                                    </a>
                                </li>
                        </ul>
                    </li>
                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/payroll')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/payroll/chart')?:"";@endphp
                        @php echo "active",(request()->path() != 'admin/payroll/salary/sheet')?:"";@endphp">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-clock-o" aria-hidden="true"></i>
                                <span class="title">Attendance </span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  @if( request()->path() == 'admin/payroll' ) active open @endif">
                                    <a href="{{route('employee-attendance.index')}}" class="nav-link ">
                                        <span class="title">My Attendance</span>
                                    </a>
                                </li>
    
                                <li class="nav-item  @if( request()->path() == 'admin/payroll/chart' ) active open @endif">
                                    <a href="{{route('employee.attend')}}" class="nav-link ">
                                        <span class="title">Attendance List</span>
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
                    @php echo "active",(request()->path() != 'admin/payroll/chart')?:"";@endphp
                    @php echo "active",(request()->path() != 'admin/payroll/salary/sheet')?:"";@endphp">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-money"></i>
                            <span class="title">Employee Payroll</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == 'admin/payroll' ) active open @endif">
                                <a href="{{route('payroll.index')}}" class="nav-link ">
                                    <span class="title">Employee Salary</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/payroll/chart' ) active open @endif">
                                <a href="{{route('payroll.chart')}}" class="nav-link ">
                                    <span class="title">Salary Chart</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/payroll/add-increment' ) active open @endif">
                                <a href="{{route('payroll.add-increment')}}" class="nav-link ">
                                    <span class="title">Add Increment</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/payroll/advance-loan' ) active open @endif">
                                <a href="{{route('payroll.advance-loan')}}" class="nav-link ">
                                    <span class="title">Advance Loan</span>
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

                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/employee/task')?:"";@endphp
                    @php echo "active",(request()->path() != 'admin/employee/task-add')?:"";@endphp">
                        <a href="{{route('employee.task')}}" class="nav-link nav-toggle">
                            <i class="fa fa-files-o" aria-hidden="true"></i>
                            <span class="title">Task Management</span>
                            <span class="selected"></span>
                        </a>
                    </li>

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
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
                    @if( request()->path() == 'admin/category' ) active open @endif">
                        <a href="{{route('product.catagory.index')}}" class="nav-link ">
                            <span class="title">Product Category</span>
                        </a>
                    </li>
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
                @if( request()->path() == 'admin/party-management' || request()->path() == 'admin/party-management' ) active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-print" aria-hidden="true"></i>
                    <span class="title">Party Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  @if( request()->path() == 'admin/party' ) active open @endif
                    @if( request()->path() == '' ) active open @endif">
                        <a href="{{route('party.create')}}" class="nav-link ">
                            <span class="title">Create Party</span>
                        </a>
                    </li>
                    <li class="nav-item  @if( request()->path() == '' ) active open @endif
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
                @if( request()->path() == 'admin/order-history' || request()->path() == 'admin/order-history' ) active open @endif">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="title">Order Management</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  @if( request()->path() == 'admin/sale' ) active open @endif
                        @if( request()->path() == '' ) active open @endif">
                            <a href="{{route('order.create')}}" class="nav-link ">
                                <span class="title">Order</span>
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
            <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/microbiological-test' ||  request()->path() == 'admin/temp_monitoring') active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <span class="title">Production Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if( request()->path() == 'admin/report-genarate' || request()->path() == 'admin/microbiological-test' ||  request()->path() == 'admin/temp_monitoring') active open @endif">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Production Data</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  @if( request()->path() == 'admin/production' ) active open @endif">
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
                            <li class="nav-item  @if( request()->path() == 'admin/user-performance' ) active open @endif">
                                <a href="{{route('user-performance.index')}}" class="nav-link ">
                                    <span class="title">User Performance</span>
                                </a>
                            </li>
                            <li class="nav-item  @if( request()->path() == 'admin/temp-thermocouple' ) active open @endif">
                                <a href="{{route('temp-thermocouple.index')}}" class="nav-link ">
                                    <span class="title">Temperature Thermocouple</span>
                                </a>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/production/metal-detector' || request()->path() == 'admin/microbiological-test' ) active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Metal Detector Check</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/production/metal-detector' ) active open @endif">
                                        <a href="{{route('metal-detector.create')}}" class="nav-link ">
                                            <span class="title">Create</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/production/metal-detector' ) active open @endif">
                                        <a href="{{route('metal-detector.index')}}" class="nav-link ">
                                            <span class="title">Check List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item @if( request()->path() == 'admin/ro-plant') active open @endif">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Ro Plant</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item @if( request()->path() == 'admin/ro-plant' ) active open @endif">
                                        <a href="{{route('ro-plant.create')}}" class="nav-link ">
                                            <span class="title">Create Report</span>
                                        </a>
                                    </li>
                                    <li class="nav-item @if( request()->path() == 'admin/production/metal-detector' ) active open @endif">
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
                    <li class="nav-item">
                        <a href="{{route('production.chill_room.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Chill Room</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('processing-grade.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            <span class="title">Configuration</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Supply </span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{route('supply-item.index')}}" class="nav-link ">
                                    <span class="title">Items</span>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('production-supplier.index')}}" class="nav-link ">
                                    <span class="title">Manage Suplyer</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Requisition</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{route('production-requisition.create')}}" class="nav-link ">
                                            <span class="title">Add Requisition</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('production-supply.index')}}" class="nav-link ">
                                            <span class="title">Production Supply List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('production-requisition.index',['status'=>'Pending','page'=>1])}}" class="nav-link ">
                                            <span class="title">Requisition List</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">General Purchase </span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{route('production-purchase-item.index')}}" class="nav-link ">
                                    <span class="title">Items</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Requisition</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{route('production-purchase-requisition.create')}}" class="nav-link ">
                                            <span class="title">Add Requisition</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('production-purchase-requisition.index',"status=Pending")}}" class="nav-link ">
                                            <span class="title">Requisition List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('production-purchase-quotation')}}" class="nav-link ">
                                            <span class="title">Qoutation List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('production-quotation-confirmquotation')}}" class="nav-link ">
                                            <span class="title">CS List</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{route('production-purchase-requisition.order')}}" class="nav-link ">
                                            <span class="title">Purchase Order</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Unload Unit</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                {{-- <a href="{{route('production.processing.iqf')}}" class="nav-link ">
                                    <span class="title">IQF</span>
                                </a> --}}
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-user"></i>
                                    <span class="title">Gate Man</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        {{-- <a href="{{route('production.processing.iqf')}}" class="nav-link ">
                                            <span class="title">IQF</span>
                                        </a> --}}
                                        <a href="{{route('production.unload.gateman.general_item')}}" class="nav-link ">
                                            <span class="title">General Item Check In</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('production.unload.gateman.raw_item')}}" class="nav-link ">
                                            <span class="title">Raw Item Check In</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('production-unload-index')}}" class="nav-link ">
                                    <span class="title">Raw Item Unload</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Processing Unit</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{route('production.processing.iqf')}}" class="nav-link ">
                                    <span class="title">IQF</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('production.processing.block_frozen')}}" class="nav-link ">
                                    <span class="title">Block Frozen</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('production.processing.raw_bf_shrimp')}}" class="nav-link ">
                                    <span class="title">RAW BF(Shrimp)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('production.processing.raw_iqf_shrimp')}}" class="nav-link ">
                                    <span class="title">RAW IQF(Shrimp)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('production.processing.semi_iqf')}}" class="nav-link ">
                                    <span class="title">Semi IQF</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('production.processing.cooked_iqf_shrimp')}}" class="nav-link ">
                                    <span class="title">Cooked IQF(Shrimp)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('production.processing.blanched_iqf_shrimp')}}" class="nav-link ">
                                    <span class="title">Blanched IQF(Shrimp)</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Inventory Management Store</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                {{-- <a href="{{route('production.processing.iqf')}}" class="nav-link ">
                                    <span class="title">IQF</span>
                                </a> --}}
                                <a href="#" class="nav-link ">
                                    <span class="title">Store In</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('production-unload-index')}}" class="nav-link ">
                                    <span class="title">Store Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a href="" class="nav-link nav-toggle" >
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    <span class="title">Raw Product & Wastage</span>
                    <span class="selected"></span>
                </a>
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
            
            <li class="nav-item  @if( request()->path() == 'admin/office' || request()->path() == 'admin/office' ) active open @endif
                @if( request()->path() == 'admin/food/mill' || request()->path() == 'admin/food/mill' ) active open @endif
                @if( request()->path() == 'admin/catering/system' || request()->path() == 'admin/catering/system' ) active open @endif
                @if( request()->path() == 'admin/catering/add' || request()->path() == 'admin/catering/add' ) active open @endif
                @php echo "active",(request()->path() != 'admin/account/catering')?:"";@endphp
                @php echo "active",(request()->path() != '')?:"";@endphp
                ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span class="title">General Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/office')?:"";@endphp
                    @php echo "active",(request()->path() != '')?:"";@endphp">
                        <a href="{{route('user-type.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-building-o" aria-hidden="true"></i>
                            <span class="title">Menu</span>
                            <span class="selected"></span>
                        </a>
                    </li>

                    <li class="nav-item start @php echo "active",(request()->path() != 'admin/general')?:"";@endphp">
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






///////////////////////////////



<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwardController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankTransactionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerBalanceController;
use App\Http\Controllers\CutomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeLoanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalePointController;
use App\Http\Controllers\TimezoneController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SupplyManagmentController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CateringManagement;
use App\Http\Controllers\OfficeDetailController;
use App\Http\Controllers\FoodMillController;
use App\Http\Controllers\CateringController;
use App\Http\Controllers\ChillStorageController;
use App\Http\Controllers\ColdstorageController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\FishGradeController;
use App\Http\Controllers\MedicalReportController;
use App\Http\Controllers\MetalDetectorCheckController;
use App\Http\Controllers\MicrobiologicalTestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackControler;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PersonalManagementController;
use App\Http\Controllers\ProductOrderController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\RequisitionProductController;
use App\Http\Controllers\RequisitionReceiveController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\PratyProductController;
use App\Http\Controllers\ProcessingBlockController;
use App\Http\Controllers\ProcessingBlockSizeController;
use App\Http\Controllers\ProcessingGradeController;
use App\Http\Controllers\Production\ProductionBlockController;
use App\Http\Controllers\Production\ProductionIqfController;
use App\Http\Controllers\ProductionGeneralPurchaseQuotationController;
use App\Http\Controllers\ProductionPurchaseItemController;
use App\Http\Controllers\ProductionPurchaseRequisitionController;
use App\Http\Controllers\ProductionPurchaseRequisitionItemController;
use App\Http\Controllers\ProductionPurchaseTypeController;
use App\Http\Controllers\ProductionPurchaseUnitController;
use App\Http\Controllers\ProductionRequisitionController;
use App\Http\Controllers\ProductionRequisitionItemController;
use App\Http\Controllers\ProductionSupplierController;
use App\Http\Controllers\ProductionSupplyListItemController;
use App\Http\Controllers\ProductionSupplierItemController;
use App\Http\Controllers\ProductionSupplyListController;
use App\Http\Controllers\ProductionTestController;
use App\Http\Controllers\ProductionUnloadController;
use App\Http\Controllers\ProductionUserPerformanceController;
use App\Http\Controllers\SupplyItemController;
use App\Http\Controllers\TempMonitoringController;
use App\Http\Controllers\TempTherController;
use App\Http\Controllers\TiffinBillController;
use App\Http\Controllers\RoPlantController;
use App\Models\ProductionProcessingGrade;
use App\Models\ProductionPurchaseRequisitionItem;
use App\Models\ProductionRequisition;
use App\Models\ProductionRequisitionItem;
use App\Models\ProductionSupplyList;
use App\Models\TemperatureThermocouple;
use App\Models\TempMonitoring;
use App\Models\TiffinBill;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return Redirect('/');
})->name('login');
Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/post-login', [AuthController::class, 'login'])->name('post-login');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'],function () {
    Route::get('/dashboard',[AdminController::class,'index'] )->name('admin.dashboard');
    Route::post('/logout',[AuthController::class,'logout'])->name('admin.logout');

    Route::get('/department',[DepartmentController::class,'index' ])->name('admin.department');
    Route::post('/department-post', [DepartmentController::class,'store'])->name('department.post');
    Route::get('/department/delete/{id}', [DepartmentController::class,'destroy'])->name('department.delete');
    Route::get('/department/edit/{id}', [DepartmentController::class,'edit'])->name('department.edit');
    Route::put('/department/update/{id}', [DepartmentController::class,'update'])->name('department.update');
    Route::get('department-delete', [DepartmentController::class,'deleteDeign'])->name('dep-delete');

    Route::post('/employee/ajaxlist',[EmployeeController::class,'ajaxlist'] )->name('employee.ajaxlist');
    Route::get('/employee',[EmployeeController::class,'index'] )->name('employee.list');
    Route::get('/employee/add-employee',[EmployeeController::class,'create'])->name('employee.add');
    Route::get('/employee/edit-employee/{id}',[EmployeeController::class,'edit'] )->name('employee.edit');
    Route::post('/employee/designation-pass',[EmployeeController::class,'designation_pass'])->name('designation.pass');
    Route::post('/employee-post',[EmployeeController::class,'store'])->name('employee.post');
    Route::get('/employee-delete/{id}',[EmployeeController::class,'destroy'])->name('employee.delete');
    Route::put('/employee-update/{id}',[EmployeeController::class,'personalDataUpdate'])->name('employee.update');
    Route::put('/employee-company-update/{id}',[EmployeeController::class,'companyditailUpdate'])->name('employee.company.update');
    Route::put('/employee-bank-update/{id}',[EmployeeController::class,'bankDetailUpdate'])->name('employee.bank.update');
    Route::put('/employee-document-update/{id}',[EmployeeController::class,'documentUpdate'])->name('employee.document.update');
    Route::get('employee/attendance', [AttendanceController::class,'index'])->name('employee.attend');

    Route::post('attendance-post', [AttendanceController::class,'store'])->name('attendance.post');
    Route::get('attendance-approve/{id}', [AttendanceController::class,'attendanceApprove'])->name('approve.attend');
    Route::get('individual-attendance', [AttendanceController::class,'individualIndex'])->name('employee.individual');
    Route::post('individual-attendance-search', [AttendanceController::class,'individualAttend'])->name('attend.search');

    Route::get('payroll/advance-loan',[PayrollController::class,'advance_loan'])->name('payroll.advance-loan');
    Route::get('payroll/add-increment',[PayrollController::class,'addIncrement'])->name('payroll.add-increment');
    Route::get('payroll', [PayrollController::class,'index'])->name('payroll.index');
    Route::post('payroll-count', [PayrollController::class,'count'])->name('payroll.count');
    Route::get('payroll/chart', [PayrollController::class,'show'])->name('payroll.chart');
    Route::post('payroll/salary/sheet', [PayrollController::class,'salarySheet'])->name('salary.sheet');
    Route::post('payroll/payment-save', [PayrollController::class,'store'])->name('payment.save');
    Route::get('payroll/payment-delete/{id}', [PayrollController::class,'destroy'])->name('salary-chart.delete');

    Route::post('payroll/individual-salary', [PayrollController::class,'individualSalary'])->name('individual-salary.search');

    Route::get('/award',[AwardController::class,"index"] )->name('award.index');
    Route::get('/award/create',[AwardController::class,"create"] )->name('award.create');
    Route::get('/award/edit/{id}',[AwardController::class,"edit"] )->name('award.edit');
    Route::put('/award/update/{id}',[AwardController::class,"update"] )->name('award.update');
    Route::get('/award/delete/{id}',[AwardController::class,"destroy"] )->name('award.delete');
    Route::post('/award-post',[AwardController::class,"store"] )->name('award.post');

    Route::get('employee/task', [TaskController::class,'index'])->name('employee.task');
    Route::get('employee/task-add', [TaskController::class,'create'])->name('task.add');
    Route::get('employee/task-delete/{id}', [TaskController::class,'destroy'])->name('task.delete');
    Route::post('employee/task-post', [TaskController::class,'store'])->name('task.post');
    Route::post('employee/task-employee', [TaskController::class,'employeeAdd'])->name('employee.pass');

    Route::get('/notice',[NoticeController::class,"index"] )->name('notice.index');
    Route::get('/notice/create',[NoticeController::class,"create"] )->name('notice.add');
    Route::get('/notice/edit/{id}',[NoticeController::class,"edit"] )->name('notice.edit');
    Route::post('/notice-post',[NoticeController::class,"store"] )->name('notice.post');
    Route::put('/notice-update/{id}',[NoticeController::class,"update"] )->name('notice.update');
    Route::get('/notice-delete/{id}',[NoticeController::class,"destroy"] )->name('notice.delete');

    Route::get('/holidays', [HolidayController::class,'index'])->name('holiday.index');
    Route::post('/holidays-post', [HolidayController::class,'store'])->name('holiday.post');
    Route::get('/holidays-delete/{id}', [HolidayController::class,'destroy'])->name('holiday.delete');
    Route::post('/holidays-pass', [HolidayController::class,'dateAjax'])->name('holiday.pass');

    Route::post('timezone', [TimezoneController::class,'changeTime'])->name('timezone.pass');
    Route::post('timezone-update/{id}', [TimezoneController::class,'update'])->name('timezone.update');

    Route::get('/sale',[SalePointController::class,'indexSale'])->name('product.sale.index');
    Route::post('/get/product',[SalePointController::class,'product_pass'])->name('product.pass');
    Route::post('/get/product/detail',[SalePointController::class,'productGet'])->name('product.element.pass');
    Route::post('/sale/product',[SalePointController::class,'saleProduct'])->name('sale.product');

    Route::get('/stock/product/history', [SalePointController::class,'soldProductHistory'])->name('sold.index');
    Route::get('/print/history/{invoice_id}', [SalePointController::class,'printHistory'])->name('print.history.soldproduct');

    
    Route::get('/accounts',[AccountController::class, 'index'] )->name('account.index');
    Route::get('/account/income-expense',[AccountController::class,'incomeExpense' ])->name('income.expense');
    Route::post('/accounts-income-post', [AccountController::class,'incomeStore'])->name('account.income');
    Route::post('/accounts-expense-post', [AccountController::class,'expenseStore'])->name('account.expense');
    Route::get('/accounts/transaction', [TransactionController::class,'index'])->name('trans.index');
    Route::post('/accounts/income-post', [TransactionController::class,'incomeStore'])->name('income.post');
    Route::post('/accounts/expense-post', [TransactionController::class,'expenseStore'])->name('expense.post');
    Route::put('/accounts/income-update/{id}', [TransactionController::class,'incomeUpdate'])->name('income.update');
    Route::put('/accounts/expense/{id}', [TransactionController::class,'expenseUpdate'])->name('expense.update');
    Route::get('/accounts/income-delete/{id}', [TransactionController::class,'incomeDestroy'])->name('income.delete');
    Route::get('/accounts/expense-delete/{id}', [TransactionController::class,'expenseDestroy'])->name('expense.delete');

    Route::post('/accounts/total-income', [TransactionController::class,'totalIncome'])->name('income.search');
    Route::post('/accounts/total-expense', [TransactionController::class,'totalExpense'])->name('expense.search');

    Route::get('/bank', [BankAccountController::class,'bankIndex'])->name('bank.account.index');
    Route::post('/bank/store', [BankAccountController::class,'bankStore'])->name('bank.account.store');
    Route::get('/bank/edit/{id}', [BankAccountController::class,'bankEdit'])->name('edit.bank.account');
    Route::put('/bank/update/{id}', [BankAccountController::class,'bankUpdate'])->name('bank.account.update');
    Route::get('/bank/delete/{id}', [BankAccountController::class,'bankDelete'])->name('bank.acount.delete');

    Route::get('/bank/transaction', [BankTransactionController::class,'transactionIndex'])->name('transaction.index');
    Route::post('/bank/balance/store', [BankTransactionController::class,'storeBalance'])->name('save.bank.balance');
    Route::get('/transaction', [BankTransactionController::class,'indexTransaction'])->name('expanse.transaction.index');
    Route::get('/add/transaction', [BankTransactionController::class,'createTransaction'])->name('add.expense');
    Route::post('/expense/transaction', [BankTransactionController::class,'storeTransaction'])->name('store.expense.transaction');
    Route::get('/expense/history', [BankTransactionController::class,'expenseHistory'])->name('expense.history');
    Route::get('/transaction/{id}', [BankTransactionController::class,'transactionReport'])->name('report.bank.wise.transaction');

    Route::get('add/personal/loan', [PersonalManagementController::class,'personalIndex'])->name('personal.loan.index');
    Route::post('/personal/store', [PersonalManagementController::class,'personalLoanStore'])->name('personal.loan.store');
    Route::get('/personal/loan', [PersonalManagementController::class,'personalLoanManage'])->name('manage.loan');
    Route::get('/personal/loan/{id}', [PersonalManagementController::class,'personalEdit'])->name('personal.loan.edit');
    Route::put('/personal/update/{id}', [PersonalManagementController::class,'personalUpdate'])->name('update.personal.loan');

    Route::get('add/office/loan', [OfficeLoanController::class,'officeLoanAdd'])->name('add.office.loan');
    Route::post('office/loan/store', [OfficeLoanController::class,'officeLoanStore'])->name('office.loan.store');
    Route::get('office/loan/', [OfficeLoanController::class,'officeLoanIndex'])->name('office.loan.manange');
    Route::get('office/loan/{id}', [OfficeLoanController::class,'officeLoanEdit'])->name('office.loan.edit');
    Route::put('office/loan/update/{id}', [OfficeLoanController::class,'officeLoanUpdate'])->name('update.office.loan');

    Route::get('add/purchase',[PurchaseController::class,'addPurchase'])->name('add.purchase');
    Route::post('purchase/store', [PurchaseController::class,'storePurchase'])->name('purchase.store');
    Route::get('purchase', [PurchaseController::class,'indexPurchase'])->name('purchase.reports');
    Route::get('purchase/edit/{id}', [PurchaseController::class,'editPurchase'])->name('purchase.edit');
    Route::put('purchase/update/{id}', [PurchaseController::class,'updatePurchase'])->name('update.purchase');

    //Supplier Chain
    Route::get('/supplier', [SupplyManagmentController::class,'indexSupplier'])->name('supplier.index');
    Route::post('/supplier/store', [SupplyManagmentController::class,'supplierStore'])->name('store.supplier');
    Route::get('/supplier/delete/{id}', [SupplyManagmentController::class,'supplierDelete'])->name('supplier.delete');
    Route::get('/supplier/edit/{id}', [SupplyManagmentController::class,'supplierEdit'])->name('supplier.edit');
    Route::get('/supplier/item', [SupplyManagmentController::class,'supplierEditItemDelete'])->name('supply.item.delete');
    Route::put('/supplier/update/{id}', [SupplyManagmentController::class,'supplierUpdate'])->name('supplier.update');
    Route::get('/supply/management', [SupplyManagmentController::class,'suplyManIndex'])->name('supply.management');
    Route::post('/item/pass', [SupplyManagmentController::class,'product_pass'])->name('item.pass');
    Route::post('/supply/store', [SupplyManagmentController::class,'supplyStore'])->name('store.supply.manage');
    Route::get('/supply/reports', [SupplyManagmentController::class,'supplyReports'])->name('supply.reports');
    Route::get('/supply/supplier/{id}', [SupplyManagmentController::class,'supplyReportsWithSupplier'])->name('supply.report.supplier');
    Route::get('/supply/{date}/{id}', [SupplyManagmentController::class,'supplyReportsWithDate'])->name('supply.report.date');

    Route::post('/customer/info',[CutomerController::class,'customerInfo'])->name('customer.info');
    Route::get('/customer/management', [CutomerController::class,'cuctomerIndex'])->name('customer.index');
    Route::post('/customer/store', [CutomerController::class,'cuctomerStore'])->name('customer.detail.store');
    Route::get('/customer/edit/{id}',[CutomerController::class,'cuctomerEdit'])->name('customer.detail.edit');
    Route::put('/customer/update/{id}', [CutomerController::class,'cuctomerUpdate'])->name('customer.update');
    Route::get('/customer/delete/{id}', [CutomerController::class,'cuctomerDelete'])->name('customer.delete');
    Route::get('/customer/search',[CutomerController::class,'action'])->name('customer.search');

    Route::get('/customer/balance',[CustomerBalanceController::class,'customerBalanceIndex'])->name('balance.index');
    Route::post('/customer/balance/store',[CustomerBalanceController::class,'customerBalanceStore'])->name('customer.balance.store');

    Route::get('/category',[CategoryController::class,'indexCaregory'])->name('product.catagory.index');
    Route::post('/category/store',[CategoryController::class,'storeCaregory'])->name('category.store');
    Route::put('/category/update/{id}',[CategoryController::class,'updateCaregory'])->name('category.update');
    Route::get('/category/delete/{id}',[CategoryController::class,'deleteCaregory'])->name('category.delete');


    Route::post('/store/warehouse',[ProductController::class,'storeWarehouse'])->name('warehouse.store');
    Route::get('/delete/warehouse/{id}',[ProductController::class,'deleteWarehouse'])->name('warehouse.delete');
    Route::put('/update/warehouse/{id}',[ProductController::class,'updateWarehouse'])->name('warehouse.update');

    Route::post('/stock/product/store',[ProductController::class,'stockStoreProduct'])->name('product.stock.store');
    Route::get('/stock/product/detail/{id}',[ProductController::class,'stockProductDetail'])->name('product.detail.warehouse');

    Route::get('/products',[ProductController::class,'productIndex'])->name('product.index');
    Route::post('/product/store',[ProductController::class,'productStore'])->name('product.store');
    Route::get('/product/sale/{id}',[ProductController::class,'productSale'])->name('product.sale');
    Route::get('/product/edit/{id}',[ProductController::class,'productEdit'])->name('product.edit');
    Route::put('/product/update/{id}',[ProductController::class,'productUpdate'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductController::class,'productDelete'])->name('product.delete');
    Route::get('/product/stock',[ProductController::class,'productStock'])->name('product.stock');
    Route::get('/product/packsize',[ProductController::class,'packsize'])->name('packsize');
    Route::get('/product/search',[ProductController::class,'action'])->name('product.search');

    //General Management

    Route::get('/general',[GeneralController::class,'index'])->name('general.index');
    Route::put('/general-update/{id}',[GeneralController::class,'update'])->name('general.update');

    //CateringManagement

    Route::get('/catering/system', [CateringController::class,'cateringIndex'])->name('catering.index');
    Route::get('/catering/view/{id}', [CateringController::class,'cateringEdit'])->name('catering.edit');
    Route::get('/catering/add', [CateringController::class,'cateringCreate'])->name('add.food.comapny');
    Route::put('/catering/update/{id}', [CateringController::class,'cateringUpdate'])->name('catering.update');
    Route::get('/catering/report/{date}', [CateringController::class,'cateringReport'])->name('show.detail.catring');

    Route::post('/send/invoice', [CateringController::class,'sendinvoice'])->name('send.food,company');
    Route::get('/print/invoice/{id}', [CateringController::class,'printInvoice'])->name('print.invoice');

    Route::get('account/catering', [CateringController::class,'officeAcountIndex'])->name('catering.accounts.index');
    Route::get('account/paid/{id}', [CateringController::class,'officeAcountIndexPaid'])->name('catering.paid');

    //Office Detail

    Route::get('office', [OfficeDetailController::class,'indexOffice'])->name('office.index');
    Route::post('office/store', [OfficeDetailController::class,'storeOffice'])->name('office.store');
    Route::get('office/edit/{id}', [OfficeDetailController::class,'editOffice'])->name('office.update');
    Route::put('office/update/{id}', [OfficeDetailController::class,'updateOffice'])->name('office.upadate');
    Route::get('office/delete/{id}', [OfficeDetailController::class,'destroyOffice'])->name('office.delete');

    //FoodMeal

    Route::get('delete/shift/{id}', [FoodMillController::class,'deleteShift'])->name('delete.shift');

    Route::get('food/mill', [FoodMillController::class,'indexMill'])->name('food.mill.index');
    Route::post('shift/store', [FoodMillController::class,'storeShift'])->name('shift.store');
    Route::post('meal/store', [FoodMillController::class,'storeMeal'])->name('meal.package.store');
    Route::get('package/edit/{id}', [FoodMillController::class,'editMeal'])->name('meal.package.update');
    Route::put('package/update/{id}', [FoodMillController::class,'updateMeal'])->name('package.meal.upadate');
    Route::get('package/delete/{id}', [FoodMillController::class,'destroyMeal'])->name('meal.package.delete');
    Route::get('item/delete', [FoodMillController::class,'deleteItemMeal'])->name('item.delete');

    //User Type
    Route::resource('user-type', UserTypeController::class);

    //requisition
    Route::get('requisition/confirm/{id}',[RequisitionController::class,'confirm'])->name('requisition.confirm');
    Route::get('requisition/status',[RequisitionController::class,'status'])->name('requisition.status');
    Route::get('requisition/view-print/{id}',[RequisitionController::class,'requisitionPrint'])->name('requisition.view.print');
    Route::post('requisition/delivery-confirm/data',[RequisitionController::class,'deliveryConfirm'])->name('requisition.delivery.confirm');
    Route::post('requisition/resolve-delivery-confirm/data',[RequisitionController::class,'resolveDeliveryConfirm'])->name('requisition.resolve.delivery.confirm');
    Route::post('requisition/delivery-return',[RequisitionController::class,'return'])->name('requisition.delivery.return');
    Route::post('requisition/confirm/Imperfection',[RequisitionController::class,'confirmImperfection'])->name('requisition.confirm.Imperfection');
    Route::post('requisition/cancel/Imperfection',[RequisitionController::class,'cancelImperfection'])->name('requisition.Cancel.Imperfection');
    Route::resource('requisition', RequisitionController::class);
    Route::resource('requisition-product', RequisitionProductController::class);
    Route::get('requisition-receive',[RequisitionReceiveController::class,'index'])->name('requisition.receive.index');
    Route::get('requisition-receive/confirm-delivery/{id}',[RequisitionReceiveController::class,'confirmReceiveDelivery'])->name('requisition.receive.confirm');
    Route::post('requisition-receive/update-products',[RequisitionReceiveController::class,'updateSubmitted'])->name('requisition.receive.updatesubmitted');
    Route::post('requisition-receive/resolve',[RequisitionReceiveController::class,'resolve'])->name('requisition.receive.resolved');
    Route::get('requisition/receive/status',[RequisitionReceiveController::class,'status'])->name('requisition.receive.status');

    //Menu

    Route::resource('party', PartyController::class);
    Route::resource('party-product', PratyProductController::class);
    Route::post('party/product/delete/{id}',[PratyProductController::class,'party_product_delete'])->name('party.product.delete');
    Route::post('party/products/info',[PartyController::class,'party_products'])->name('party.products.info');
    Route::resource('party-management', PartyController::class);
    Route::resource('pack', PackControler::class);
    Route::resource('area', AreaController::class);
    Route::resource('coldstorage', ColdstorageController::class);
    

    //Order
    Route::post('order/product',[ProductOrderController::class,'warehouse_product_pass'])->name('warehouse.product.pass');
    Route::post('order/product/product_price',[ProductOrderController::class,'product_price'])->name('warehouse.product.price');
    Route::resource('order', ProductOrderController::class); 
    Route::get('/select2-autocomplete-ajax', [ProductOrderController::class,'dataAjax'])->name('select2.autocomplete.ajax');

    Route::get('/order/search',[OrderController::class,'action'])->name('order.search');

    Route::post('order/discount',[OrderController::class,'orderDiscount'])->name('order.discount');
    Route::post('order/payment-info',[OrderController::class,'orderPayment'])->name('order.payment');
    Route::post('order/delivery-confirm',[OrderController::class,'orderDelivery'])->name('order.delivery.confirm');
    Route::post('order/delivery-success',[OrderController::class,'orderDeliverySuccess'])->name('order.delivery.success');
    Route::post('order/delivery-return',[OrderController::class,'orderDeliveryReturn'])->name('order.delivery.return');
    Route::post('order/delivery-cancel',[OrderController::class,'orderDeliveryCancel'])->name('order.delivery.cancel');
    Route::post('order/singleProduct-return',[OrderController::class,'ordersingleProductReturn'])->name('order.singleProduct.Return');

    Route::get('order/edit/{id}',[OrderController::class,'orderEdit'])->name('order.updated.edit');
    Route::get('order/print/{id}',[OrderController::class,'print'])->name('order.print');
    Route::put('order/product/edit/{id}',[ProductOrderController::class,'OrderProductUpdate'])->name('order.product.updated');
    Route::post('order/delete/{id}',[ProductOrderController::class,'order_delete'])->name('order.test.delete');
    Route::post('order/singleProductOrderStore',[ProductOrderController::class,'singleProductOrderStore'])->name('single.Product.Order.Store');
    Route::put('order/update/{id}',[OrderController::class,'OrderUpdate'])->name('order.updated');
    Route::resource('order-history', OrderController::class);

    

    Route::get('order/confirm/{id}',[OrderController::class,'confirm'])->name('order.confirm');
    Route::post('order/product/pass',[OrderController::class,'product_pass'])->name('order.product.pass');
    Route::post('order/addproduct/pass',[OrderController::class,'addproduct_pass'])->name('order.addproduct.pass');
    //Production
    // Medical Report
    Route::get('medical-report-list',[MedicalReportController::class,'MedicalReport'])->name('medical.report.list');
    Route::resource('medical_report', MedicalReportController::class);

    //tempmonitoring

    Route::get('temp-monitoring-list',[TempMonitoringController::class,'TempMonitoringList'])->name('temp.monitoring.list');
    Route::resource('temp_monitoring', TempMonitoringController::class);

    //Production Test 
    Route::resource('production_test', ProductionTestController::class);
    //Supply Management

    //item
    Route::resource('supply-item', SupplyItemController::class);
    //supplier
    Route::get('activate/{id}',[ProductionSupplierController::class,'activate'])->name('production-supplier.activate');
    Route::get('deactivate/{id}',[ProductionSupplierController::class,'deactivate'])->name('production-supplier.deactivate');
    Route::get('all-supplier',[ProductionSupplierController::class,'AllSupplier'])->name('production-supplier.all');
    Route::get('all-supplier',[ProductionSupplierController::class,'AllSupplier'])->name('production-supplier.all');
    Route::get('get-supplier/{id}',[ProductionSupplierController::class,'getSupplier'])->name('production-supplier.getSupplier');
    Route::get('get-supplier-items/{id}',[ProductionSupplierController::class,'getSupplierItems'])->name('production-supplier.getSupplierItems');
    Route::get('get-supplier-items-grade/{id}',[ProductionSupplierController::class,'getSupplierItemsGrade'])->name('production-supplier.getSupplierItems.grade');
    Route::resource('production-supplier', ProductionSupplierController::class);

    //Fish Grade

    Route::resource('fish-grade', FishGradeController::class);

    //production requistion
    Route::get('requisition/print/{id}',[ProductionRequisitionController::class,'requisitionPrint'])->name('requisition.print');
    Route::resource('production-requisition', ProductionRequisitionController::class);
    Route::post('production-requisition-status',[ProductionRequisitionController::class,'changeStatus'])->name('production_requisition.status');
    //Temp Thermocouple

    Route::resource('temp-thermocouple', TempTherController::class);
    Route::get('production-Supplier-item',[ProductionSupplierItemController::class,'destroy'])->name('production-Supplier-item.destroy');

    //Microbiological Test Report
    Route::get('report-details/{id}',[MicrobiologicalTestController::class,'report_details'])->name('microbiological.test.report.details');
    Route::get('report-genarate',[MicrobiologicalTestController::class,'report_genarate'])->name('microbiological.test.report.genarate');
    Route::resource('microbiological-test',MicrobiologicalTestController::class);

    //Tiffin Bill
    Route::resource('tiffin-bill', TiffinBillController::class);

    
    //Procution Purchase Types
    Route::resource('procution-purchase-types', ProductionPurchaseTypeController::class);

    //Procution Purchase Units
    Route::resource('procution-purchase-units', ProductionPurchaseUnitController::class);

    //Procution Purchase Item
    Route::resource('production-purchase-item', ProductionPurchaseItemController::class);

    //Production Purchase Requisition 
    Route::post('production/purchase/quotation/data-pass',[ProductionPurchaseRequisitionController::class,'add_quotation_data_pass'])->name('production.purchase.quotation.data_pass');
    Route::get('production/purchase/quotation',[ProductionPurchaseRequisitionController::class,'quotation'])->name('production-purchase-quotation');
    Route::get('production-purchase-requisition/Print/{id}',[ProductionPurchaseRequisitionController::class,'print'])->name('production-purchase-requisition.print');
    Route::get('production-purchase-requisition/Order',[ProductionPurchaseRequisitionController::class,'order'])->name('production-purchase-requisition.order');
    Route::post('production-purchase-requisition/status/purchased',[ProductionPurchaseRequisitionController::class,'status_purchased'])->name('production-purchase-requisition.status_purchased');
    Route::post('production-purchase-requisition/status/confirm/{id}',[ProductionPurchaseRequisitionController::class,'status_confirm'])->name('production-purchase-requisition.status_confirm');
    Route::post('production-purchase-requisition/status/quotation/{id}',[ProductionPurchaseRequisitionController::class,'status_quotation'])->name('production-purchase-requisition.status_quotation');
    Route::resource('production-purchase-requisition', ProductionPurchaseRequisitionController::class);

    //Production Purchase Requisition Item
    Route::resource('purchase-requisition-item', ProductionPurchaseRequisitionItemController::class);

    //Production Requisition Item
    Route::resource('production-requisition-item', ProductionRequisitionItemController::class);
    // Production Unload
    Route::post('production/unload/gate_man/raw_item/check',[ProductionUnloadController::class,'check_raw_item'])->name('production.unload.gateman.raw_item.check');
    Route::get('production/unload/gate_man/raw_item',[ProductionUnloadController::class,'gateman_raw_item'])->name('production.unload.gateman.raw_item');
    Route::get('production/unload/gate_man/general_item',[ProductionUnloadController::class,'gateman_general_item'])->name('production.unload.gateman.general_item');
    Route::get('production-unload',[ProductionUnloadController::class,'index'])->name('production-unload-index');
    Route::post('production-unload-show',[ProductionUnloadController::class,'unloadShow'])->name('production-unload-show');
    Route::post('production-unload-store',[ProductionUnloadController::class,'store'])->name('production-unload-store');

    //Production User Performance

    Route::resource('user-performance', ProductionUserPerformanceController::class);

    //Metal Detector

    Route::resource('metal-detector', MetalDetectorCheckController::class);

    //Ro Plant 
    Route::resource('ro-plant',RoPlantController::class);

    //Employee Attendance

    Route::resource('employee-attendance',EmployeeAttendanceController::class);

    Route::post('production-requisition-item/{id}',[ProductionRequisitionController::class,'getRequisitionItems'])->name('production.requisition.item');

    //Processing Unit

    Route::resource('production-processing-grade',ProductionProcessingGrade::class);
    //All IGF
    Route::get('production/processing-unit/iqf', [ProductionIqfController::class,'index'])->name('production.processing.iqf');
    Route::get('production/processing-unit/raw_iqf_shrimp', [ProductionIqfController::class,'raw_iqf_shrimp_index'])->name('production.processing.raw_iqf_shrimp');
    Route::get('production/processing-unit/cooked_iqf_shrimp', [ProductionIqfController::class,'cooked_iqf_shrimp_index'])->name('production.processing.cooked_iqf_shrimp');
    Route::get('production/processing-unit/blanched_iqf_shrimp', [ProductionIqfController::class,'blanched_iqf_shrimp_index'])->name('production.processing.blanched_iqf_shrimp');
    Route::post('production/processing-unit/iqf/data_pass',[ProductionIqfController::class,'data_pass'])->name('production.processing-unit.iqf.data_pass');
    Route::post('production/processing-unit/processing',[ProductionIqfController::class,'processing'])->name('production.processing-unit.processing');
    Route::post('production/processing-unit/processing_to_clean',[ProductionIqfController::class,'processing_to_clean'])->name('production.processing-unit.processing_to_clean');
    Route::post('production/processing-unit/cleaning_to_grading',[ProductionIqfController::class,'cleaning_to_grading'])->name('production.processing-unit.cleaning_to_grading');
    Route::post('production/processing-unit/grading',[ProductionIqfController::class,'grading'])->name('production.processing-unit.grading');
    Route::post('production/processing-unit/grading_to_glazing',[ProductionIqfController::class,'grading_to_glazing'])->name('production.processing-unit.grading_to_glazing');
    Route::post('production/processing-unit/soaking',[ProductionIqfController::class,'soaking'])->name('production.processing-unit.soaking');
    Route::post('production/processing-unit/glazing',[ProductionIqfController::class,'glazing'])->name('production.processing-unit.glazing');
    Route::post('production/processing-unit/randw',[ProductionIqfController::class,'randw'])->name('production.processing-unit.randw');
    Route::post('production/processing-unit/soaking/data_pass',[ProductionIqfController::class,'soaking_data_pass'])->name('production.processing-unit.soaking.data_pass');
    Route::post('production/processing-unit/glazing/data_pass',[ProductionIqfController::class,'glazing_data_pass'])->name('production.processing-unit.glazing.data_pass');
    Route::post('production/processing-unit/randw/data_pass',[ProductionIqfController::class,'randw_data_pass'])->name('production.processing-unit.randw.data_pass');

    //All Block
    Route::get('production/processing-unit/block_frozen', [ProductionBlockController::class,'block_frozen'])->name('production.processing.block_frozen');
    Route::get('production/processing-unit/raw_bf_shrimp', [ProductionBlockController::class,'raw_bf_shrimp'])->name('production.processing.raw_bf_shrimp');
    Route::get('production/processing-unit/semi_iqf', [ProductionBlockController::class,'semi_iqf'])->name('production.processing.semi_iqf');
    Route::post('production/processing-unit/block/block_data_pass',[ProductionBlockController::class,'block_data_pass'])->name('production.processing-unit.bf.block_data_pass');
    Route::post('production/processing-unit/processing_to_blocking',[ProductionBlockController::class,'processing_to_blocking'])->name('production.processing-unit.processing_to_blocking');
    Route::post('production/processing-unit/blocking_to_blockcounter',[ProductionBlockController::class,'blocking_to_blockcounter'])->name('production.processing-unit.blocking_to_blockcounter');
    Route::post('production/processing-unit/blocking/data_pass',[ProductionBlockController::class,'blocking_data_pass'])->name('production.processing-unit.blocking.data_pass');
    Route::post('production/processing-unit/blocking/block_counter',[ProductionBlockController::class, 'block_counter'])->name('production.processing-unit.blocking.block_counter');
    Route::post('production/processing-unit/blocking/ex_volume_to_return',[ProductionBlockController::class, 'ex_volume_to_return'])->name('production.processing-unit.blocking.ex_volume_to_return');
    Route::post('production/processing-unit/block_randw',[ProductionBlockController::class,'block_randw'])->name('production.processing-unit.block_randw');
    Route::post('production/processing-unit/block_counter_to_soaking',[ProductionBlockController::class,'block_counter_to_soaking'])->name('production.processing-unit.block_counter_to_soaking');
    Route::post('production/processing-unit/soaking_to_excess_volume',[ProductionBlockController::class,'soaking_to_excess_volume'])->name('production.processing-unit.soaking_to_excess_volume');  

    //Production Supply
    Route::post('supply/items/info',[ProductionSupplyListController::class,'supply_items'])->name('supply.items.info');
    Route::get('production-supply-show/{id}',[ProductionSupplyListController::class,'addSupplyPage'])->name('supply.list.show');
    Route::resource('production-supply',ProductionSupplyListController::class);
    Route::resource('supply-list-item',ProductionSupplyListItemController::class);

    //Production Chill Room 
    Route::get('/production/chill-room',[ChillStorageController::class,'index'])->name('production.chill_room.index');
    Route::post('/production/chill-room/data_pass',[ChillStorageController::class,'data_pass'])->name('production.chill_room.data_pass');
    Route::post('/production/chill-room/process',[ChillStorageController::class,'process'])->name('production.chill_room.process');

    //Production Processing grading and Blocking
    Route::resource('processing-grade',ProcessingGradeController::class);
    Route::resource('processing-block',ProcessingBlockController::class);
    Route::resource('processing-block-size',ProcessingBlockSizeController::class);
    // //Quotation
    // Route::get('production/purchase/quotation', function () {
    //     return view('backend.production.general_purchase.quotation.index');
    // })->name('production-purchase-quotation');

    //Quotation Show
    // Route::get('production/purchase/quotation/show', function () {
    //     return view('backend.production.general_purchase.quotation.show_quotation');
    // })->name('production.purchase.quotation.show');

    //Cs List
    // Route::get('production/purchase/cs/list', function () {
    //     return view('backend.production.general_purchase.cs/cs_list');
    // })->name('production.purchase.cs.list');

    //Cs List
    Route::get('production/purchase/cs/show', function () {
        return view('backend.production.general_purchase.cs/cs_list_show');
    })->name('production.purchase.cs.show');



    //Route::resource('production-quotation-confirm',ProductionRequisitionItemController::class);
    Route::get('production-cs-show/{id}',[ProductionGeneralPurchaseQuotationController::class,'showcs'])->name('production-cs-show');
    Route::post('production-quotation-confirm',[ProductionGeneralPurchaseQuotationController::class,'confirmqQuotation'])->name('production-quotation-confirm');
    Route::get('production-quotation-list/{id}',[ProductionGeneralPurchaseQuotationController::class,'quotation_test'])->name('production-quotation-list');
    Route::resource('production-quotation-all-list',ProductionGeneralPurchaseQuotationController::class);
    Route::get('production-quotation-confirmquotation',[ProductionGeneralPurchaseQuotationController::class,'confirmquotation'])->name('production-quotation-confirmquotation');
    Route::post('production-purchase-quotation/status/add/quotation',[ProductionGeneralPurchaseQuotationController::class,'status_addquotation'])->name('production-general_purchase.status_addquotation');
    Route::post('production-purchase-quotation/status/show/quotation',[ProductionGeneralPurchaseQuotationController::class,'status_showquotation'])->name('production-general_purchase.status_showquotation');
    //Route::get('production-purchase-quotation/status/comfirm/quotation',[ProductionGeneralPurchaseQuotationController::class,'status_confirmquotation'])->name('production-general_purchase.status_confirmquotation');
    
});

@extends('backend.master')
@section('site-title')
    Add Requisition
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
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
            <h3 class="page-title bold">Purchase Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Quotation List
                </div>
                    {{-- <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#add_procution_purchase_units">
                            Add New
                        <i class="fa fa-plus"></i> </a>
                    </div> --}}
                    <div class="tools">
                    </div>
                </div>
            </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Department</th>
                                <th>Requested By</th>
                                <th>Remark</th>
                                <th>Items</th>
                                {{-- <th style="text-align: center">Action</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($requisition as $key=> $data)
                                <tr id="row1">
                                    <td>{{++ $key }}</td>
                                    <td class="text-align: center;"> {{$data->departments->name}}</td>
                                    <td class="text-align: center;"> {{$data->users->name}}</td>
                                    <td class="text-align: center;"> {{$data->remark}}</td>
                                    <td class="text-align: center;">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Sl.
                                                    </th>
                                                    <th>
                                                        Item Details
                                                    </th>
                                                    <th>
                                                        Demand Date
                                                    </th>
                                                    <th>
                                                        Quantity
                                                    </th>
                                                    <th>
                                                       Specification
                                                    </th>
                                                    <th>
                                                        Remark
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach ($data->items as $key2 => $item) 
                                                    <tr>
                                                        <td>{{++$key2}}</td>
                                                        <td>{{$item->pivot->image}}</li><li>{{$item->pivot->item_name}}</li><li>{{$item->pivot->item_type_name}}</li><li>{{$item->pivot->item_unit_name}}</td>
                                                        <td>{{$item->pivot->demand_date}}</td>
                                                        <td>{{$item->pivot->quantity}}</td>
                                                        <td>{{$item->pivot->specification}}</td>
                                                        <td>{{$item->pivot->remark}}</td>
                                                        <td>
                                                            <button data-toggle="modal" href="#add_supply{{--$item->pivot->id--}}" class="btn btn-success">+ Add Quotation</button>
                                                        </td>
                                                    </tr>
                                                    
                                                    <div id="delete_items{{--$item->pivot->id--}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                {{-- <form action="{{route('purchase-requisition-item.update',$item->pivot->id)}}" method="POST"> --}}
                                                                    {{csrf_field()}}
                                                                    {{-- {{method_field('put')}} --}}
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <b><h3>Are You Sure?</h3></b>
                                                                    </div>
                                                                    <br>
                                                                    <div class="modal-body">
                                                                            @csrf
                                                                            <form action="{{--route('purchase-requisition-item.destroy',[$item->pivot->id])--}}" method="POST">
                                                                                @method('DELETE')
                                                                                @csrf
                                                                                <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                                            </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                            
                                        </table>
                                        <div id="add_supply" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                        <h2 class="modal-title">Add Supplier for Requisition</h2>
                                                    </div>
                                                    <form class="form-horizontal" action="{{route('production-quotation-all-list.store')}}" method="POST">
                                                        {{csrf_field()}}
                                                        {{method_field('post')}}
                                                        <div class="row" style="margin: 3%" >
                                                            <p ><b>Item name:</b> {{$item->pivot->item_name}}</p>
                                                            <p ><b>Department:</b> {{$data->departments->name}}</p>
                                                            <p ><b>Request By:</b> {{$data->users->name}}</p>
                                                            <p ><b>Demand Date:</b> {{$item->pivot->demand_date}}</p>
                                                        </div>
                                                        <input type="hidden" value="" id="provided_item" name="provided_item">
                                                        <div class="form-group">
                                                            <div class="col-md-3">
                                                                <label class="col-md-3 control-label"> Supplier</label>
                                                                <select class="form-control" style="margin-left: 5%" name="supplier_id" id="supplier_id">
                                                                    <option value="">Select Supplier</option>
                                                                    @foreach ($supplier as $item)
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach 
                                                                </select>
                                                                <div >
                                                                    <button class="btn btn-info" style="margin-left: 7%">+ Add Supplier</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="col-md-3 control-label">Price</label>
                                                                <input type="text" class="form-control" placeholder="Price" id="price" name="price">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="col-md-3 control-label">Speciality</label>
                                                                    <input type="text" class="form-control" placeholder="Speciality" id="speciality" name="speciality">
                                                            </div>
                                                            <div class="col-md-1">
                                                                <label></label>
                                                                <button type="button" class="btn btn-success ItemAdd" id="ItemAdd" style="margin-top: =10%">+  Add</button>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Supllier Info</label>
                                                            <div class="col-md-9">
                                                                <table  class="table table-striped table-bordered table-hover itemsTable" id="itemsTable">
                                                                    <tr>
                                                                        <th>Supplier Name</th>
                                                                        <th>Price</th>
                                                                        <th>Speciality</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    <tr>
                            
                                                                    </tr>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                            <div class="col-md-9">
                                                                <textarea type="text" class="form-control"  name="remark"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td style="text-align: center">
                                        <a class="btn btn-success"  data-toggle="modal" href="{{route('production-purchase-requisition.status_confirm',$data->id)}}"><i class="fa fa-edit"></i> Confirm</a> 
                                        <a class="btn btn-success"  data-toggle="modal" href="#confirm{{$data->id}}"><i class="fa fa-edit"></i> Confirm</a>
                                        <a class="btn btn-info"  data-toggle="modal" href="#edit_procution_purchase_units{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn red" data-toggle="modal" href="#delete_procution_purchase_units{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                    </td> --}}
                                </tr> 
                                <div id="confirm{{--$data->id--}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Are You want to print it?</h4>
                                            </div>
                                            <br>
                                            <form class="form-horizontal" role="form" method="post" action="{{route('procution-purchase-units.store')}}">
                                                {{csrf_field()}}
                                                <div class="modal-footer"><br>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <button type="button"  class="btn red">Print</button>
                                                    <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                    <div id="delete_procution_purchase_units{{--$data->id--}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer " >
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                    </div>
                                                    <div class="caption pull-right">
                                                        <form action="{{--route('production-purchase-requisition.destroy',[$data->id])--}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edit_procution_purchase_units{{--$data->id--}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update Procution Purchase Units</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{--route('production-purchase-requisition.update', $data->id)--}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Departments</label>
                                                            <div class="col-md-8">
                                                                {{-- <input type="text" class="form-control" value="{{$data->name}}" required name="name"> --}}
                                                                <select class="form-control" name="department" id="">
                                                                    {{-- @foreach ($dept as $item)
                                                                    @if ($data->department == $item->id)
                                                                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                                    @else    
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endif
                                                                    @endforeach --}}
                                                                </select>
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Remarks</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="{{--$data->remark--}}" required name="remark">
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{-- {{ $requisition->links('vendor.pagination.custom') }} --}}
                        </div>
                    </div>
                </div>
                <div id="add_procution_purchase_units" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Procution Purchase Units</h4>
                            </div>
                            <br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('procution-purchase-units.store')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="procution_purchase_Units Name">
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
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function() {
            var max=0;
            var item_id,item_name,item_type_id,item_type_name,item_unit_id,item_unit_name,demand_date,image,quantity,specification,remark = null;
            function nullmaking(){

                $("#item").val(null);
                $("#type").val(null);
                $("#demand_date").val(null);
                $("#image").val(null);
                $("#quantity").val(null);
                $("#unit").val(null);
                $("#specification").val(null);
                $("#remark").val(null);
            }
            $(".cancel").click(function(){
                location.reload(true);
            });
            $("#item").change(function(){
                item_id = $(this).find('option:selected').val();
                item_name = $(this).find('option:selected').text();
                item_unit_id = $("#unit").find('option:selected').val();
                item_unit_name = $("#unit").find('option:selected').text();
                // console.log(item_id);
            });
            var product_array = [];
            $(".type").change(function() {
             
                max = $(this).val();
                item_type_id = $(this).find('option:selected').val();
                item_type_name = $(this).find('option:selected').text();
                // console.log($(this).val());
                $.ajax({
                    type:"get",
                    url:"/admin/production-purchase-requisition/"+$(this).val(),
                    success:function(data){
                        console.log(data);
                        $(".item").html("");
                        $(".unit").html("");
                        let option="<option value=''>--Select--</option>";
                        $.each( data, function( key, data ) {
                            option+='<option data-name="'+data.name+'" value="'+data.id+'">'+data.name+'</option>';
                        });
                        let optionunit="<option value=''>--Select--</option>";
                        $.each( data, function( key, data ) {
                            optionunit='<option data-name="'+data.name+'" value="'+data.production_purchase_unit_id+'" selected>'+data.productionpurchaseunit.name+'</option>';
                        });
                        $('.item').append(option);
                        $(".unit").append(optionunit);
                    }
                });
                // $.ajax({
                //     type:"get",
                //     url:"/admin/get-supplier-items/"+$(this).val(),
                //     success:function(data){
                //         console.log(data);
                //         $("#item").html("");
                //         let option="<option value=''>Select</option>";
                //         $.each( data, function( key, data ) {
                //             option+='<option data-name="'+data.name+'" data-unit_price="'+data.pivot.rate+'" data-grade_id="'+data.grade_id+'" value="'+data.id+'">'+data.name+'</option>';
                //         });
                //         $('#item').append(option);
                //     }
                // });
            });
            $("#addbtn").click(function() {
                product_array.push({"item_id":item_id,"item_name":item_name,"item_type_id":item_type_id,"item_type_name":item_type_name,"item_unit_id":item_unit_id,"item_unit_name":item_unit_name,"image":"abc.jpg","demand_date":$('#demand_date').val(),"quantity":$('#quantity').val(),"specification":$('#specification').val(),"remark":$('#remark').val(),"status":"stay"})
                $("#products").val('');
                $("#products").val(JSON.stringify(product_array));
                $.each( product_array, function( key, product ) {
                    if (product.status == "stay") {
                        if(product_array.length-1 == key){
                            $("table#mytable tr").last().after("<tr id='"+key+"'><td><ul><li>"+product.image+"</li><li>Item-name :"+product.item_name+"</li><li>Item type : "+product.item_type_name+"</li><li>Item Unit : "+product.item_unit_name+"</li></ul></td><td>"+product.demand_date+"</td><td>"+product.specification+"</td><td>"+product.quantity+"</td><td>"+product.remark+"</td><td><button class='btn btn-danger delete' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $(".delete").click(function(){
                    product_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#products").val('');
                    $("#products").val(JSON.stringify(product_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
        //    var time,c_temp,f_m_r = null;
        var items_array = [];
        function nullmaking(){
                $("#supplier_id").val(null);
                $("#price").val(null);
                $("#speciality").val(null);
            }
        $("#ItemAdd").click(function(){
            console.log($("#supplier_id").val());
                items_array.push({"supplier_id":$("#supplier_id").val(),"price":$("#price").val(),"speciality":$("#speciality").val(),"status":"stay"});
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $.each( items_array, function( key, item ) {
                    // console.log(item);
                    if (item.status == "stay") {
                        if(items_array.length-1 == key){
                            $("table#itemsTable tr").last().before("<tr id='"+key+"'><td>"+item.supplier_id+"</td><td>"+item.price+"</td><td>"+item.f_m_r+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $(".delete_item").click(function(){
                    items_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#provided_item").val('');
                    $("#provided_item").val(JSON.stringify(items_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
        });
            
        });
    </script>
     {{-- <script type="text/javascript">
        $(document).ready(function () {
        //    var supplier,price,speciality = null;
        var items_array = [];
        function nullmaking(){
                $("#supplier").val(null);
                $("#price").val(null);
                $("#speciality").val(null);
            }
        $(".ItemAdd").click(function(){
            console.log($("#supplier").val());
                //console.log('Good');
                items_array.push({"supplier":$("#supplier").val(),"price":$("#price").val(),"speciality":$("#speciality").val(),"status":"stay"});
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $.each( items_array, function( key, item ) {
                     //console.log(item);
                    if (item.status == "stay") {
                        if(items_array.length-1 == key){
                            $("table.itemsTable tr").last().after("<tr id='"+key+"'><td>"+item.supplier+"</td><td>"+item.price+"</td><td>"+item.speciality+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $(".delete_item").click(function(){
                    items_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#provided_item").val('');
                    $("#provided_item").val(JSON.stringify(items_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
        });
            
        });
    </script> --}}
@endsection


index----------------

@extends('backend.master')
@section('site-title')
    Add Requisition
@endsection
@section('style')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('main-content')
    <!-- BEGIN CONTENT -->
    <!-- BEGIN PAGE TITLE-->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
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
            <h3 class="page-title bold">Purchase Management
            </h3>
            <div class="portlet box blue-chambray">
                <div class="portlet-title">
                <div class="caption">
                <i class="fa fa-briefcase"></i>Quotation List
                </div>
                    {{-- <div class="caption pull-right">
                        <a class="btn green-meadow pull-right" data-toggle="modal" href="#add_procution_purchase_units">
                            Add New
                        <i class="fa fa-plus"></i> </a>
                    </div> --}}
                    <div class="tools">
                    </div>
                </div>
            </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Department</th>
                                <th>Requested By</th>
                                <th>Remark</th>
                                <th>Items</th>
                                {{-- <th style="text-align: center">Action</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($requisition as $key=> $data)
                                <tr id="row1">
                                    <td>{{++ $key }}</td>
                                    <td class="text-align: center;"> {{$data->departments->name}}</td>
                                    <td class="text-align: center;"> {{$data->users->name}}</td>
                                    <td class="text-align: center;"> {{$data->remark}}</td>
                                    <td class="text-align: center;">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Sl.
                                                    </th>
                                                    <th>
                                                        Item Details
                                                    </th>
                                                    <th>
                                                        Demand Date
                                                    </th>
                                                    <th>
                                                        Quantity
                                                    </th>
                                                    <th>
                                                       Specification
                                                    </th>
                                                    <th>
                                                        Remark
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach ($data->items as $key2 => $item) 
                                                    <tr>
                                                        <td>{{++$key2}}</td>
                                                        <td>{{$item->pivot->image}}</li><li>{{$item->pivot->item_name}}</li><li>{{$item->pivot->item_type_name}}</li><li>{{$item->pivot->item_unit_name}}</td>
                                                        <td>{{$item->pivot->demand_date}}</td>
                                                        <td>{{$item->pivot->quantity}}</td>
                                                        <td>{{$item->pivot->specification}}</td>
                                                        <td>{{$item->pivot->remark}}</td>
                                                        <td>
                                                            <button data-toggle="modal" href="#add_supply{{$data->id}}" class="btn btn-success add_quotation" data-requisition_id="{{$data->id}}">+ Add Quotation</button>
                                                        </td>
                                                        <div id="add_supply{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <h2 class="modal-title">Add Supplier for Requisition</h2>
                                                                    </div>
                                                                    <form class="form-horizontal" action="{{route('production-quotation-all-list.store')}}" method="POST">
                                                                        {{csrf_field()}}
                                                                        {{method_field('post')}}
                                                                        <div class="row" style="margin: 3%" >
                                                                            <p ><b>Item name:</b> {{$item->pivot->item_name}}</p>
                                                                            <p ><b>Department:</b> {{$data->departments->name}}</p>
                                                                            <p ><b>Request By:</b> {{$data->users->name}}</p>
                                                                            <p ><b>Demand Date:</b> {{$item->pivot->demand_date}}</p>
                                                                        </div>
                                                                        <input type="hidden" value="" id="provided_item" name="provided_item">
                                                                        <div class="form-group">
                                                                            <div class="col-md-3">
                                                                                <label class="col-md-3 control-label"> Supplier</label>
                                                                                <select class="form-control supplier_name" style="margin-left: 5%" name="supplier_id" id="supplier_id">
                                                                                    <option selected>Select Supplier</option>
                                                                                    @foreach ($supplier as $item)
                                                                                    {{-- @php
                                                                                        dd($item)
                                                                                    @endphp --}}
                                                                                        <option value="{{$item->id}}" data-supplier_name="{{$item->name}}">{{$item->name}}</option>
                                                                                    @endforeach 
                                                                                </select>
                                                                                <div >
                                                                                    <button class="btn btn-info" style="margin-left: 7%">+ Add Supplier</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label class="col-md-3 control-label">Price</label>
                                                                                <input type="text" class="form-control" placeholder="Price" id="price" name="price">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label class="col-md-3 control-label">Speciality</label>
                                                                                    <input type="text" class="form-control" placeholder="Speciality" id="speciality" name="speciality">
                                                                            </div>
                                                                            <div class="col-md-1">
                                                                                <label></label>
                                                                                <button type="button" class="btn btn-success ItemAdd" style="margin-top: =10%">+  Add</button>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <hr>
                                                                        <div class="form-group">
                                                                            <label for="inputEmail1" class="col-md-2 control-label">Supllier Info</label>
                                                                            <div class="col-md-9">
                                                                                <table  class="table table-striped table-bordered table-hover itemsTable">
                                                                                    <tr>
                                                                                        <th>Supplier Name</th>
                                                                                        <th>Price</th>
                                                                                        <th>Speciality</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                    <tr>
                                            
                                                                                    </tr>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputEmail1" class="col-md-2 control-label">Remark</label>
                                                                            <div class="col-md-9">
                                                                                <textarea type="text" class="form-control"  name="remark"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                                            <button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                    
                                                    <div id="delete_items{{--$item->pivot->id--}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                {{-- <form action="{{route('purchase-requisition-item.update',$item->pivot->id)}}" method="POST"> --}}
                                                                    {{csrf_field()}}
                                                                    {{-- {{method_field('put')}} --}}
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                        <b><h3>Are You Sure?</h3></b>
                                                                    </div>
                                                                    <br>
                                                                    <div class="modal-body">
                                                                        @csrf
                                                                        <form action="{{--route('purchase-requisition-item.destroy',[$item->pivot->id])--}}" method="POST">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                                        </form>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    {{-- <td style="text-align: center">
                                        <a class="btn btn-success"  data-toggle="modal" href="{{route('production-purchase-requisition.status_confirm',$data->id)}}"><i class="fa fa-edit"></i> Confirm</a> 
                                        <a class="btn btn-success"  data-toggle="modal" href="#confirm{{$data->id}}"><i class="fa fa-edit"></i> Confirm</a>
                                        <a class="btn btn-info"  data-toggle="modal" href="#edit_procution_purchase_units{{$data->id}}"><i class="fa fa-edit"></i> Edit</a>
                                        <a class="btn red" data-toggle="modal" href="#delete_procution_purchase_units{{$data->id}}"><i class="fa fa-trash"></i> Delete</a>
                                    </td> --}}
                                </tr> 
                                <div id="confirm{{--$data->id--}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title">Are You want to print it?</h4>
                                            </div>
                                            <br>
                                            <form class="form-horizontal" role="form" method="post" action="{{route('procution-purchase-units.store')}}">
                                                {{csrf_field()}}
                                                <div class="modal-footer"><br>
                                                    <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                    <button type="button"  class="btn red">Print</button>
                                                    <button type="submit" class="btn blue-ebonyclay"><i class="fa fa-floppy-o"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                    <div id="delete_procution_purchase_units{{--$data->id--}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        {{csrf_field()}}
                                        <input type="hidden" value="" id="delete_id">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h2 class="modal-title" style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer " >
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button"data-dismiss="modal"  class="btn default">Cancel</button>
                                                    </div>
                                                    <div class="caption pull-right">
                                                        <form action="{{--route('production-purchase-requisition.destroy',[$data->id])--}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn red" id="delete"><i class="fa fa-trash"></i>Delete</button>               
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="edit_procution_purchase_units{{--$data->id--}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Update Procution Purchase Units</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="form-horizontal" role="form" method="post" action="{{--route('production-purchase-requisition.update', $data->id)--}}">
                                                        {{csrf_field()}}
                                                        {{method_field('put')}}
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Departments</label>
                                                            <div class="col-md-8">
                                                                {{-- <input type="text" class="form-control" value="{{$data->name}}" required name="name"> --}}
                                                                <select class="form-control" name="department" id="">
                                                                    {{-- @foreach ($dept as $item)
                                                                    @if ($data->department == $item->id)
                                                                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                                                    @else    
                                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                                    @endif
                                                                    @endforeach --}}
                                                                </select>
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="inputEmail1" class="col-md-2 control-label">Remarks</label>
                                                            <div class="col-md-8">
                                                                <input type="text" class="form-control" value="{{--$data->remark--}}" required name="remark">
                                                            </div>
                                                            <br><br>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                                            <button type="submit" class="btn red-flamingo"><i class="fa fa-floppy-o"></i> Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @endforeach
                            </tbody>
                        </table>
                        
                        <div class="row">
                            {{-- <div class="col-md-12 text-center">{{ $employee->links() }}</div> --}}
                            {{-- {{ $requisition->links('vendor.pagination.custom') }} --}}
                        </div>
                    </div>
                </div>
                <div id="add_procution_purchase_units" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Add New Procution Purchase Units</h4>
                            </div>
                            <br>
                            <form class="form-horizontal" role="form" method="post" action="{{route('procution-purchase-units.store')}}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-md-2 control-label">Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="procution_purchase_Units Name">
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
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-chained/1.0.1/jquery.chained.min.js" integrity="sha512-rcWQG55udn0NOSHKgu3DO5jb34nLcwC+iL1Qq6sq04Sj7uW27vmYENyvWm8I9oqtLoAE01KzcUO6THujRpi/Kg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        $(document).ready(function () {
           var supplier_id,name,price,speciality = null;
        var items_array = [];
        function nullmaking(){
                $("#supplier_id").val(null);
                $("#price").val(null);
                $("#speciality").val(null);
            }
        $(".add_quotation").click(function() {
            // console.log($(this).attr("data-requisition_id"));
            var id = $(this).attr("data-requisition_id");
            $.ajax({
                    type:"POST",
                    url:"{{route('production.purchase.quotation.data_pass')}}",
                    data:{
                        'id' : id,
                        '_token' : $('input[name=_token]').val()
                    },
                    success:function(data){
                        console.log(data);
                    }
                });

        });
        // $(".supplier_name").change(function(){
        //    //console.log($(this).attr("name"));
        //    name = $(this).attr("name");
        
        // });
        $('.supplier_name').change(function(){
                supplier_id = $(this).val();
               // console.log($(this).find(':selected').data("name"));
                name = $(this).find(':selected').data("supplier_name");
                //console.log(name);
                
            });
        $(".ItemAdd").click(function(){
            console.log($(".supplier_name").val());
                items_array.push({"supplier_id":supplier_id,"name":name,"price":$("#price").val(),"speciality":$("#speciality").val(),"status":"stay"});
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $.each( items_array, function( key, item ) {
                    // console.log(item);
                    if (item.status == "stay") {
                        if(items_array.length-1 == key){
                            $("table.itemsTable tr").last().before("<tr id='"+key+"'><td ><input name='supplier_id' type='hidden' value='"+item.supplier_id+"'> <span>"+item.name+"</span></td><td ><input name='price' type='hidden' value='"+item.price+"'> <span>"+item.price+"</span></td><td ><input name='speciality'type='hidden' value='"+item.speciality+"'> <span>"+item.speciality+"</span></td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $(".delete_item").click(function(){
                    items_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#provided_item").val('');
                    $("#provided_item").val(JSON.stringify(items_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
        });
            
        });
    </script>
     {{-- <script type="text/javascript">
        $(document).ready(function () {
        //    var supplier,price,speciality = null;
        var items_array = [];
        function nullmaking(){
                $("#supplier").val(null);
                $("#price").val(null);
                $("#speciality").val(null);
            }
        $(".ItemAdd").click(function(){
            console.log($("#supplier").val());
                //console.log('Good');
                items_array.push({"supplier":$("#supplier").val(),"price":$("#price").val(),"speciality":$("#speciality").val(),"status":"stay"});
                $("#provided_item").val('');
                $("#provided_item").val(JSON.stringify(items_array));
                $.each( items_array, function( key, item ) {
                     //console.log(item);
                    if (item.status == "stay") {
                        if(items_array.length-1 == key){
                            $("table.itemsTable tr").last().after("<tr id='"+key+"'><td>"+item.supplier+"</td><td>"+item.price+"</td><td>"+item.speciality+"</td><td><button class='btn btn-danger delete_item' data-id='"+key+"'>Delete</button></td></tr>");
                        }
                    }
                });
                $(".delete_item").click(function(){
                    items_array[$(this).data("id")].status="delete";
                    // console.log(product_array,$(this).data("id"));
                    $("#provided_item").val('');
                    $("#provided_item").val(JSON.stringify(items_array));
                    $("#"+$(this).data("id")).remove();
                });
                nullmaking();
        });
            
        });
    </script> --}}
@endsection

