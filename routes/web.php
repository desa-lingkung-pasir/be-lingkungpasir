<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PerangkatController;
use App\Http\Controllers\PengumumanController;

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

Route::get('/', [AuthController::class, 'login']);
Route::post('/check-login', [AuthController::class, 'check_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [WebController::class, 'index'])->middleware(['auth', 'checkRole:admin']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/create', [ProfileController::class, 'create']);
Route::post('/store', [ProfileController::class, 'store']);
Route::get('/profile/edit/{id}', [ProfileController::class, 'edit']);
Route::put('/profile/update/{id}', [ProfileController::class, 'update']);
Route::put('/profile/delete/{id}', [ProfileController::class, 'update']);

// Data Jabatan
Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    Route::get('/position', [PositionController::class, 'index']);
    Route::post('/position/store', [PositionController::class, 'store']);
    Route::get('/position/edit/{id}', [PositionController::class, 'edit']);
    Route::put('/position/update/{id}', [PositionController::class, 'update']);
    Route::get('/position/delete/{id}', [PositionController::class, 'store']);
});

//Data Perangkat Desa
Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    Route::get('/perangkat-desa', [PerangkatController::class, 'index']);
    Route::post('/perangkat-desa/store', [PerangkatController::class, 'store']);
    Route::get('/perangkat-desa/edit/{id}', [PerangkatController::class, 'edit']);
    Route::put('/perangkat-desa/update/{id}', [PerangkatController::class, 'update']);
    Route::get('/perangkat-desa/delete/{id}', [PerangkatController::class, 'delete']);
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function() {
    Route::get('/pengumuman', [PengumumanController::class, 'index']);
    Route::post('/pengumuman/post', [PengumumanController::class, 'post']);
    Route::get('/pengumuman/edit/{id}', [PengumumanController::class, 'edit']);
    Route::put('/pengumuman/update/{id}', [PengumumanController::class, 'update']);
    Route::get('/pengumuman/delete/{id}', [PengumumanController::class, 'delete']);
});