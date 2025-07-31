<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CustomerProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DichVuController;
use App\Http\Controllers\Admin\DichVuFaqController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\LichTuVanController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsFaqConcontroller;
use App\Http\Controllers\Admin\PhanhoiController;
use App\Http\Controllers\Admin\PhongThuyController;
use App\Http\Controllers\Admin\PhongThuyFaqController;
use App\Http\Controllers\Admin\RolesControler;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {

   Route::prefix('dashboard')->group(function () {
      Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
   });
   Route::prefix('contact')->group(function () {
      Route::get('/', [ContactController::class, 'index'])->name('contacts.admin.index');
   });

   Route::prefix('phan-hoi')->group(function () {
      Route::get('/', [PhanhoiController::class, 'index'])->name('phanhoi.admin.index'); // Danh sách tin
      Route::get('/create', [PhanhoiController::class, 'create'])->name('phanhoi.admin.create'); // Form thêm
      Route::post('/store', [PhanhoiController::class, 'store'])->name('phanhoi.admin.store'); // Lưu tin mới
      Route::get('/{phanhoi}/edit', [PhanhoiController::class, 'edit'])->name('phanhoi.admin.edit'); // Form sửa
      Route::put('/{phanhoi}', [PhanhoiController::class, 'update'])->name('phanhoi.admin.update'); // Cập nhật tin
      Route::delete('/{phanhoi}/delete', [PhanhoiController::class, 'destroy'])->name('phanhoi.admin.destroy'); // Xóa tin
   });
   Route::prefix('khach-hang-quan-ly')->group(function () {
      Route::get('/', [CustomerProfileController::class, 'index'])->name('khachhangquanly.admin.index'); // Danh sách tin
      Route::get('/create', [CustomerProfileController::class, 'create'])->name('khachhangquanly.admin.create'); // Form thêm
      Route::post('/store', [CustomerProfileController::class, 'store'])->name('khachhangquanly.admin.store'); // Lưu tin mới
      Route::get('/details/{customerProfile}', [CustomerProfileController::class, 'getDetails'])->name('khachhangquanly.get_details');
      Route::get('/{khachhangquanly}/edit', [CustomerProfileController::class, 'edit'])->name('khachhangquanly.admin.edit'); // Form sửa
      Route::put('/{khachhangquanly}', [CustomerProfileController::class, 'update'])->name('khachhangquanly.admin.update'); // Form sửa
      Route::delete('/{khachhangquanly}/delete', [CustomerProfileController::class, 'destroy'])->name('khachhangquanly.admin.destroy'); // Xóa tin
   });
   Route::prefix('faqs')->group(function () {
      Route::get('/', [FaqController::class, 'index'])->name('faqs.admin.index');
      Route::get('/create', [FaqController::class, 'create'])->name('faqs.admin.create');
      Route::post('/store', [FaqController::class, 'store'])->name('faqs.admin.store');
      Route::get('/{faq}/edit', [FaqController::class, 'edit'])->name('faqs.admin.edit'); // Form sửa
      Route::put('/{faq}', [FaqController::class, 'update'])->name('faqs.admin.update'); // Form sửa
      Route::delete('/{faq}/delete', [FaqController::class, 'destroy'])->name('faqs.admin.destroy'); // Xóa tin

   });
   Route::prefix('tin-tuc')->group(function () {
      Route::get('/', [NewsController::class, 'index'])->name('news.admin.index');
      Route::get('/create', [NewsController::class, 'create'])->name('news.admin.create');
      Route::post('/store', [NewsController::class, 'store'])->name('news.admin.store');
      Route::get('/{news}/edit', [NewsController::class, 'edit'])->name('news.admin.edit'); // Form sửa
      Route::get('/{news}/detail', [NewsController::class, 'detail'])->name('news.admin.detail'); // Form sửa
      Route::put('/{news}', [NewsController::class, 'update'])->name('news.admin.update'); // Form sửa
      Route::delete('/{news}/delete', [NewsController::class, 'destroy'])->name('news.admin.destroy'); // Xóa tin
   });
   Route::prefix('/news/{news}/faqs')->name('admin.news.faqs.')->group(function () {
      Route::get('/', [NewsFaqConcontroller::class, 'index'])->name('index');
      Route::get('/create', [NewsFaqConcontroller::class, 'create'])->name('create');
      Route::post('/', [NewsFaqConcontroller::class, 'store'])->name('store');
      Route::get('/{faq}/edit', [NewsFaqConcontroller::class, 'edit'])->name('edit');
      Route::put('/{faq}', [NewsFaqConcontroller::class, 'update'])->name('update');
      Route::delete('/{faq}', [NewsFaqConcontroller::class, 'destroy'])->name('destroy');
   });


   Route::prefix('phong-thuy')->name('phongthuy.admin.')->group(function () {
      Route::get('/', [PhongThuyController::class, 'index'])->name('index');
      Route::get('/create', [PhongThuyController::class, 'create'])->name('create');
      Route::post('/store', [PhongThuyController::class, 'store'])->name('store');
      Route::get('/{phongthuy}/detail', [PhongThuyController::class, 'detail'])->name('detail'); // Form sửa
      Route::get('/{phongthuy}/edit', [PhongThuyController::class, 'edit'])->name('edit');
      Route::put('/{phongthuy}', [PhongThuyController::class, 'update'])->name('update');
      Route::delete('/{phongthuy}', [PhongThuyController::class, 'destroy'])->name('destroy');
   });
   Route::prefix('/phong-thuy/{phongThuy}/faqs')->name('admin.phongthuy.faqs.')->group(function () {
      Route::get('/', [PhongThuyFaqController::class, 'index'])->name('index');
      Route::get('/create', [PhongThuyFaqController::class, 'create'])->name('create');
      Route::post('/', [PhongThuyFaqController::class, 'store'])->name('store');
      Route::get('/{faq}/edit', [PhongThuyFaqController::class, 'edit'])->name('edit');
      Route::put('/{faq}', [PhongThuyFaqController::class, 'update'])->name('update');
      Route::delete('/{faq}', [PhongThuyFaqController::class, 'destroy'])->name('destroy');
   });


   Route::prefix('dich-vu')->name('dichvu.admin.')->group(function () {
      Route::get('/', [DichVuController::class, 'index'])->name('index');
      Route::get('/create', [DichVuController::class, 'create'])->name('create');
      Route::post('/store', [DichVuController::class, 'store'])->name('store');
      Route::get('/{dichvu}/detail', [DichVuController::class, 'detail'])->name('detail'); // Form sửa
      Route::get('/{dichvu}/edit', [DichVuController::class, 'edit'])->name('edit');
      Route::put('/{dichvu}', [DichVuController::class, 'update'])->name('update');
      Route::delete('/{dichvu}', [DichVuController::class, 'destroy'])->name('destroy');
   });
   Route::prefix('/dich-vu/{dichvu}/faqs')->name('admin.dichvu.faqs.')->group(function () {
      Route::get('/', [DichVuFaqController::class, 'index'])->name('index');
      Route::get('/create', [DichVuFaqController::class, 'create'])->name('create');
      Route::post('/', [DichVuFaqController::class, 'store'])->name('store');
      Route::get('/{faq}/edit', [DichVuFaqController::class, 'edit'])->name('edit');
      Route::put('/{faq}', [DichVuFaqController::class, 'update'])->name('update');
      Route::delete('/{faq}', [DichVuFaqController::class, 'destroy'])->name('destroy');
   });
    Route::prefix('lich-tu-van')->name('lichtuvan.admin.')->group(function () {
       Route::get('/', [LichTuVanController::class, 'index'])->name('index');
       Route::patch('/{id}/update-status', [LichTuVanController::class, 'updateStatus'])->name('updateStatus');
    });
      Route::prefix('vai-tro')->name('admin.roles.')->group(function () {
        Route::get('/', [RolesControler::class, 'index'])->name('index');
        Route::get('/create', [RolesControler::class, 'create'])->name('create');
        Route::post('/', [RolesControler::class, 'store'])->name('store');
        Route::get('/{role}/edit', [RolesControler::class, 'edit'])->name('edit');
        Route::put('/{role}', [RolesControler::class, 'update'])->name('update');
        Route::delete('/{role}', [RolesControler::class, 'destroy'])->name('destroy');
    });
      Route::prefix('tai-khoan')->name('admin.users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });
});
Route::post('/upload-image', [UploadController::class, 'uploadImage'])->name('upload-image');
Route::post('/delete-image', [UploadController::class, 'deleteImage'])->name('delete-image');
