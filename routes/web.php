<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home'); // Trang chủ
Route::get('/lien-he', [HomeController::class, 'contact'])->name('contact'); // Trang liên hệ
Route::get('/tuyen-dung', [HomeController::class, 'recruitment'])->name('recruitment'); // Trang tuyển dụng

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



