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
Route::get('/tambahb',[bukucontroller::class, 'create'])->name('create-buku');
Route::post('/tambahb',[bukucontroller::class, 'store'])->name('store-buku');
Route::get('/editb/{id}',[bukucontroller::class, 'edit'])->name('edit-buku');
Route::post('/editb/{id}', [bukucontroller::class, 'update'])->name('update-buku');
Route::delete('/deleteb/{id}', [bukucontroller::class, 'destroy'])->name('delete-buku');

// dashboard peminjam
Route::get('/dashboardp', [peminjamcontroller::class, 'index'])->name('dashboardpeminjam');
Route::get('/tambahp', [peminjamcontroller::class, 'create'])->name('create-peminjam');
Route::post('/tambahp',[peminjamcontroller::class, 'store'])->name('store-pinjam');
Route::get('/editp/{id}',[peminjamcontroller::class, 'edit'])->name('edit-peminjam');
Route::post('/editp/{id}', [peminjamcontroller::class, 'update'])->name('update-peminjam');
Route::delete('/deletep/{id}', [peminjamcontroller::class, 'destroy'])->name('delete-peminjam');
