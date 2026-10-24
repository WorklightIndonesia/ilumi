<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/preview/hero-section/{token}', function (string $token) {
    $data = Cache::get('hero-preview:' . $token);

    abort_if($data === null, 404, 'Preview sudah kedaluwarsa.');

    return view('preview.hero-section', compact('data'));
})->name('preview.hero-section');
