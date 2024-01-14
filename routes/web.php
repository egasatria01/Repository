<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route Mahasiswa --------------------------------------------------------------------------------
Route::middleware('auth')->group(function () {

});

Route::middleware('is_admin')->group(function () {
    // Route Kelola Dosen -------------------------------------------------------------------------

    // Route Kelola Mahasiswa ---------------------------------------------------------------------
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');
    Route::post('/admin/mahasiswa', [MahasiswaController::class, 'tambah'])->name('tambah.mahasiswa');
    Route::patch('/admin/mahasiswa/ubah', [MahasiswaController::class, 'ubah'])->name('ubah.mahasiswa');
    Route::get('admin/ajaxadmin/dataMahasiswa/{id}', [MahasiswaController::class, 'getDataMahasiswa']);
    Route::get('/admin/mahasiswa/hapus/{id}', [MahasiswaController::class,'hapus'])->name('hapus.mahasiswa');

    // Route Skripsi ------------------------------------------------------------------------------

});