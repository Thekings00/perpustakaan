<?php

use App\Http\Controllers\bukucontroller;
use App\Http\Controllers\peminjamcontroller;
use App\Http\Controllers\usercontroller;
use Illuminate\Support\Facades\Route;

// login
Route::get('/', [usercontroller::class, 'login'])->name('login');
Route::post('/login', [usercontroller::class, 'loginproses'])->name('login.proses');

// register
Route::get('/regist', [usercontroller::class, 'regist'])->name('regist');
Route::post('/regist', [usercontroller::class, 'registrasi'])->name('regist.tambahUser');

// dashboard buku
Route::get('/dashboardb', [bukucontroller::class, 'index'])->name('dashboardbuku');

// dashboard peminjam
Route::get('/dashboardp', [peminjamcontroller::class, 'index'])->name('dashboardpeminjam');
