<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\MobileBankingController;
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
/*Login|Resigter Route */
Route::group(['middleware' => 'UnknownUser'],function(){
    Route::get('/',[AuthenticationController::class,'signInForm'])->name('signInForm');
    Route::post('/login',[AuthenticationController::class,'signIn'])->name('logIn');
});
Route::get('/logout',[AuthenticationController::class,'signOut'])->name('logOut');
Route::get('/registration_form',[AuthenticationController::class,'signUpForm'])->name('registration_form');
Route::post('/registration',[AuthenticationController::class,'signUp'])->name('registration');

/*Superadmin Group*/
Route::group(['middleware' => 'isSuperAdmin'],function(){
    Route::prefix('superadmin')->group(function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name('superadminDashboard');
        Route::resource('/mobilebanking',MobileBankingController::class,["as" => "superadmin"]);
    });
});

/*User Group*/
Route::group(['middleware' => 'isUser'],function(){
    Route::prefix('user')->group(function(){
        Route::get('/dashboard',[DashboardController::class,'userindex'])->name('userDashboard');
        Route::resource('/wallet',WalletController::class,["as" => "user"]);
    });
});













/*Route::get('/', function () {
    return view('dashboard.superadmin_dashboard');
});*/
/*Route::get('/test-page',function(){
	return view('test');
});*/
//Artisan::call('storage:link');
//Route::get('/',[PostController::class,'viewPosts'])->name('all.posts');
/*Route::get('add/post',[PostController::class,'addPost'])->name('add.post');
Route::post('add/post',[PostController::class,'savePost'])->name('add.post');
Route::get('edit/post/{id}',[PostController::class,'editPost'])->name('edit.post');
Route::post('update/post/{id}',[PostController::class,'updatePost'])->name('update.post');
Route::post('delete/post/{id}',[PostController::class,'deletePost'])->name('delete.post');*/

/*Resource Controller*/
/*Route::resource('/student',StudentController::class);
Route::resource('/studentClass',StudentClassController::class);*/

/*AuthController*/
/*Route::get('/username',[AuthController::class,'set']);
Route::get('/get-username',[AuthController::class,'get']);
Route::get('/get-username-test',[TestController::class,'get']);
Route::get('/check',[AuthController::class,'check']);
Route::get('/session-flush',[AuthController::class,'session_destroy']);

Route::get('/login',[AuthController::class,'userLogin']);
Route::Post('/login',[AuthController::class,'userLoginPost'])->name('login');

Route::get('/check_balance',[AuthController::class,'check_balance'])->middleware('check');
Route::get('/denied',[AuthController::class,'denied'])->name('denied');*/