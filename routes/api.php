<?php

use App\Http\Controllers\Api\ArticlesController;
use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function () {
    Route::post('login', [UserController::class, 'login']);
    Route::post('register', [UserController::class, 'register']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('details', [UserController::class, 'details']);
        Route::post('logout', [UserController::class, 'logout']);
        Route::apiResources([
            'categories' => CategoriesController::class,
            'articles' => ArticlesController::class,
        ]);
    });
});
