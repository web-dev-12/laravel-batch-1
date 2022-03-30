<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
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

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/test-page',function(){
	return view('test');
});*/
Route::get('/',[PostController::class,'viewPosts'])->name('all.posts');
Route::get('add/post',[PostController::class,'addPost'])->name('add.post');
Route::post('add/post',[PostController::class,'savePost'])->name('add.post');
Route::get('edit/post/{id}',[PostController::class,'editPost'])->name('edit.post');
Route::post('update/post/{id}',[PostController::class,'updatePost'])->name('update.post');
Route::post('delete/post/{id}',[PostController::class,'deletePost'])->name('delete.post');

/*Resource Controller*/

Route::resource('/student',StudentController::class);