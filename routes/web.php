<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
    return redirect()->intended('/beranda');
});

Route::get('/beranda',[UserController::class,'beranda']);
Route::group(['middleware'=>'guest'],function(){
    Route::get('/login',[AuthController::class,'loginView'])->name('login');
    Route::post('/login',[AuthController::class,'authenticate']);
});

Route::group(['middleware'=>'auth'],function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/editProfile',[UserController::class,'editProfileView']);
    Route::post('/editProfile',[UserController::class,'updateProfile']);
    Route::post('/post',[PostController::class,'store']);
    Route::post('/post/{id}/comment',[CommentController::class,'store']);
    Route::delete('/post/{id}',[PostController::class,'delete']);
    Route::get('/post/explore',[PostController::class,'explore']);
    Route::get('/post/{id}',[PostController::class,'show']);
    Route::delete('/comment/{id}',[CommentController::class,'delete']);
    Route::put('/post/{id}',[PostController::class,'update']);
    Route::put('/comment/{id}',[CommentController::class,'update']);
});
