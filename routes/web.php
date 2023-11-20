<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckinController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KamarController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login_process');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('operator')->as('operator.')->middleware([
    'auth', 'checkRole:is_operator'
])->group(function () {
    Route::resource('kamar', KamarController::class);
    Route::resource('checkin', CheckinController::class);
    Route::resource('checkout', CheckoutController::class);
});


Route::prefix('admin')->as('admin.')->middleware([
    'auth',
    'checkRole:is_admin'
])->group(function () {
    Route::resource('kamar', KamarController::class);
    Route::resource('user', UserController::class);
});
