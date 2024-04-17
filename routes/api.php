<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Models\Review;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




/**
 * Authentication
 */
Route::post('register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('login', 'App\Http\Controllers\Api\AuthController@login');
Route::put('forget-password', 'App\Http\Controllers\Api\AuthController@forgetPassword');

/**
 * User
 */
Route::get('users', [UserController::class, 'index']);

/**
 * Book
 */
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::post('/books', [BookController::class, 'store']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);
});

/**
 * Author
 */
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('/authors/{id}', [AuthorController::class, 'update']);
    Route::post('/authors', [AuthorController::class, 'store']);
    Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);
});

/**
 * Review
 */
Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}', [ReviewController::class, 'show']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    // get reviews from a book
    Route::get('/reviews/book/{id}', [ReviewController::class, 'fromBook']);

    // get reviews from a user
    Route::get('/reviews/user/own-reviews', [ReviewController::class, 'fromUser']);

    Route::put('/reviews/{id}', [ReviewController::class, 'update']);
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);
});

