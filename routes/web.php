<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

Route::get('/',[ImageController::class,'index'] );
Route::post('/',[ImageController::class,'imageUpload'] )->name('image.upload');
Route::get('/display',[ImageController::class,'display'] )->name('display');
Route::get('/get-data',[ImageController::class,'getData'] )->name('get.data');
Route::get('/edit/{id}',[ImageController::class,'editForm'] )->name('edit.form');
Route::post('/edit/{id}',[ImageController::class,'updateData'] )->name('update.data');

