<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\RecipeController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('/users/{id}', [AuthController::class, 'getUser']);
    /*  Route::post('create-list', ) */
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('create-list/{id}', [ListController::class, 'store']);
Route::delete('delete-list/{id}', [ListController::class, 'destroy']);
Route::get('get-list/{id}', [ListController::class, 'showList']);
Route::get('get-recipe/{id}', [RecipeController::class, 'getRecipe']);
Route::post('recipe-list/{id}', [RecipeController::class, 'addRecipe']);
Route::delete('delete-recipe/{id}', [RecipeController::class, 'deleteRecipe']);
