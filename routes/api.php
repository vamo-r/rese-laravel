<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ShopsController;
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
    // 新規登録
    Route::post('/register', [RegisteredUserController::class, 'store']);
    // ログイン
    Route::post('/login', [AuthController::class, 'store']);
    // ログアウト
    Route::post('/logout', [AuthController::class, 'destroy']);
    // トークンリフレッシュ
    Route::get('/refresh', [AuthController::class, 'refresh']);
    // ユーザー情報取得
    Route::get('/user', [AuthController::class, 'index']);
    // 店舗一覧取得
    Route::get('/shops', [ShopsController::class, 'index']);
    // 店舗詳細取得
    Route::get('/shops/{shop_id}', [ShopsController::class, 'show']);
    // お気に入り一覧取得
    Route::get('/like', [LikesController::class, 'index']);
    // お気に入り登録/削除
    Route::post('/like', [LikesController::class, 'store']);
    // 予約一覧取得
    Route::get('/reservation', [ReservationsController::class, 'index']);
    // 予約登録
    Route::post('/reservation', [ReservationsController::class, 'store']);
    // 予約削除
    Route::delete('/reservation', [ReservationsController::class, 'destroy']);
});
