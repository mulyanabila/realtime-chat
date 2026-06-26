<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {

    // DASHBOARD (CHAT)
    Route::get(
        '/dashboard',
        [ContactController::class, 'index']
    )->name('dashboard');


    // HALAMAN KONTAK
    Route::get(
        '/contacts',
        [ContactController::class, 'contacts']
    )->name('contacts');


    Route::post(
        '/contacts/add',
        [ContactController::class, 'add']
    );

        // HALAMAN PROFIL
    Route::get(
        '/profile',
        [ProfileController::class, 'index']
    )->name('profile');

    // HALAMAN EDIT PROFIL
    Route::get(
        '/profile/edit',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    // UPDATE PROFIL
    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    // HAPUS AKUN
    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');
        Route::get(
            '/chat/{id}',
            [ChatController::class, 'index']
        );

    Route::post(
        '/chat/send',
        [ChatController::class, 'send']
    );

});

require __DIR__.'/auth.php';