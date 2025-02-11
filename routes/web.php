<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;
use App\Livewire\Ads\CreateAd;
use App\Livewire\Ads\ManageAds;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');


Route::middleware(['auth'])->group(function () {
    Route::get('/ads/create', CreateAd::class)->name('ads.create'); // Create Ad
    Route::get('/ads/manage', ManageAds::class)->name('ads.manage'); // Manage Ads
});

Route::post('/logout', [Logout::class, 'logout'])->name('logout');
