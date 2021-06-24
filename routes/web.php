<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\WooapiController;
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



Auth::routes();

Route::group(['middleware' => ['auth', 'is_emp']], function () {
    Route::get('/', function () {
        return redirect('home');
    });

   

});


Route::group(['middleware' => ['auth', 'is_admin']], function () {
    
    Route::get('/', function () {
        return redirect('home');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/order/list', [HomeController::class, 'index'])->name('home.order.list');
    Route::get('/home/order/view/{order_id}', [HomeController::class, 'index'])->name('home.order.view');

    Route::get('/wooapi', [WooapiController::class, 'index'])->name('wooapi');
    Route::post('/wooapi', [WooapiController::class, 'store']);
    Route::put('/wooapi', [WooapiController::class, 'store']);
    Route::delete('/wooapi/{wooapi_id}', [WooapiController::class, 'destroy'])->name('wooapi.destroy');

    Route::get('/staff', [StaffController::class, 'index'])->name('staff');
    Route::post('/staff', [StaffController::class, 'store']);
    Route::put('/staff', [StaffController::class, 'store']);
    Route::delete('/staff/{staff_id}', [StaffController::class, 'destroy'])->name('staff.destroy');


});