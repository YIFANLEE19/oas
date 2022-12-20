<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Superadmin\RoleController;
use App\Http\Controllers\Superadmin\AdminAccountController;
use App\Http\Controllers\Superadmin\AccStatusController;
use App\Http\Controllers\Superadmin\IncomeController;
use App\Http\Controllers\Superadmin\GenderController;
use App\Http\Controllers\Superadmin\MaritalController;
use App\Http\Controllers\Superadmin\NationalityController;
use App\Http\Controllers\Superadmin\ReligionController;
use App\Http\Controllers\Superadmin\RaceController;
use App\Http\Controllers\Superadmin\GuardianRelationshipController;
use App\Http\Controllers\Superadmin\SuperadminController;

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
Route::controller(SuperadminController::class)->prefix('superadmin/')->name('superadmin.')->group(function(){
    Route::get('/','index')->name('home');
});

Route::controller(RoleController::class)->prefix('superadmin/role/')->name('role.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(AdminAccountController::class)->prefix('superadmin/adminAccount/')->name('adminAccount.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(AccStatusController::class)->prefix('superadmin/accStatus/')->name('accStatus.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(IncomeController::class)->prefix('superadmin/income/')->name('income.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(GenderController::class)->prefix('superadmin/gender/')->name('gender.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(MaritalController::class)->prefix('superadmin/marital/')->name('marital.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(NationalityController::class)->prefix('superadmin/nationality/')->name('nationality.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(ReligionController::class)->prefix('superadmin/religion/')->name('religion.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(RaceController::class)->prefix('superadmin/race/')->name('race.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

Route::controller(GuardianRelationshipController::class)->prefix('superadmin/guardian-relationship/')->name('guardian_relationship.')->group(function(){
    Route::get('/','index')->name('home');
    Route::post('/create','create')->name('create');
    Route::post('/update','update')->name('update');
});

