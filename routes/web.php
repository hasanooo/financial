<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Debit\DebitController;
use App\Http\Controllers\Credit\CreditController;
use App\Http\Controllers\Cashbook\CashbookController;

use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\EMI\EMIController;


use App\Http\Controllers\Purchase\PurchaseController;

use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Tax\TaxController;

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
Route::get('/' ,[ProfileController::class,'Login'])->name('login');
Route::post('/' ,[ProfileController::class,'LoginSubmit'])->name('profile.loginsubmit');
Route::post('/changepassword/{id}',[ProfileController::class,'ChangePassword'])->name('changepassword');
Route::get('/logout', [ProfileController::class, 'logout'])->name('logout');
//supplier
Route::get('/supplier' ,[ContactController::class,'supplierform'])->name('formsupplier');
Route::post('/supplier' ,[ContactController::class,'supplierformsumbit'])->name('formsupplier.submit');

// Customer
Route::get('/customer/index', [CustomerController::class,'Index'])->name('customer.index');
Route::get('/customer/edit/page/{id}', [CustomerController::class,'UpdatePage'])->name('customer.update.page');
Route::post('/customer/edit/{id}', [CustomerController::class,'Update'])->name('customer.update');
Route::post('/supplier/add' ,[CustomerController::class,'Add'])->name('customer.add');
//product

Route::get('/product/Index' ,[ProductController::class,'productIndex'])->name('prodauct.index');
Route::get('/product/category' ,[ProductController::class,'categoryform'])->name('product.category');
Route::post('/product/category' ,[ProductController::class,'AddCategory'])->name('product.category.submit');
Route::get('/product/add' ,[ProductController::class,'productform'])->name('product.create');
Route::post('/product/submit' ,[ProductController::class,'productformsubmit'])->name('product.submit');
Route::get('/product/view/invoice/{id}' ,[ProductController::class, 'ProductView'])->name('product.view');
Route::get('/product/view/reports' ,[ProductController::class, 'ProductReport'])->name('prodauct.purchase.reports');
// Route::get('/product/edit/{id}' ,[ProductController::class, 'ProductEditform'])->name('product.edit.form');

//sale
Route::get('/saleform' ,[SaleController::class, 'saleform'])->name('sale.form');
Route::post('/salesubmit',[SaleController::class,'saleformsubmit'])->name('sale.submit');
Route::get('/saleform/product' ,[SaleController::class, 'productforpartial'])->name('sale.productpartial');
Route::get('/salelist' ,[SaleController::class, 'salelist'])->name('sale.list');
Route::get('/saleeditform/{id}' ,[SaleController::class, 'saleedit'])->name('sale.edit.form');
Route::post('/saleeditformsubmit' ,[SaleController::class, 'saleeditformsubmit'])->name('sale.edit.form.submit');
Route::get('/saleview/{id}' ,[SaleController::class, 'saleview'])->name('sale.view');
//Tax
Route::get('/taxhome' ,[TaxController::class, 'taxhome'])->name('taxhome');

// EMI Sale
Route::get('/emi/index',[EMIController::class,'Index'])->name('emi.index');
Route::get('/emi/collect/index',[EMIController::class,'CollectIndex'])->name('collect.index');
Route::get('/emi/sale/index',[EMIController::class,'SaleIndex'])->name('emi.sale.index');
Route::get('/emi/sale/select',[EMIController::class,'ProductSearch'])->name('sale.emi.select');
Route::get('/emi/invoice/select',[EMIController::class,'InvoiceSelect'])->name('emi.invoice.select');
Route::post('/emi/sale/submit',[EMIController::class,'SaleSub'])->name('sale.emi.sub');
Route::post('/emi/collect/submit',[EMIController::class,'CollectSub'])->name('emi.collect.sub');
Route::get('/report/print/{id}', [EMIController::class, 'PrintReport'])->name('print.report');


Route::post('/taxformsubmit' ,[TaxController::class, 'formsubmit'])->name('tax.formsubmit');

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
Route::get('/credit/edit/{id}', [CreditController::class, 'editCreditView'])->name('creditview.edit');
Route::post('/credit/edit/submit/{id}' ,[CreditController::class,'editCreditSubmit'])->name('credit.edit');

