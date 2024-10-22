<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\LaporanController;
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
    return redirect()->route('login-guru');
});
Route::middleware(['auth:guru'])->prefix('guru')->group(function () {
    Route::get('/absen', [AbsenController::class, 'index']);
    Route::get('/absen/tambah', [AbsenController::class, 'tambah']);
    Route::post('/absen/tambah', [AbsenController::class, 'create']);
    Route::get('/absen/edit/{id}', [AbsenController::class, 'edit']);
    Route::post('/absen/log/{id}', [AbsenController::class, 'absenLog']);
    Route::put('/absen/edit/{id}', [AbsenController::class, 'editproses']);
    Route::get('/absen/delete/{id}', [AbsenController::class, 'delete']);
    Route::get('/absen/delete-log/{id}/{idAbsen}', [AbsenController::class, 'deleteLog']);
 
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

// Other routes outside the 'auth:guru' middleware group


Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/siswa/tambah', [SiswaController::class, 'tambah']);
    Route::post('/siswa/tambah', [SiswaController::class, 'create']);
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
    Route::put('/siswa/edit/{id}', [SiswaController::class, 'editproses']);
    Route::get('/siswa/delete/{id}', [SiswaController::class, 'delete']);
    Route::get('/siswa/import', [SiswaController::class, 'import']);
    Route::post('/siswa/import', [SiswaController::class, 'importPro']);

    Route::get('/jadwal', [JadwalController::class, 'index']);
    Route::get('/jadwal/tambah', [JadwalController::class, 'tambah']);
    Route::post('/jadwal/tambah', [JadwalController::class, 'create']);
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit']);
    Route::put('/jadwal/edit/{id}', [JadwalController::class, 'editproses']);
    Route::get('/jadwal/delete/{id}', [JadwalController::class, 'delete']);

    Route::get('/admin', [UsersController::class, 'index']);
    Route::get('/admin/tambah', [UsersController::class, 'tambah']);
    Route::post('/admin/tambah', [UsersController::class, 'create']);
    Route::get('/admin/edit/{id}', [UsersController::class, 'edit']);
    Route::put('/admin/edit/{id}', [UsersController::class, 'editproses']);
    Route::get('/admin/delete/{id}', [UsersController::class, 'delete']);

    Route::get('/guru', [GuruController::class, 'index_guru']);
    Route::get('/guru/tambah', [GuruController::class, 'tambah']);
    Route::post('/guru/tambah', [GuruController::class, 'create']);
    Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);
    Route::put('/guru/edit/pro/{id}', [GuruController::class, 'editproses']);
    Route::get('/guru/delete/{id}', [GuruController::class, 'delete']);
    Route::get('/guru/import', [GuruController::class, 'import']);
    Route::post('/guru/import', [GuruController::class, 'importPro']);

    Route::get('/kelas', [KelasController::class, 'index']);
    Route::get('/kelas/tambah', [KelasController::class, 'tambah']);
    Route::post('/kelas/tambah', [KelasController::class, 'create']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
    Route::put('/kelas/update/{id}', [KelasController::class, 'editproses']);
    Route::get('/kelas/delete/{id}', [KelasController::class, 'delete']);

    Route::get('/mapel', [MataPelajaranController::class, 'index']);
    Route::get('/mapel/tambah', [MataPelajaranController::class, 'tambah']);
    Route::post('/mapel/tambah', [MataPelajaranController::class, 'create']);
    Route::get('/mapel/edit/{id}', [MataPelajaranController::class, 'edit']);
    Route::put('/mapel/update/{id}', [MataPelajaranController::class, 'editproses']);
    Route::get('/mapel/delete/{id}', [MataPelajaranController::class, 'delete']);

    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::post('/laporan', [LaporanController::class, 'prosesLaporan']);
});

Route::get('/login/admin', [AuthController::class, 'loginAdmin'])->name('login-admin');
Route::get('/login/guru', [AuthController::class, 'loginGuru'])->name('login-guru');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

