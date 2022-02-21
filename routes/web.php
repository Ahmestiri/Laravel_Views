<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Welcome Page
Route::get('/', [App\Http\Controllers\UsersController::class, 'index']);
Auth::routes();

//User's Profile Page
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
