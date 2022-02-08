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
use App\Http\Controllers\ColdstorageController;
use App\Http\Controllers\FishGradeController;
use App\Http\Controllers\MedicalReportController;
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
use App\Http\Controllers\ProductionPurchaseItemController;
use App\Http\Controllers\ProductionPurchaseRequisitionController;
use App\Http\Controllers\ProductionPurchaseTypeController;
use App\Http\Controllers\ProductionPurchaseUnitController;
use App\Http\Controllers\ProductionRequisitionController;
use App\Http\Controllers\ProductionRequisitionItemController;
use App\Http\Controllers\ProductionSupplierController;
use App\Http\Controllers\ProductionSupplierItemController;
use App\Http\Controllers\ProductionTestController;
use App\Http\Controllers\SupplyItemController;
use App\Http\Controllers\TempMonitoringController;
use App\Http\Controllers\TempTherController;
use App\Http\Controllers\TiffinBillController;
use App\Models\ProductionRequisitionItem;
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
    Route::resource('production-purchase-requisition', ProductionPurchaseRequisitionController::class);

    //Production Requisition Item
    Route::resource('production-requisition-item', ProductionRequisitionItemController::class);




});