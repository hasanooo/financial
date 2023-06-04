<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Debit\DebitController;
use App\Http\Controllers\Credit\CreditController;
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

//Debit
Route::get('/debit/index' ,[DebitController::class,'debitIndex'])->name('debit.index');
Route::get('/debit/create' ,[DebitController::class,'debitCreate'])->name('debit.create');
Route::get('/debit/category' ,[DebitController::class,'debitCategory'])->name('debit.category');

//Credit
Route::get('/credit/index' ,[CreditController::class,'creditIndex'])->name('credit.index');
Route::get('/credit/create' ,[CreditController::class,'creditCreate'])->name('credit.create');
Route::post('/credit/create/submit' ,[CreditController::class,'creditCreateSubmit'])->name('credit.create.submit');
Route::get('/credit/category' ,[CreditController::class,'creditCategory'])->name('credit.category');
Route::post('/credit/category/Submit' ,[CreditController::class,'creditCategorySubmit'])->name('credit.category.Submit');
Route::get('/credit/category/delete/{id}', [CreditController::class, 'creditCategoryDelete'])->name('creditcategory.delete');

//Settings

Route::get('/settings/general' ,[SettingController::class,'generalView'])->name('settings.general');
Route::get('/settings/system' ,[SettingController::class,'systemView'])->name('settings.system');


//Profile
Route::get('/profile/index' ,[ProfileController::class,'profileIndex'])->name('profile.index');

