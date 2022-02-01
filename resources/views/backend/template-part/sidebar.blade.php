
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

                            <li class="nav-item  @if( request()->path() == 'admin/employee/attendance' ) active open @endif">
                                <a href="{{route('employee.attend')}}" class="nav-link ">
                                    <span class="title">Attendance Management</span>
                                </a>
                            </li>

                            <li class="nav-item  @if( request()->path() == 'admin/individual-attendance' ) active open @endif
                            @if( request()->path() == 'individual-attendance' ) active open @endif">
                                <a href="{{route('employee.individual')}}" class="nav-link">
                                    <span class="title">Individual Attendance</span>
                                </a>
                            </li>

                        </ul>
                    </li>

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
            <li class="nav-item">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <span class="title">Production Management</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item">
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
                            <li class="nav-item  @if( request()->path() == 'admin/temp-thermocouple' ) active open @endif">
                                <a href="{{route('temp-thermocouple.index')}}" class="nav-link ">
                                    <span class="title">Temperature Thermocouple</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Microbiological Test Reports</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="{{route('microbiological.test.report.genarate')}}" class="nav-link ">
                                            <span class="title">Report Genarate</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        {{-- <a href="{{route('production-requisition.index')}}" class="nav-link ">
                                            <span class="title">Requisition List</span>
                                        </a> --}}
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-user"></i>
                            <span class="title">Supply Management</span>
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
                                        <a href="{{route('production-requisition.index',['page'=>1,'status'=>'pending'])}}" class="nav-link ">
                                            <span class="title">Requisition List</span>
                                        </a>
                                    </li>
                                </ul>
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
