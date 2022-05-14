<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
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
    return view('dashboard.superadmin_dashboard');
});
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