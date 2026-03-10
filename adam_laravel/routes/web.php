<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    return "Halaman User";
});

Route::get('/user/{id}', function ($id) {
    return "ID User: " . $id;
});

Route::get('/user/{id}/{nama}', function ($id, $nama) {
    return "ID: $id Nama: $nama";
});

Route::get('/produk/{nama?}', function ($nama = "Laptop") {
    return "Produk: " . $nama;
});

Route::redirect('/home','/user');

Route::view('/about','welcome');