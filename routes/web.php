<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\SendEmailController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function(){
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/send-mail', [SendEmailController::class, 'index'])->name('kirim-email');

Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');

Route::get('/create-file', [FileController::class, 'createFile']);
Route::get('/get-file', [FileController::class, 'getFile']);
Route::get('/download-file', [FileController::class, 'downloadFile']);
Route::get('/copy-file', [FileController::class, 'copyFile']);
Route::get('/move-file', [FileController::class, 'moveFile']);

Route::resource('gallery', GalleryController::class);

Route::get('/info', [InfoController::class, 'index'])->name('info');
