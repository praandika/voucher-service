<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VouchersController;
use App\Http\Controllers\RedeemController;
use App\Models\Vouchers;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [VouchersController::class,'generate'])->name('generate');
Route::get('voucher', [VouchersController::class,'index'])->name('voucher.index')->middleware('auth.basic');
Route::post('voucher/store', [VouchersController::class,'store'])->name('voucher.store');
Route::post('voucher/{id}', [VouchersController::class,'update'])->name('voucher.update');
Route::get('voucher/{code}', [VouchersController::class,'item'])->name('voucher.item');
// NEW !!
Route::get('scanned/{code}', [VouchersController::class,'scanned'])->name('voucher.scanned');
Route::get('redeemed/{code}', [VouchersController::class,'redeemed'])->name('voucher.redeemed');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
