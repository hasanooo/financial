<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Debit\DebitController;
use App\Http\Controllers\Credit\CreditController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard' ,[AdminController::class,'dashboard']);
Route::get('/debit/index' ,[DebitController::class,'debitIndex'])->name('debit.index');
Route::get('/credit/index' ,[CreditController::class,'creditIndex'])->name('credit.index');