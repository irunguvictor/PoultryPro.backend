<?php

use App\Http\Controllers\Api\EggDetailController;
use App\Http\Controllers\Api\HealthLogController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\SalesExpenseController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use Illuminate\Support\Facades\Route;

// Authentication Routes (Protected)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// Public API Routes
Route::apiResources([
    'reports' => ReportController::class,
    'sales-expenses' => SalesExpenseController::class,
    'health-logs' => HealthLogController::class,
    'stocks' => StockController::class,
    'egg-details' => EggDetailController::class,
    'feeds' => FeedController::class,
], ['only' => ['index', 'store']]);
