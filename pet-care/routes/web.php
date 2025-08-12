<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Livewire\Admin\SliderManager;

// User home page returns master blade (not Livewire directly)
Route::get('/', [UserController::class, 'showSliders'])->name('user.home');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/sliders', SliderManager::class)->name('sliders.index');
    

});
