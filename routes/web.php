<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminCertificateController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminSkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminAboutController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\homeController;

// routes/web.php

// Route untuk halaman Home
Route::get('/', function () {
    return view('welcome');
});

// Route untuk dashboard pengguna (hanya untuk yang sudah login dan terverifikasi)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk profile (hanya untuk pengguna yang sudah autentikasi)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk admin (hanya untuk admin)
Route::middleware(['auth', 'admin'])->group(function () {
    
    // Admin dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Admin Project routes
    Route::resource('admin/project', AdminProjectController::class)
        ->names([
            'index' => 'admin.project.index',
            'create' => 'admin.project.create',
            'store' => 'admin.project.store',
            'show' => 'admin.project.show',
            'edit' => 'admin.project.edit',
            'update' => 'admin.project.update',
            'destroy' => 'admin.project.destroy',
        ]);

    // Admin About routes
    Route::resource('admin/about', AdminAboutController::class)
        ->names([
            'index' => 'admin.about.index',
            'create' => 'admin.about.create',
            'store' => 'admin.about.store',
            'show' => 'admin.about.show',
            'edit' => 'admin.about.edit',
            'update' => 'admin.about.update',
            'destroy' => 'admin.about.destroy',
        ]);
    
    // Admin Certificate routes
    Route::resource('admin/certificate', AdminCertificateController::class)
        ->names([
            'index' => 'admin.certificate.index',
            'create' => 'admin.certificate.create',
            'store' => 'admin.certificate.store',
            'show' => 'admin.certificate.show',
            'edit' => 'admin.certificate.edit',
            'update' => 'admin.certificate.update',
            'destroy' => 'admin.certificate.destroy',
        ]);

    // Admin Contact routes
    Route::resource('admin/contacts', AdminContactController::class)
        ->names([
            'index' => 'admin.contacts.index',
            'create' => 'admin.contacts.create',
            'store' => 'admin.contacts.store',
            'show' => 'admin.contacts.show',
            'edit' => 'admin.contacts.edit',
            'update' => 'admin.contacts.update',
            'destroy' => 'admin.contacts.destroy',
        ]);
});

// Route untuk halaman pages (general, bisa diakses oleh semua pengguna)
Route::resource('pages', PageController::class);

// Route untuk skill (general, bisa diakses oleh semua pengguna)
Route::resource('skill', AdminSkillController::class);

// Route untuk autentikasi (login, register, dll)
require __DIR__.'/auth.php';

// Route untuk home controller (admin specific)
Route::resource('home', homeController::class);
