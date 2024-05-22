<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegistersController;
use App\Http\Controllers\Auth\LoginController;

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

Route::group([
    'middleware' => 'guest:api',
    'prefix' => 'auth',
], function () {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('register', [RegistersController::class, 'register']);
});

Route::get('users', [UserController::class, 'index']);
// Route::group([
//     'prefix' => 'products',
// ], function() {
//     Route::get('index', [ProductsController::class, 'index']);
//     Route::post('create', [ProductsController::class, 'create']);
//     Route::get('edit/{id}', [ProductsController::class, 'edit']);
//     Route::put('update/{id}', [ProductsController::class, 'update']);
//     Route::delete('delete/{id}', [ProductsController::class, 'delete']);
// });
Route::middleware(['checklogin'])->group(function () {
    Route::prefix('products')->group(function() {
        Route::get('index', [ProductsController::class, 'index']);
        Route::post('create', [ProductsController::class, 'create']);
        Route::get('edit/{id}', [ProductsController::class, 'edit']);
        Route::put('update/{id}', [ProductsController::class, 'update']);
        Route::delete('delete/{id}', [ProductsController::class, 'delete']);
    });
});