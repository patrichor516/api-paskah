<?php

use App\Http\Controllers\Api\barangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//menhubungkan antara codingan dan api agar crud dapat berfungsi | cek postman untuk isinya

// Route::get('barang',[barangController::class,'index']);
// Route::get('barang/{id}',[barangController::class,'show']);
// Route::post('barang/',[barangController::class,'store']);
// Route::put('barang/{id}',[barangController::class,'update']);
// Route::delete('barang/{id}',[barangController::class,'destroy']); 

Route::apiResource('barang',barangController::class);