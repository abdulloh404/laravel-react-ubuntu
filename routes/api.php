<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ตัวอย่างเส้นทาง API
Route::get('/example', function () {
    return response()->json([
        'message' => 'This is an example API route!',
    ]);
});

Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::post('/users', [App\Http\Controllers\UserController::class, 'store']);
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show']);
Route::put('/users/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users/{id}', [App\Http\Controllers\UserController::class, 'destroy']);



