<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('template');
});

Route::get('/siswa',[SiswaController::class,'index']);
Route::get('/siswa/tambah',[SiswaController::class,'tambah']);
Route::post('/siswa/tambah',[SiswaController::class,'create']);
Route::get('/siswa/edit/{id}',[SiswaController::class,'edit']);
Route::put('/siswa/edit/{id}',[SiswaController::class,'editproses']);
Route::get('/siswa/delete/{id}',[SiswaController::class,'delete']);
Route::get('/siswa/import',[SiswaController::class,'import']);
Route::post('/siswa/import',[SiswaController::class,'importPro']);
