<?php

use App\Http\Controllers\GuruController;
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

Route::get('/guru',[GuruController::class,'index_guru']);
Route::get('/guru/tambah',[GuruController::class,'tambah']);
Route::post('/guru/tambah',[GuruController::class,'create']);
Route::get('/guru/edit/{id}',[GuruController::class,'edit']);
Route::put('/guru/edit/pro/{id}',[GuruController::class,'editproses']);
Route::get('/guru/delete/{id}',[GuruController::class,'delete']);
Route::get('/guru/import',[GuruController::class,'import']);
Route::post('/guru/import',[GuruController::class,'importPro']);
