<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

// Halaman Depan (Bisa diakses siapa saja)
Route::get('/', [GalleryController::class, 'index'])->name('home');

// Grup Route Khusus Admin (Harus Login)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::delete('/gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    
    // Dashboard bawaan breeze (bisa dihapus/diabaikan)
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
