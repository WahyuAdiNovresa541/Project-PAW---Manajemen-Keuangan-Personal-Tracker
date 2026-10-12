
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ControllerTransactionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/transactions', [ControllerTransactionController::class, 'index'])
        ->name('transactions.index');

    Route::get('/transactions/create', [ControllerTransactionController::class, 'create'])
        ->name('transactions.create');

    Route::post('/transactions', [ControllerTransactionController::class, 'store'])
        ->name('transactions.store');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
