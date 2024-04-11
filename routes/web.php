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
        Route::post('/admin/destroyuser','destroy')->name('admin.UserDestroy');
        Route::post('/show/user','userDetails')->name('admin.UserShow');
        Route::get('/getuser/{id}', 'show')->name('get.user.details');
        Route::post('/admin/updateuser/{id}','update')->name('admin.Userupdate');
    });
 });

Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::controller(DashboardController::class)->group(function(){
    Route::get('/change-password/{user}','changePassword')->name('changePassword');
    Route::post('/changepasswordsave/{user}','changePasswordSave')->name('postChangePassword');
    });
});
