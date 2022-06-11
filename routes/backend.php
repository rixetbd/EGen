<?php

use App\Http\Controllers\AttendenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/emailgen', [HomeController::class, 'emailgen'])->name('emailgen');

Route::controller(MemberController::class)->group(function(){
    Route::get('/user/index', 'index')->name('users');
    Route::get('/user/new', 'create')->name('user_new');
    Route::get('/user', 'profile')->name('profile');
    Route::post('/user/create', 'store')->name('user_new_create');
    Route::post('/user/update', 'update')->name('user_update');
    Route::get('/user/edit/{id}', 'edit')->name('user_edit');
    Route::get('/user/delete/{id}', 'destroy')->name('user_delete');
});

Route::controller(AttendenceController::class)->group(function(){
    Route::get('/attendence/index', 'index')->name('attendence.index');
});
