<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EggDetailController;
use App\Http\Controllers\HealthLogController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesExpenseController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FeedController; // <-- ✅ Add this

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']); // Optional

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/me', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
            'abilities' => [],
        ]);
    });

    Route::get('/sales-expenses', [SalesExpenseController::class, 'index']);
    Route::post('/sales-expenses', [SalesExpenseController::class, 'store']);

    Route::get('/health-logs', [HealthLogController::class, 'index']);
    Route::post('/health-logs', [HealthLogController::class, 'store']);

    Route::apiResources([
        'egg-details' => EggDetailController::class,
        'reports' => ReportController::class,
        'sales-expenses' => SalesExpenseController::class,
        'stocks' => StockController::class,
    ], ['only' => ['index', 'store']]);

    // 🚀 Add feeds routes
    Route::get('/feeds', [FeedController::class, 'index']);
    Route::post('/feeds', [FeedController::class, 'store']);
});
