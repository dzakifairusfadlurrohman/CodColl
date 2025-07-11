<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('posts')->group(function () {
    Route::get('/', [PostApiController::class, 'index']);

    Route::get('/{slug}', [PostApiController::class, 'show']);
});