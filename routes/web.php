<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

//HomeController Router
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


//ProfileController Route
Route::get('profile/index' , 'ProfileController@profilename')->name('profile.index');
Route::post('profile/insert' , 'ProfileController@profileinsert');
Route::post('edit/password/post' , 'ProfileController@profileeditpassword');
Route::post('profile/image/upload' , 'ProfileController@profileimageupload');

// EmployeeController Route
Route::resource('employee' , 'EmployeeController');
Route::get('employees/view' , 'EmployeeController@employeesview')->name('employees.view');
Route::get('employees/trash' , 'EmployeeController@employeestrash')->name('employees.trash');
Route::get('employee/restore/{restore_id}' , 'EmployeeController@employeerestore')->name('employee.restore');
Route::get('employee/delete/{delete_id}' , 'EmployeeController@employeedelete')->name('employee.delete');

// CustomerController Route
Route::resource('customer' , 'CustomerController');
Route::get('customers/view' , 'CustomerController@customersview')->name('customers.view');
// Route::get('customers/trash' , 'CustomerController@customerstrash')->name('customers.trash');
// Route::get('customer/restore/{restore_id}' , 'CustomerController@customerrestore')->name('customer.restore');
// Route::get('customer/delete/{delete_id}' , 'CustomerController@customerdelete')->name('customer.delete');

// SupplierController
Route::resource('supplier' , 'SupplierController');
Route::get('suppliers/view' , 'SupplierController@suppliersview')->name('suppliers.view');

// CategoryController Route
Route::resource('category' , 'CategoryController');
Route::get('categoris/view' , 'CategoryController@categorisview')->name('categoris.view');

// ProductController
Route::resource('product' , 'ProductController');
Route::get('products/view' , 'ProductController@productsview')->name('products.view');
Route::get('import/product' , 'ProductController@importproduct')->name('import.product');
Route::get('export' , 'ProductController@export')->name('export');
Route::post('import' , 'ProductController@import')->name('import');

// ExpenseController Route
Route::resource('expense' , 'ExpenseController');
Route::get('expenses/view' , 'ExpenseController@expensesview')->name('expenses.view');
Route::get('today/index' , 'ExpenseController@todayindex')->name('today.index');
Route::get('thismonth/index' , 'ExpenseController@thismonthindex')->name('thismonth.index');
Route::get('year/index' , 'ExpenseController@yearindex')->name('year.index');
Route::get('january/expense' , 'ExpenseController@januaryexpense')->name('january.expense');
Route::get('february/expense' , 'ExpenseController@februaryexpense')->name('february.expense');
Route::get('march/expense' , 'ExpenseController@marchexpense')->name('march.expense');
Route::get('april/expense' , 'ExpenseController@aprilexpense')->name('april.expense');
Route::get('may/expense' , 'ExpenseController@mayexpense')->name('may.expense');
Route::get('june/expense' , 'ExpenseController@juneexpense')->name('june.expense');
Route::get('july/expense' , 'ExpenseController@julyexpense')->name('july.expense');
Route::get('august/expense' , 'ExpenseController@augustexpense')->name('august.expense');
Route::get('september/expense' , 'ExpenseController@septemberexpense')->name('september.expense');
Route::get('october/expense' , 'ExpenseController@octoberexpense')->name('october.expense');
Route::get('november/expense' , 'ExpenseController@novemberexpense')->name('november.expense');
Route::get('december/expense' , 'ExpenseController@decemberexpense')->name('december.expense');

// SalaryController Route
Route::resource('salary' , 'SalaryController');
Route::get('salaris/view' , 'SalaryController@salariview')->name('salaris.view');
Route::get('pay/salary' , 'SalaryController@paysalary')->name('pay.salary');
Route::get('paysalary/store' , 'SalaryController@paysalarystore')->name('paysalary.store');

// AttendenceController Route
Route::resource('attendence' , 'AttendenceController');
Route::get('all/attendence' , 'AttendenceController@allattendence')->name('all.attendence');
Route::get('attendence/edit/{date}' , 'AttendenceController@allattendenceedit')->name('allattendenceedit');
Route::post('attendence/attendenceupdate' , 'AttendenceController@updateattendence')->name('update.attendence');
Route::get('attendence/viewattendence/{edit_date}' , 'AttendenceController@viewattendence')->name('view.attendence');

// SettingController Route
Route::resource('setting' , 'SettingController');

// PosControlelr Route
Route::get('pos' , 'PosController@index')->name('pos');

// CartController Route
Route::post('add-cart' , 'CartController@index')->name('cart.index');
Route::post('/update-to-cart' , 'CartController@updatetocart')->name('update.cart');
Route::get('/delete-to-cart/{rowId}' , 'CartController@deletetocart')->name('delete.cart');
Route::post('/invoice-create' , 'CartController@invoicecreate')->name('invoice.index');

// OrderController Route
Route::post('/order-submit' , 'OrderController@ordersubmit')->name('order.submit');

// ==== Api ====
// GithubController
Route::get('login/github', 'GithubController@redirectToProvider');
Route::get('login/github/callback', 'GithubController@handleProviderCallback');

// GoogleController
Route::get('login/google', 'GoogleController@redirectToProvider');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');

// GoogleController
Route::get('login/facebook', 'FacebookController@redirectToProvider');
Route::get('login/facebook/callback', 'FacebookController@handleProviderCallback');