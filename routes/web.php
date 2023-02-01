<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\QuestionsDeatailController;
use App\Http\Controllers\QuestionsTitleController;
use App\Http\Middleware\BackLogin;
use App\Http\Middleware\CheckLogin;
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
Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('sign-in', [AuthController::class, "sign_in"]);
Route::get('/logout' , [AuthController::class , "logout"]);

Route::middleware('admin')->group(function () {
    Route::get('language/{locale}', function ($locale) {
        app()->setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    });


    Route::get('/dashboard/{locale?}', function ($locale = null) {
        if (isset($locale) && in_array($locale, config('app.available_locales'))) {
            app()->setLocale($locale);
        }
        return view('admin.welcome');
    });
   
    Route::get('all-active-user' , [UserController::class , 'all_inactive_users'])->name('all.inactive.users');
    Route::get('active-user/{id}' , [UserController::class , 'active'])->name('users.active');
    Route::get('in-active-user/{id}' , [UserController::class , 'in_active'])->name('users.inactive');
    Route::get('active-all-user' , [UserController::class , 'active_all'])->name('all.users.active');
    Route::get('/logout' , [AuthController::class , "logout"]);
    Route::get('/profile' , [AuthController::class , "profile"])->name('admin.myprofile');
    Route::get('/edit-profile' , [AuthController::class , "edit_profile"])->name('admin.edit.profile');
    Route::put('/update-profile' , [AuthController::class , "update_profile"])->name('admin.update.profile');
   

    Route::resource('admins' , AdminController::class);
    Route::resource('currency' , CurrencyController::class);
    Route::resource('users' , UserController::class);
    Route::resource('types' , TypeController::class);
    Route::resource('provinces' , ProvinceController::class);
    
    // questions section 
    Route::resource('questions-titles' , QuestionsTitleController::class);

    Route::get('add-question/{document_id}' , [QuestionsTitleController::class , "add_question"]);
    Route::post('store-question/{document_id}' , [QuestionsTitleController::class , "store_question"]);

    Route::resource('questions-details' , QuestionsDeatailController::class);

});
