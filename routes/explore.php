<?php

use App\Http\Controllers\Explore\ExploreController;
use Illuminate\Support\Facades\Route;

Route::prefix('explore')->name('explore.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ExploreController::class, 'index'])->name('index');
});
