<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\demoController;
use App\Http\Controllers\homeController;
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
    return view('layout.app');
});


Route::get('/category', function () {
    return view('category');
});

//How to pass data in routes
Route::get('/demo/{num}',function($num){
    return $num*$num;
});

//Calling controller function

Route::get('/usingController',[demoController::class,'category']);


Route::get('/register',[homeController::class,'registerPage']);


Route::post('/register',[homeController::class,'register'])->name('register');

Route::get('/login',[homecontroller::class,'loginPage']);

Route::post('loginAttempt',[homeController::class,'loginAttempt'])->name('loginAttempt');