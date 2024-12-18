<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home'); // Trang chủ


Route::get('/linh-vuc-kinh-doanh', [HomeController::class, 'business'])->name('business'); // Trang lĩnh vực kinh doanh
Route::get('/linh-vuc-kinh-doanh/{slug}', [HomeController::class, 'businessDetail'])->name('business.detail'); // Trang lĩnh vực kinh doanh

Route::get('/dong-san-pham', [HomeController::class, 'product'])->name('product'); // Trang dòng sản phẩm
Route::get('/dong-san-pham/{slug}', [HomeController::class, 'productDetail'])->name('product.detail'); // Trang dòng sản phẩm chi tiết



Route::get('/lien-he', [HomeController::class, 'contact'])->name('contact'); // Trang liên hệ

Route::post('/dataUser', [HomeController::class, 'dataUser'])->name('dataUser');
Route::get('/tuyen-dung', [HomeController::class, 'recruitment'])->name('recruitment'); // Trang tuyển dụng
Route::get('/tuyen-dung/{slug}', [HomeController::class, 'recruitmentDetail'])->name('recruitment.detail'); // Trang tuyển dụng

Route::get('/truyen-thong', [HomeController::class, 'communication'])->name('communication'); // Trang truyền thông
Route::get('/truyen-thong/{slug}', [HomeController::class, 'communicationDetail'])->name('communication.detail'); // Trang truyền thông

Route::get('/kien-thuc', [HomeController::class, 'knowledge'])->name('knowledge'); // Trang kiến thức
Route::get('/kien-thuc/{slug}', [HomeController::class, 'knowledgeDetail'])->name('knowledge.detail'); // Trang kiến thức

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Xem chi tiết bài viết
Route::get("/post/{slug}", [HomeController::class, 'postDetail'])->name('post.detail');


// command
Route::prefix('command')->group(function () {
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');

        return "Cache cleared successfully";
    });
    Route::get('/optimize', function () {
        Artisan::call('optimize');

        return "Optimized successfully";
    });

    Route::get('/storage-link', function () {
        Artisan::call('storage:link');

        return "Storage link created successfully";
    });
});


