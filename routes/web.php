<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorsController;
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
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'redirect'])->name('home');
Route::get('/user.index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');





Route::resource('/Doctors', "App\Http\Controllers\DoctorsController");
Route::post('/appointment', [App\Http\Controllers\AdminController::class,'appointment']);
Route::get('/appointment', [App\Http\Controllers\AdminController::class,'index']);
Route::get('/myappointment', [App\Http\Controllers\HomeController::class, 'myappointment']);
Route::get('/cancel_appoint/{id}', [App\Http\Controllers\HomeController::class, 'cancel_appoint']);
Route::get('/approved/{id}', [App\Http\Controllers\AdminController::class, 'approved']);
Route::get('/canceled/{id}', [App\Http\Controllers\AdminController::class, 'canceled']);

