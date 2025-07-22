<?php

use App\Http\Controllers\Client\HomeController;
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
