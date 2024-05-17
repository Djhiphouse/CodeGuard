<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', \App\Livewire\HomeView::class)->name('dashboard');
Route::get('/license', \App\Livewire\LicenseView::class)->name('license');
Route::get('/application', \App\Livewire\ApplicationView::class)->name('application');
Route::get('/session', \App\Livewire\SessionView::class)->name('session');
Route::get('/variable', \App\Livewire\VariableView::class)->name('variable');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
