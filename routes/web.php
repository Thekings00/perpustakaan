<?php

use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;

// login
Route::get('/', [usercontroller::class, 'login'])->name('login');
Route::post('/login', [usercontroller::class, 'loginproses'])->name('login.proses');

// register
Route::get('/regist', [usercontroller::class, 'regist'])->name('regist');

Route::post('/regist', [usercontroller::class, 'registrasi'])->name('regist.tambahUser');


// dashboard dll
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/tambahbuku', function () {
    return view('tambahbuku');
});
