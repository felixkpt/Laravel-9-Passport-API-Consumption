<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\API\UserController;
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

// Products routes      
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);

// Tasks routes
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::put('/tasks/update-reminder/{id}', [TaskController::class, 'updateReminder']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
 
// Cars routes
Route::get('/cars', [App\Http\Controllers\CarController::class, 'index']);
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/cars', [App\Http\Controllers\CarController::class, 'store']);
});

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);
        
});


Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function() {
    Route::post('details', [UserController::class, 'details']);
    Route::post('logout', [UserController::class, 'logout']);
});

Route::get('/user', function (Request $request) {
    return $request->user()->makeVisible(['email']);
})->middleware(['auth:api', 'scope:get-email']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{slug}', [PostController::class, 'showBySlug']);
Route::middleware(['auth:api', 'scopes:create-posts'])->post('/posts', [PostController::class, 'store']);



