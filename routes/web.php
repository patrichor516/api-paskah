<?php

use App\Http\Controllers\barangController;
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

Route::get('barang', [barangController::class, 'index']);
Route::post('barang', [barangController::class, 'store']);
Route::get('barang/{id}', [barangController::class, 'edit']);
Route::put('barang/{id}', [barangController::class, 'update']);
Route::delete('barang/{id}', [barangController::class, 'destroy']);