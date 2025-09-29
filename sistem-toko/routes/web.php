<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function(){
    return ("Ini halaman about")
})->name: 'about';

Route::get('/contact', function(){
    return ("Ini halaman kontak")
})->name(name: 'contact');

Route::get('/users/{id}', function($id){
    return ("Nilai id users adalah " . $id);
})->name(name: 'users');

route::prefix('manage')->group(function(){
    route::('/edit', function(){
        return "Ini adalah halaman manage edit";
    })->name(name:'barang');
    route::('/barang', function(){
        return "Ini adalah halaman manage barang";
    })->name(name:'barang');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/rahasia', function () {
    return 'ini halaman rahasia';
})->middleware('auth', 'RoleCheck:admin');

Route::get('/produk', [ProductController::class, 'index']);

Route::get('/route_count/{id}', [ProductController::class, 'show']);

route::get('/utama', function () {
    return view('utama');
});

route::get('/home', function () {
    return view('home');
});

Route::middleware(['auth', 'RoleCheck:admin,owner'])->group(function () {
    Route::get('/produk/{angka}', [ProductController::class, 'index']);
});

require __DIR__.'/auth.php';
