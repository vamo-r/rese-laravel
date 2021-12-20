<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::group(['middleware' => ['api']], function() {
    // ログイン
    Route::post('/login', [AuthController::class, 'store']);
    // ログアウト
    Route::post('/logout', [AuthController::class, 'destroy']);
    // トークンリフレッシュ
    Route::get('/refresh', [AuthController::class, 'refresh']);
    // ユーザー情報取得
    Route::get('/user', [AuthController::class, 'index']);
});
