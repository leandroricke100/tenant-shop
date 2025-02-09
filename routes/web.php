<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Index\IndexAdminController;
use App\Http\Controllers\Index\IndexMerchantController;
use App\Http\Controllers\Index\IndexWebsiteController;

// Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/dashboard', [AuthController::class, 'showDashboard'])->name('dashboard')->middleware('auth');
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::post('/api/{model?}', function ($model = null) {
    $controller = "App\Http\Controllers\Api\Api" . $model;
    if (class_exists($controller)) return app()->call($controller);
    return response()->json(['status' => false, 'msg' => 'Controller não encontrado!'], 404);
});

// Admin
Route::get('/admin/{c1?}/{c2?}/{c3?}/{c4?}', IndexAdminController::class)->name('admin');

Route::get('/merchant/{c1?}/{c2?}/{c3?}/{c4?}', IndexMerchantController::class)->name('merchant');

// // Website
Route::get('/{c1?}/{c2?}/{c3?}/{c4?}', IndexWebsiteController::class)->name('website');
