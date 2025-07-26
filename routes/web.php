<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

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

   Route::get('/', [HomeController::class, 'index'])->name('home');
   Route::get('/hoi-dap', [HomeController::class, 'faqs'])->name('faqs');
   Route::get('/lienhe', [HomeController::class, 'contact'])->name('contact');
   Route::post('/lien-he', [HomeController::class, 'storecontact']);

   Route::get('/tin-tuc', [HomeController::class, 'news'])->name('news');
   Route::get('/tin-tuc/chi-tiet/{news}', [HomeController::class, 'newsdetail'])->name('newsdetail');
   Route::get('/tin-tuc/danh-sach', [HomeController::class, 'newslist'])->name('newslist');

   Route::get('/dich-vu', [HomeController::class, 'dichvus'])->name('dichvus');
   Route::get('/dich-vu/chi-tiet/{dichvu}', [HomeController::class, 'dichvusdetail'])->name('dichvusdetail');


   Route::get('/login', [LoginController::class, 'showform'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('post_login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');