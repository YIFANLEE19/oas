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
use App\Http\Controllers\Superadmin\AddressTypeController;
use App\Http\Controllers\Superadmin\ApplicationStatusController;
use App\Http\Controllers\Superadmin\CountryController;
use App\Http\Controllers\UserProfile\PersonalParticularController;
use App\Http\Controllers\UserProfile\ParentGuardianParticularController;
use App\Http\Controllers\UserProfile\EmergencyContactController;
use App\Http\Controllers\UserProfile\ProfilePictureController;

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
Route::prefix('superadmin/')->middleware('admin')->group(function(){

    Route::controller(SuperadminController::class)->name('superadmin.')->group(function(){
        Route::get('/','index')->name('home');
    });

    Route::controller(RoleController::class)->prefix('role/')->name('role.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });

    Route::controller(AdminAccountController::class)->prefix('adminAccount/')->name('adminAccount.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
    
    Route::controller(AccStatusController::class)->prefix('accStatus/')->name('accStatus.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
    
    Route::controller(IncomeController::class)->prefix('income/')->name('income.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
    
    Route::controller(GenderController::class)->prefix('gender/')->name('gender.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
    
    Route::controller(MaritalController::class)->prefix('marital/')->name('marital.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
    
    Route::controller(NationalityController::class)->prefix('nationality/')->name('nationality.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
    
    Route::controller(ReligionController::class)->prefix('religion/')->name('religion.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
    
    Route::controller(RaceController::class)->prefix('race/')->name('race.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
    
    Route::controller(GuardianRelationshipController::class)->prefix('guardian-relationship/')->name('guardian_relationship.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });

    Route::controller(AddressTypeController::class)->prefix('addressType/')->name('addressType.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });

    Route::controller(ApplicationStatusController::class)->prefix('applicationStatus/')->name('applicationStatus.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });

    Route::controller(CountryController::class)->prefix('country/')->name('country.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
        Route::post('/update','update')->name('update');
    });
});

Route::prefix('user-profile/')->middleware('auth')->group(function(){

    Route::controller(PersonalParticularController::class)->prefix('personal-particulars')->name('personalParticulars.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
    });

    Route::controller(ParentGuardianParticularController::class)->prefix('parent-guardian-particulars')->name('parentGuardianParticulars.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
    });

    Route::controller(EmergencyContactController::class)->prefix('emergency-contact')->name('emergencyContact.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
    });

    Route::controller(ProfilePictureController::class)->prefix('profile-picture')->name('profilePicture.')->group(function(){
        Route::get('/','index')->name('home');
        Route::post('/create','create')->name('create');
    });

});