//Cashbook
Route::get('/cashbook/index' ,[CashbookController::class,'cashbookIndex'])->name('cashbook.index');
Route::get('/cashbook/thismonth/index' ,[CashbookController::class,'ThisMonth'])->name('cashbook.thismonth.index');
Route::post('/cashbook/selected/month' ,[CashbookController::class,'SelectMonth'])->name('cashbook.select.month');
Route::get('/cashbook/category/debit' ,[CashbookController::class,'ThisDebitCategory'])->name('cashbook.thiscategory.index');
Route::post('/cashbook/selected/category' ,[CashbookController::class,'ThisSelectDebit'])->name('cashbook.select.category');
Route::get('/cashbook/category/credit' ,[CashbookController::class,'ThisCreditCategory'])->name('cashbook.thiscategory.credit');
Route::post('/cashbook/selected/credit' ,[CashbookController::class,'ThisSelectCredit'])->name('cashbook.select.credit');

//Settings

Route::get('/settings/general' ,[SettingController::class,'generalView'])->name('settings.general');
Route::post('/settings/general/update' ,[SettingController::class,'UpdateSetting'])->name('settings.update');
Route::get('/settings/system' ,[SettingController::class,'systemView'])->name('settings.system');


//Profile

Route::get('/profile/create' ,[ProfileController::class,'create'])->name('profile.create');

Route::post('/profile/create' ,[ProfileController::class,'submit'])->name('profile.submit');
Route::get('/profile/index' ,[ProfileController::class,'profileIndex'])->name('profile.index');
Route::get('/profile/list' ,[ProfileController::class,'ProfileList'])->name('profile.list');
Route::get('/profile/edit/{id}' ,[ProfileController::class,'ProfileEdit'])->name('profile.edit');
Route::post('/profile/edit/{id}' ,[ProfileController::class,'ProfileUpdate'])->name('profile.update');
Route::get('/profile/delete/{id}' ,[ProfileController::class,'destroy'])->name('profile.delete');
//Roles
Route::get('/role.create', [RolesController::class, 'create'])->name('role.create');
Route::post('/role.create', [RolesController::class, 'store'])->name('role.store');
Route::get('/role.index', [RolesController::class, 'index'])->name('role.dashboard');
Route::get('/admin.roles.edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
Route::post('/role.update/{id}', [RolesController::class, 'update'])->name('role.update');
Route::get('/role.delete/{id}', [RolesController::class, 'destroy'])->name('role.delete');


//Purchase
Route::get('/Purchase/Index',[PurchaseController::class,'PurchaseIndex'])->name('purchase.index');
Route::get('/Purchase/Add',[PurchaseController::class,'PurchaseAdd'])->name('purchase.add');
Route::get('/Purchase/Edit/{id}',[PurchaseController::class,'PurchaseEdit'])->name('purchase.edit');
Route::post('/Purchase/Add/Sub',[PurchaseController::class,'PurchaseAddSub'])->name('purchaseaddsub');
Route::get('/partialPurchaseadd', [PurchaseController::class, 'purchaseSearch'])->name('addpurchasepartial');
Route::post('/Purchase/Eproductdit/Sub',[PurchaseController::class,'PurchaseEditSub'])->name('purchasesubedit');
Route::get('/Purchase/delete/{id}', [PurchaseController::class, 'Purchasedelete'])->name('purchase.delete');
Route::get('/Purchase/dueEdit/{id}',[PurchaseController::class,'viewEditDue'])->name('purchasedue.edit');
Route::post('/Purchase/due/makepayment',[PurchaseController::class,'totalpayment'])->name('purmakepayment');
Route::post('/Purchase/due/submakepayment',[PurchaseController::class,'makepayment'])->name('submakepayment');
Route::get('/Purchase/item',[PurchaseController::class,'purchase_item_partial'])->name('admin.purchase_item');
Route::get('/Purchase/partialmodal',[PurchaseController::class,'purchase_modal_partial'])->name('purchase.partialmodal');
Route::get('/purchase/return/{id}',[PurchaseController::class,'PurchaseReturn'])->name('purchase.return');
Route::post('/purchase/return/{id}',[PurchaseController::class,'PurchaseReturnSubmit'])->name('purchase.return');
Route::get('/return/list',[PurchaseController::class,'ReturnList'])->name('return.list');
Route::get('/return/add_to_cash',[PurchaseController::class,'AddToCash'])->name('add_to_cash');
Route::get('/return/product/{id}',[PurchaseController::class,'ReturnList'])->name('return.product');

Route::get('/purchase/search',[PurchaseController::class,'purchase_search'])->name('purchase.search');