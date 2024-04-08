<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Auth\RigisterByPhoneController;
use App\Http\Controllers\DashboardController;
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


Route::group(['middleware' => ['role:admin','auth']], function () { 
    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/user/create', 'createUser')->name('admin.addUser');
        Route::post('/admin/user','userStore')->name('admin.storeUser');
        Route::get('/showalluser', 'index')->name('admin.showUser');
    });
 });

Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::controller(DashboardController::class)->group(function(){
    Route::get('/change-password','changePassword')->name('changePassword');
    Route::post('/change-password','changePasswordSave')->name('postChangePassword');
    });
});
