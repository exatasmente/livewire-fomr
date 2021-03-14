<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::get('/',[HomeController::class,'index'])->name('home');

Route::name('user.')->prefix('users')->group(function(){
    Route::get('/', [UserController::class, 'create'])->name('create');
    Route::get('/{id}',[UserController::class, 'edit'])->name('edit');
});
