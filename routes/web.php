<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BankTransactionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeLoanController;
use App\Http\Controllers\SalePointController;
use App\Http\Controllers\TransactionController;
use App\PersonalManagement;
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

    Route::get('add/personal/loan', [PersonalManagement::class,'personalIndex'])->name('personal.loan.index');
    Route::post('/personal/store', [PersonalManagementController::class,'personalLoanStore'])->name('personal.loan.store');
    Route::get('/personal/loan', [PersonalManagementController::class,'personalLoanManage'])->name('manage.loan');
    Route::get('/personal/loan/{id}', [PersonalManagementController::class,'personalEdit'])->name('personal.loan.edit');
    Route::put('/personal/update/{id}', [PersonalManagementController::class,'personalUpdate'])->name('update.personal.loan');

    Route::get('add/office/loan', [OfficeLoanController::class,'officeLoanAdd'])->name('add.office.loan');
    Route::post('office/loan/store', [OfficeLoanController::class,'officeLoanStore'])->name('office.loan.store');
    Route::get('office/loan/', [OfficeLoanController::class,'officeLoanIndex'])->name('office.loan.manange');
    Route::get('office/loan/{id}', [OfficeLoanController::class,'officeLoanEdit'])->name('office.loan.edit');
    Route::put('office/loan/update/{id}', [OfficeLoanController::class,'officeLoanUpdate'])->name('update.office.loan');
});