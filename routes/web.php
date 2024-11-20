<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KamarController as AdminKamarController;
use App\Http\Controllers\Admin\PenghuniController as AdminPenghuniController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\Admin\PengumumanController as AdminPengumumanController;
use App\Http\Controllers\Admin\FasilitasController as AdminFasilitasController;
use App\Http\Controllers\Admin\AboutController as AdminAboutController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;

// Public Routes
Route::group([], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::get('/fasilitas/{id}', [FasilitasController::class, 'detail'])->name('fasilitas.detail');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/about/sejarah', [AboutController::class, 'sejarah'])->name('about.sejarah');
    Route::get('/about/visi', [AboutController::class, 'visi'])->name('about.visi');
    Route::get('/about/misi', [AboutController::class, 'misi'])->name('about.misi');
    Route::resource('galeri', GalleryController::class);
    // Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
    // Route::get('/galeri/{id}', [GalleryController::class, 'detail'])->name('galeri.detail');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update');
});

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes (just need auth middleware now)
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('kamar', AdminKamarController::class);
    Route::resource('penghuni', AdminPenghuniController::class);
    Route::resource('pembayaran', AdminPembayaranController::class);
    Route::resource('pengumuman', AdminPengumumanController::class);
    Route::resource('fasilitas', AdminFasilitasController::class);
    Route::resource('booking', AdminBookingController::class);
    Route::resource('gallery', AdminGalleryController::class);
    Route::get('about', [AdminAboutController::class, 'index'])->name('about.index');
    Route::put('about', [AdminAboutController::class, 'update'])->name('about.update');
});