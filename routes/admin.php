<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FieldController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\RecruitmentController;
use App\Http\Controllers\Admin\Setting\AddressController;
use App\Http\Controllers\Admin\Setting\BannerController;
use App\Http\Controllers\Admin\Setting\ConfigController;
use App\Http\Controllers\Admin\Setting\LanguagueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/', [AdminController::class, 'index'])->name('admin.homepage');
    // Quản lý bài viết
    Route::prefix('post')->group(function () {
        Route::get('/{type}', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('/{type}/add', [PostController::class, 'create'])->name('admin.post.add');
        Route::post('/{type}/store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/{type}/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::post('/{type}/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
        Route::get('/{type}/delete', [PostController::class, 'destroy'])->name('admin.post.destroy');
    });
    // Danh mục
    Route::prefix('category')->group(function () {
        Route::get('/{type}', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('/{type}/add', [CategoryController::class, 'create'])->name('admin.category.add');
        Route::post('/{type}/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/{type}/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/{type}/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/{type}/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });

    // Quản lý sản phẩm
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/add', [ProductController::class, 'create'])->name('admin.product.add');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/delete', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    });

    // Quản lý đối tác
    Route::prefix('partner')->group(function () {
        Route::get('/', [PartnerController::class, 'index'])->name('admin.partner.index');
        Route::get('/add', [PartnerController::class, 'create'])->name('admin.partner.add');
        Route::post('/store', [PartnerController::class, 'store'])->name('admin.partner.store');
        Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('admin.partner.edit');
        Route::post('/update/{id}', [PartnerController::class, 'update'])->name('admin.partner.update');
        Route::get('/delete/{id}', [PartnerController::class, 'destroy'])->name('admin.partner.destroy');
    });

    // Quản lý dự án
    Route::prefix('project')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/add', [ProjectController::class, 'create'])->name('admin.project.add');
        Route::post('/store', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::post('/update/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::post('/delete', [ProjectController::class, 'destroy'])->name('admin.project.destroy');
    });

    // Quản lý lĩnh vực kinh doanh
    Route::prefix('field')->group(function () {
        Route::get('/', [FieldController::class, 'index'])->name('admin.field.index');
        Route::get('/add', [FieldController::class, 'create'])->name('admin.field.add');
        Route::post('/store', [FieldController::class, 'store'])->name('admin.field.store');
        Route::get('/edit/{id}', [FieldController::class, 'edit'])->name('admin.field.edit');
        Route::post('/update/{id}', [FieldController::class, 'update'])->name('admin.field.update');
        Route::get('/delete/{id}', [FieldController::class, 'destroy'])->name('admin.field.destroy');
    });

    // Quản lý tài khoản
    Route::prefix('account')->group(function () {

        Route::get('/', [AccountController::class, 'index'])->name('admin.account.index');
        Route::get('/add', [AccountController::class, 'create'])->name('admin.account.add');
        Route::post('/store', [AccountController::class, 'store'])->name('admin.account.store');
        Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('admin.account.edit');
        Route::patch('/update/{id}', [AccountController::class, 'update'])->name('admin.account.update');
        Route::delete('/delete', [AccountController::class, 'destroy'])->name('admin.account.destroy');
    });

    Route::prefix('recruitment')->group(function () {

        Route::get('/', [RecruitmentController::class, 'index'])->name('admin.recruitment.index');
        Route::get('/add', [RecruitmentController::class, 'create'])->name('admin.recruitment.add');
        Route::post('/store', [RecruitmentController::class, 'store'])->name('admin.recruitment.store');
        Route::get('/edit/{id}', [RecruitmentController::class, 'edit'])->name('admin.recruitment.edit');
        Route::patch('/update/{id}', [RecruitmentController::class, 'update'])->name('admin.recruitment.update');
        Route::delete('/delete', [RecruitmentController::class, 'destroy'])->name('admin.recruitment.destroy');
    });

    // setting route group
    Route::prefix('settings')->group(function () {
        // Cấu hình
        Route::prefix('config')->group(function () {
            Route::get('/', [ConfigController::class, 'index'])->name('admin.setting.config.index');
            Route::post('/update', [ConfigController::class, 'update'])->name('admin.setting.config.store');
        });

        // Banner
        Route::prefix('banner')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('admin.setting.banner.index');
            Route::get('/add', [BannerController::class, 'create'])->name('admin.setting.banner.add');
            Route::post('/store', [BannerController::class, 'store'])->name('admin.setting.banner.store');
            Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('admin.setting.banner.edit');
            Route::post('/update/{id}', [BannerController::class, 'update'])->name('admin.setting.banner.update');
            Route::get('/delete/{id}', [BannerController::class, 'destroy'])->name('admin.setting.banner.destroy');
        });

        // Địa chỉ
        Route::prefix('address')->group(function () {
            Route::get('/', [AddressController::class, 'index'])->name('admin.setting.address.index');
            Route::get('/add', [AddressController::class, 'create'])->name('admin.setting.address.add');
            Route::post('/store', [AddressController::class, 'store'])->name('admin.setting.address.store');
            Route::get('/edit/{id}', [AddressController::class, 'edit'])->name('admin.setting.address.edit');
            Route::post('/update/{id}', [AddressController::class, 'update'])->name('admin.setting.address.update');
            Route::get('/delete/{id}', [AddressController::class, 'destroy'])->name('admin.setting.address.destroy');
        });

        // Ngôn ngữ
        Route::prefix('language')->group(function () {
            Route::get('/', [LanguagueController::class, 'index'])->name('admin.setting.language.index');
            Route::get('/add', [LanguagueController::class, 'create'])->name('admin.setting.language.add');
            Route::post('/store', [LanguagueController::class, 'store'])->name('admin.setting.language.store');
            Route::get('/edit/{id}', [LanguagueController::class, 'edit'])->name('admin.setting.language.edit');
            Route::post('/update/{id}', [LanguagueController::class, 'update'])->name('admin.setting.language.update');
            Route::get('/delete/{id}', [LanguagueController::class, 'destroy'])->name('admin.setting.language.destroy');
        });

    });

    Route::prefix('media')->group(function (){
        Route::get('/files', function(){
            return view('admin.content.media.files', [
                'page' => 'files-manager'
            ]);
        })->name('admin.media.files.index');
    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

});


require __DIR__.'/auth.php';
