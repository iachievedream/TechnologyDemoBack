<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/todo', [TodoListController::class, 'index']);

// Route::resource('todo', TodoListController::class)->only([
//     'index', 'show'
// ]);

// Route::resource('todo', TodoListController::class)->except([
//     'create', 'store', 'update', 'destroy'
// ]);
Route::apiResource('todo', TodoListController::class);

