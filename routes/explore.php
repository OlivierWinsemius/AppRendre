<?php

use Illuminate\Support\Facades\Route;

Route::prefix('explore')->name('explore.')->middleware(['auth', 'verified'])->group(function () {
    Route::inertia('/', 'explore/index')->name('index');
});
