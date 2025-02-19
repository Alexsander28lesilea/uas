<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('qrcode')->group(function () {
    Route::get('/', [QrCodeController::class, 'index'])->name('qrcode.index');
    Route::post('/store', [QRCodeController::class, 'store'])->name('qrcode.store');
    Route::get('/generate/{id}', [QRCodeController::class, 'generate'])->name('qrcode.generate');
});
Route::get('/captcha', [CaptchaController::class, 'generateCaptcha']);
require __DIR__.'/auth.php';
