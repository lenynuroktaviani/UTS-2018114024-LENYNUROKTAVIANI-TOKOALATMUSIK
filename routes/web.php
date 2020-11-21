<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\KategorisController;
use App\Http\Controllers\PesanansController;
use App\Http\Controllers\PembelisController;
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
Route::get('', [CobaController::class, 'index']);
// Route::get('/items', [CobaController::class, 'index']);
// Route::get('/items/create', [CobaController::class, 'create']);
// Route::post('/items', [CobaController::class, 'store']);
// Route::post('/items/store', [CobaController::class, 'store']);
// Route::get('/items/{id}', [CobaController::class, 'show']);
// Route::get('/items/{id}/edit', [CobaController::class, 'edit']);
// Route::put('/items/{id}', [CobaController::class, 'update']);
// Route::delete('/items/{id}', [CobaController::class, 'destroy']);

Route::resources([
    'items' => CobaController::class,
    'kategoris' => KategorisController::class,
    'pesanans' => PesanansController::class,
    'pembelis' => PembelisController::class,

]);
