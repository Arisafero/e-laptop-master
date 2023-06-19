<?php


use App\Http\Controllers\KeranjangController;

use App\Http\Controllers\MerekController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::post('/login', [AuthController::class,'loginProses'])->name('login.Proses');
Route::get('/register', [AuthController::class,'register'])->name('register');
Route::post('/register', [AuthController::class,'registerStore'])->name('register.Store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');


Route::get('/', function () {
    return view('app');
});

Route::group(['middleware' => ['auth', 'checkrole:admin']], function(){
    Route::resource('/merek', MerekController::class)->except(['show']);
    Route::resource('/produk', ProdukController::class);
    Route::resource('/bank', BankController::class);
    Route::resource('/pengiriman', PengirimanController::class);

    Route::get('/banner/{angka}', [BannerController::class, 'index']);
    Route::get('/banner/create/{angka}', [BannerController::class, 'create']);
    Route::post('/banner/{angka}', [BannerController::class, 'store']);
    Route::get('/banner/{id}/edit/{angka}', [BannerController::class, 'edit']);
    Route::delete('/banner/{id}/{angka}', [BannerController::class, 'destroy']);
});

