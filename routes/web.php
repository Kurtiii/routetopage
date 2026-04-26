<?php

use Illuminate\Support\Facades\Route;
use League\Flysystem\Filesystem;

Route::get('/', [App\Http\Controllers\StaticController::class, 'index'])->name('index');
Route::get('/support', [App\Http\Controllers\StaticController::class, 'faq'])->name('faq.index');
Route::get('/privacy', [App\Http\Controllers\StaticController::class, 'privacy'])->name('faq.privacy');
Route::get('/guidelines', [App\Http\Controllers\StaticController::class, 'guidelines'])->name('faq.guidelines');
Route::get('/developers', [App\Http\Controllers\StaticController::class, 'developers'])->name('developers');

Route::post('/route', [App\Http\Controllers\RouteCodeController::class, 'store'])->name('route.store');

Route::get('/route/created', [App\Http\Controllers\RouteCodeController::class, 'created'])->middleware('throttle:10,1')->name('route.created');

Route::get('/r/{code}', [App\Http\Controllers\RouteCodeController::class, 'show'])
    ->name('route.show')
    ->where('code', '[A-Z0-9]{5}');

Route::get('/cleanup', [App\Http\Controllers\RouteCodeController::class, 'cleanup'])
    ->name('route.cleanup');


Route::get('/auth/redirect', [App\Http\Controllers\AuthenticationController::class, 'redirect'])
    ->name('auth.redirect');

Route::get('/auth/callback', [App\Http\Controllers\AuthenticationController::class, 'callback'])
    ->name('auth.callback');

Route::middleware(['auth'])->group(function () {
    Route::resource('developers/keys', App\Http\Controllers\KeyController::class)
        ->only(['index', 'create', 'store', 'destroy'])
        ->names('developers.keys');
});
