<?php

use App\Livewire\BirdForm;
use App\Livewire\Bookmarks;
use App\Livewire\Counter;
use App\Livewire\Lazy;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::get('/bookmarks',Bookmarks::class)->name('bookmarks');
Route::get('/counter',Counter::class)->name('counter');
Route::get('/bird',BirdForm::class)->name('bird');
Route::get('/lazy',Lazy::class)->name('lazy')->lazy();

require __DIR__.'/auth.php';
