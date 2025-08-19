<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// User home page returns master blade (not Livewire directly)
Route::get('/', [UserController::class, 'showSliders'])->name('user.home');

