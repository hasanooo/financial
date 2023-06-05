<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Debit\DebitController;
use App\Http\Controllers\Credit\CreditController;

use App\Http\Controllers\Cashbook\CashbookController;

use App\Http\Controllers\Product\ProductController;

use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/dashboard' ,[AdminController::class,'dashboard'])->name('dashboard');
//supplier
Route::get('/supplier' ,[ContactController::class,'supplierform'])->name('formsupplier.');
Route::post('/supplier' ,[ContactController::class,'supplierformsumbit'])->name('formsupplier.submit');
Route::post('/supplier' ,[ContactController::class,'supplierformsumbit'])->name('formsupplier.submit');
//product
Route::get('/product/category' ,[ProductController::class,'categoryform'])->name('product.category');
Route::post('/product/category' ,[ProductController::class,'AddCategory'])->name('product.category.submit');
Route::get('/product' ,[ProductController::class,'productform'])->name('product');

//Debit
Route::get('/debit/index' ,[DebitController::class,'debitIndex'])->name('debit.index');
Route::get('/debit/create' ,[DebitController::class,'debitCreate'])->name('debit.create');
Route::post('/debit/create/submit' ,[DebitController::class,'CreateDebit'])->name('dabit.create.submit');
Route::get('/debit/cash/view/{id}',[DebitController::class,'DebitEditView'])->name('edit.debitcash.view');
Route::post('/debit/update/submit/{id}',[DebitController::class,'UpdateDebit'])->name('dabit.update.submit');
Route::get('/debit/delete/{id}',[DebitController::class,'DeleteDebit'])->name('delete.debit.cash');
Route::get('/debit/category' ,[DebitController::class,'debitCategory'])->name('debit.category');
Route::post('/debit/category/add' ,[DebitController::class,'CreateCategory'])->name('debit.category.create');
Route::get('/debit/viewEdit/{id}',[DebitController::class,'CategoryView'])->name('editcategory.view');
Route::post('/debit/category/edit',[DebitController::class,'EditCategory'])->name('category.edit.sub');
Route::get('/debit/delete/dcategory/{id}',[DebitController::class,'DeleteCategory'])->name('delete.category.debit');

//Credit
Route::get('/credit/index' ,[CreditController::class,'creditIndex'])->name('credit.index');
Route::get('/credit/create' ,[CreditController::class,'creditCreate'])->name('credit.create');
Route::post('/credit/create/submit' ,[CreditController::class,'creditCreateSubmit'])->name('credit.create.submit');
Route::get('/credit/category' ,[CreditController::class,'creditCategory'])->name('credit.category');
Route::post('/credit/category/Submit' ,[CreditController::class,'creditCategorySubmit'])->name('credit.category.Submit');
Route::get('/credit/category/delete/{id}', [CreditController::class, 'creditCategoryDelete'])->name('creditcategory.delete');

//Cashbook
Route::get('/cashbook/index' ,[CashbookController::class,'cashbookIndex'])->name('cashbook.index');
Route::get('/cashbook/thismonth/index' ,[CashbookController::class,'ThisMonth'])->name('cashbook.thismonth.index');
Route::get('/cashbook/selected/month' ,[CashbookController::class,'SelectMonth'])->name('cashbook.select.month');

//Settings

Route::get('/settings/general' ,[SettingController::class,'generalView'])->name('settings.general');
Route::get('/settings/system' ,[SettingController::class,'systemView'])->name('settings.system');


//Profile

Route::get('/profile/create' ,[ProfileController::class,'create'])->name('profile.create');

Route::get('/profile/index' ,[ProfileController::class,'profileIndex'])->name('profile.index');