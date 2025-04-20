<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

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
 
Route::post('/shorten', [ShortUrlController::class, 'store']);
Route::get('/shorten/{shortCode}', [ShortUrlController::class, 'show']);
Route::put('/shorten/{shortCode}', [ShortUrlController::class, 'update']);
Route::delete('/shorten/{shortCode}', [ShortUrlController::class, 'destroy']);
Route::get('/shorten/{shortCode}/stats', [ShortUrlController::class, 'stats']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
