<?php

use App\Http\Controllers\Explore\ExploreController;
use App\Http\Controllers\Explore\LanguageController;
use Illuminate\Support\Facades\Route;

Route::prefix('explore')->name('explore.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ExploreController::class, 'index'])->name('index');
    Route::get('/languages', [LanguageController::class, 'index'])->name('languages');
});
