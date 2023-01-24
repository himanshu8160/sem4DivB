<?php

use App\Http\Controllers\categoryController;
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



//How to pass data in routes
Route::get('/demo/{num}',function($num){
    return $num*$num;
});

//Calling controller function

Route::get('/usingController',[demoController::class,'category']);


Route::get('/register',[homeController::class,'registerPage'])->name('registerPage');


Route::post('/register',[homeController::class,'register'])->name('register');

Route::get('/login',[homecontroller::class,'loginPage'])->name('loginPage');
Route::get('/dashboard',[homecontroller::class,'dashboard'])->name('dashboard');
Route::post('loginAttempt',[homeController::class,'loginAttempt'])->name('loginAttempt');
Route::get('/sendemail', [homeController::class, 'sendEmail']);
Route::get('/forgotPassword', [homeController::class, 'forgotPasswordPage'])->name('forgotPasswordPage');
Route::post('/forgotPasswordAttempt', [homeController::class, 'forgotPasswordAttempt'])->name('forgotPasswordAttempt');
Route::get('/askOtp', [homeController::class, 'askOtp'])->name('askOtp');
Route::post('/matchOtp', [homeController::class, 'matchOtp'])->name('matchOtp');

Route::middleware('auth')->group(function(){
    Route::prefix('category')->name('category.')->group(function(){
        Route::get('/', [categoryController::class, 'index'])->name('index');
        Route::get('/create', [categoryController::class, 'create'])->name('create');
        Route::get('/show/{id}', [categoryController::class, 'show'])->name('show');
        Route::post('/store', [categoryController::class, 'store'])->name('store');
        Route::get('/destroy/{id}', [categoryController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [categoryController::class, 'edit'])->name('edit');
        Route::post('/update', [categoryController::class, 'update'])->name('update');
        Route::get('/bulkUpload', [categoryController::class, 'bulkUpload'])->name('bulkUpload');
        Route::post('/bulkUploadAttempt', [categoryController::class, 'bulkUploadAttempt'])->name('bulkUploadAttempt');
    });
});
