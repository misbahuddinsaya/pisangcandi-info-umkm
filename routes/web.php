<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelakuController;
use App\Http\Controllers\ProdukKonsumen;
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

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', [ProdukKonsumen::class, 'dashboard']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/produk-UMKM', [ProdukKonsumen::class, 'index'])->name('produk');
Route::get('/produk-UMKM/filter', [ProdukKonsumen::class, 'filter'])->name('produk-UMKM.filter');
Route::get('/produk-UMKM/info/{id}', [ProdukKonsumen::class, 'detail'])->name('produk-info');
Route::get('/profile-umkm', [PelakuController::class, 'index'])->name('pelaku-umkm');
Route::get('/profile-admin', [AdminController::class, 'index'])->name('admin-umkm');
// Simpan Produk
Route::post('/simpan-produk', [PelakuController::class, 'simpan'])->name('simpan-produk');
Route::post('/daftar-umkm', [PelakuController::class, 'index'])->name('daftar-umkm');
Route::post('/simpan-umkm', [PelakuController::class, 'simpanUmkm'])->name('simpan-umkm');
Route::post('/simpan-user', [AdminController::class, 'simpanUser'])->name('simpan-user');
Route::get('/produk-UMKM/search', [ProdukKonsumen::class, 'search'])->name('produk-search');
Route::get('/produk-UMKM/{id}', [PelakuController::class, 'deleteData'])->name('produk-hapus');
Route::get('/produk-UMKM/edit/{id}', [PelakuController::class, 'editData'])->name('produk-edit');
Route::get('/detail-umkm/{id}', [PelakuController::class, 'detailUmkm'])->name('umkm-detail');
Route::get('/profile-admin/hapus-umkm/{id}', [AdminController::class, 'hapusUmkm'])->name('umkm-hapus');
Route::post('/login-user', [AuthController::class, 'login'])->name('login-user');
Route::get('/logout-user', [AuthController::class, 'logout'])->name('logout-user');
