<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostsController;
use App\Http\Controllers\API\AuthorsController;
use App\Http\Controllers\API\CommentsController;
use App\Http\Controllers\API\Auth\LoginController;

// Authenticate the provided user and issue a token to be used for making authenticated API calls.
Route::group(['prefix' => 'token', 'middleware' => 'guest'], static function () {
    Route::post('/', [LoginController::class, 'authenticate']);
});

// TODO: - Once, you've protected the API resources belo, add a route to logout
//       - the currently authenticated user. Make sure that the logout route is
//       - accessible by the authenticated user.

// TODO: - These routes are currently accessible to guests.
//       - Make sure these routes are only accessible by authenticated users.
Route::apiResource('authors', AuthorsController::class);
Route::apiResource('comments', CommentsController::class);
Route::apiResource('posts', PostsController::class);
