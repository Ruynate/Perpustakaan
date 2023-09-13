<?php


use App\Http\Controllers\BarangController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
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
    return view('welcome');
});
// Route::group(['middleware'=>['auth']],function(){ });
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::get('/pengguna',[UserController::class,'list'])->name('pengguna.list');
    Route::post('/pengguna/tambah',[UserController::class,'tambahUser'])->name('pengguna.tambah');
    Route::get('/pengguna/detail/{id}',[UserController::class,'detailUser'])->name('pengguna.detail');
    Route::get('/pengguna/edit/{id}',[UserController::class,'editUser'])->name('pengguna.edit');
    Route::put('/pengguna/update/{id}',[UserController::class,'updateUser'])->name('pengguna.update');
    Route::get('/pengguna/hapus/{id}',[UserController::class,'hapusUser'])->name('pengguna.hapus');
    
    Route::get('/buku',[BukuController::class,'list'])->name('buku.list');
    Route::get('/buku/detail/{id}',[BukuController::class,'detailBuku'])->name('buku.detail');
    Route::get('/buku/edit/{id}',[BukuController::class,'editBuku'])->name('buku.edit');
    Route::put('/buku/update/{id}',[BukuController::class,'updateBuku'])->name('buku.update');
    Route::post('/buku',[BukuController::class,'tambahBuku'])->name('buku.tambah');
    Route::get('/buku/hapus/{id}',[BukuController::class,'hapusBuku'])->name('buku.hapus');
    
    Route::get('/kategori',[GenreController::class,'list'])->name('genre.list');
    Route::post('/genre/tambah',[GenreController::class,'tambahGenre'])->name('genre.tambah');
    Route::get('/genre/detail/{id}',[GenreController::class,'detailGenre'])->name('genre.detail');
    Route::put('/genre/update/{id}',[GenreController::class,'updateGenre'])->name('genre.update');
    Route::get('/genre/edit/{id}',[GenreController::class,'editGenre'])->name('genre.edit');
    Route::get('/genre/hapus/{id}',[GenreController::class,'hapusGenre'])->name('genre.hapus');
    
    Route::get('/gudang',[GudangController::class,'list'])->name('gudang.list');
    Route::post('/gudang/tambah',[GudangController::class,'tambahGudang'])->name('gudang.tambah');
    Route::get('/gudang/detail/{id}',[GudangController::class,'detailGudang'])->name('gudang.detail');
    Route::put('/gudang/update/{id}',[GudangController::class,'updateGudang'])->name('gudang.update');
    Route::get('/gudang/edit/{id}',[GudangController::class,'editGudang'])->name('gudang.edit');
    Route::get('/gudang/hapus/{id}',[GudangController::class,'hapusGudang'])->name('gudang.hapus');

    Route::get('/scan',[TransaksiController::class,'scan'])->name('scan');
    Route::post('/scan',[TransaksiController::class,'simpanTransaksi'])->name('scan.simpan');

    Route::get('/logout',[LoginController::class,'logout'])->name('logout');

    Route::get('/login',[LoginController::class,'login'])->name('login');
    Route::post('/login',[LoginController::class,'procLogin'])->name('proc.login');