<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// --- AUTENTIKASI ---

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login'); // Login Form
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
// Keterangan: Jika Anda menggunakan tombol/link GET untuk logout di view,
// Anda harus mengubah method di sini menjadi Route::get('logout', ...)

// --- MIDDLEWARE CEK LOGIN DAN HAK AKSES ---
Route::middleware(['adminAuth'])->group(function () {

    // DASHBOARD
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // MASTER DATA (Resource)
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('suppliers', SupplierController::class);

});


// DEFAULT ROUTE
Route::get('/', function () {
    return redirect()->route('login');
});
