<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\SliderManager;


// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/sliders', SliderManager::class)->name('sliders.index');
    

});
