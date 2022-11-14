<?php

use App\Http\Controllers\LendingController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::post('/register', [UserController::class, 'store']);

    Route::post('login', [UserController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/profile/edit', [UserController::class, 'update']);

    Route::post('/borrow-book', [LendingController::class, 'store']);

    Route::put('/return-book', [LendingController::class, 'update']);

    Route::post('/logout', [UserController::class, 'logout']);

    // users can see how many books borrowed (by self)
    Route::get('/borrow/index', [LendingController::class, 'index']);

    // users can see how many books returned (by self)
    Route::get('/return/index', [LendingController::class, 'returnindex']);

    // users can upgrade their plans
    Route::post('/plan/subscribe', [PlanController::class, 'store']);

    // users can see their previous subscriptions
    Route::get('/plans/index', [PlanController::class, 'index']);
});
