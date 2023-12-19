<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MuridController;



Route::get('/', function () {
    return view('layout.main');
});

Route::get('/home', function () {
    return view('layout.home');
});

Route::get('/siswa/add', function () {
    return view('siswa.formadd');
});

Route::resource('/siswa', \App\Http\Controllers\MuridController::class);

// Route::update('siswa/{id}', [MuridController::class, 'update']->name('siswa.update'));