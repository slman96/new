<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\HomeController;
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
        Route::get('/admin/user/create', 'create')->name('admin.addUser');
        Route::post('/admin/user','store')->name('admin.storeUser');
        Route::get('/showalluser', 'index')->name('admin.showUser');
        Route::post('/admin/destroyuser','destroy')->name('admin.UserDestroy');
        Route::get('/getuser/{id}', 'show')->name('get.user.details');
        Route::post('/admin/updateuser/{id}','update')->name('admin.Userupdate');
        Route::post('/admin/filter','filter')->name('admin.filter');
    });
 });

Route::middleware('auth')->group(function(){
    Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/home', 'index')->name('home');
    Route::get('/change-password/{user}','changePassword')->name('changePassword');
    Route::post('/changepasswordsave/{user}','changePasswordSave')->name('postChangePassword');
    });
});
