<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Superadmin\RoleController;
use App\Http\Controllers\Superadmin\AdminAccountController;
use App\Http\Controllers\Superadmin\AccStatusController;

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

Route::get('/', function () {
    return view('oas.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// superadmin
Route::controller(RoleController::class)->prefix('superadmin/role/')->name('role.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(AdminAccountController::class)->prefix('superadmin/adminAccount/')->name('adminAccount.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
});

Route::controller(AccStatusController::class)->prefix('superadmin/accStatus/')->name('accStatus.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

