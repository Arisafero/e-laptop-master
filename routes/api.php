<?php


use App\Http\Controllers\PesananApiController;
use App\Http\Controllers\AuthRegController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\KeranjangApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum','checkrole:user'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/merek', [ApiController::class, 'merek']);
Route::get('/produk', [ApiController::class, 'produk']);
Route::get('/bank', [ApiController::class, 'bank']);
Route::get('/pengiriman', [ApiController::class, 'pengiriman']);
Route::get('/bannerSatu', [ApiController::class, 'bannerSatu']);
Route::get('/bannerDua', [ApiController::class, 'bannerDua']);
Route::resource('/keranjang', KeranjangApiController::class);


Route::post('/pesanan', [PesananApiController::class, 'store']);

Route::post('/register', [AuthRegController::class, 'register']);