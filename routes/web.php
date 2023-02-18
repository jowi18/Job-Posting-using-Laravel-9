<?php

use App\Http\Controllers\ListingsController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\UsersController;
use App\Models\Listing;
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

Route::get('/', [ListingsController::class, 'index'] );
Route::get('/joblist/show/{listing}', [ListingsController::class, 'show'])->middleware('auth');
Route::get('/joblist/create',[ListingsController::class, 'create'])->middleware('auth');
Route::post('/joblist/store',[ListingsController::class, 'store'])->middleware('auth');
Route::get('/joblist/edit/{listing}', [ListingsController::class, 'edit'])->middleware('auth');
Route::put('/joblist/update/{listing}', [ListingsController::class, 'update']);
Route::delete('/joblist/destroy/{listing}', [ListingsController::class, 'destroy'])->middleware('auth');
Route::get('joblist/manage/{listing}', [ListingsController::class, 'manage'])->middleware('auth');

Route::get('/user/create', [ApplicantController::class, 'create'])->middleware('guest');
Route::post('/user/store', [ApplicantController::class, 'store']);
Route::post('/user/logout', [ApplicantController::class, 'logout']);
Route::get('/user/login', [ApplicantController::class, 'login'])->name('login')->middleware('guest');
Route::post('/user/process', [ApplicantController::class, 'process']);

