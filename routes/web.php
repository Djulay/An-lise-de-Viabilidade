<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return Auth::user()->role === 'super-admin' ? redirect()->route('admin.dashboard') : redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

});



require __DIR__.'/auth.php';
