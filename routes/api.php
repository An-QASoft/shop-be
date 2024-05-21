<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('users', [UserController::class, 'index']);
Route::group([
    'prefix' => 'products',
], function() {
    Route::get('index', [ProductsController::class, 'index']);
    Route::post('create', [ProductsController::class, 'create']);
    Route::get('edit/{id}', [ProductsController::class, 'edit']);
    Route::put('update/{id}', [ProductsController::class, 'update']);
    Route::delete('delete/{id}', [ProductsController::class, 'delete']);
});