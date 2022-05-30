<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\WordController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('words', [WordController::class, 'index']);
Route::get('words/{word}', [WordController::class, 'show']);
Route::get('list', [WordController::class, 'list']);

Route::get('image/{w?}/{h?}', [ImageController::class, 'show']);