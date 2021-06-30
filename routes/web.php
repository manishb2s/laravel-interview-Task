<?php

use Illuminate\Support\Facades\Route;

Route::get('/', static fn () => view('welcome'))->name('home');

Route::get('/dashboard', static function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require_once __DIR__ . '/auth.php';
