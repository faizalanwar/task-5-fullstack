<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ArticlesController;
use App\Http\Controllers\Api\V1\CategoriesController;

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

Route::apiResources([
    'categories' => CategoriesController::class,
    'articles' => ArticlesController::class
], [
    'middleware' => 'auth:api'
]);