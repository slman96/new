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

// register by phone
Route::get('/registerbyphone',[RigisterByPhoneController::class,'registerByPhone'])->name('registerbyphone');
Route::post('/registerphone',[RigisterByPhoneController::class,'create'])->name('RegisterPhone');


Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::controller(AdminController::class)->group(function(){
        Route::get('/admin/user/create', 'createUser')->name('admin.addUser');
        Route::get('/admin/product/create', 'createProduct')->name('admin.addProduct');
        Route::post('/admin/p','productStore')->name('admin.storeProduct');
        Route::post('/admin/user','userStore')->name('admin.storeUser');
        Route::get('/showalluser', 'index')->name('admin.showUser');
    });
    
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/change-password','changePassword')->name('changePassword');
        Route::post('/change-password','changePasswordSave')->name('postChangePassword');
    });
});
