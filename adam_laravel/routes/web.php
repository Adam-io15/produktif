<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//========================================================================

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

// ========================================================================

Route::get(uri: '/user/{id}/profile', action: function ($id): string {
    return "Profile User ID: " . $id;
})->name('user.profile');

Route::get(uri: '/profile', action: function (): string {
    return "Halaman Profile";
})->name('profile');

Route::get(uri: '/cek-url', action: function (): string {
    $url = route('profile');
    $urlWithParam = route('user.profile', ['id' => 1]);
    return "URL Profile: " . $url . " | URL dengan ID: " . $urlWithParam;
});

Route::middleware(['web'])->group(function () {
    Route::get(uri: '/dashboard', action: function (): string {
        return "Halaman Dashboard";
    });
});

Route::prefix('admin')->group(function () {
    Route::get(uri: '/users', action: function (): string {
        return "Admin: Daftar Users";
    });
    Route::get(uri: '/settings', action: function (): string {
        return "Admin: Settings";
    });
});

Route::name('admin.')->group(function () {
    Route::get(uri: '/admin/laporan', action: function (): string {
        return "Admin: Laporan";
    })->name('laporan');
});