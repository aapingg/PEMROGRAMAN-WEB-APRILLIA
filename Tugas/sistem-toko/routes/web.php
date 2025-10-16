<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtsController;
use App\Http\Controllers\ProdukController;


Route::get('/produk/{angka}', [ProdukController::class, 'index']);


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

// Route::get('/about', function(){
//     return ("Ini halaman about")
// })->name(name:'about');

// Route::get('/contact', function(){
//     return ("Ini halaman kontak")
// })->name(name: 'contact');

// Route::get('/users/{id}', function($id){
//     return ("Nilai id users adalah " . $id);
// })->name(name: 'users');

// route::prefix('manage')->group(function(){
//     route::('/edit', function(){
//         return "Ini adalah halaman manage edit";
//     })->name(name:'barang');
//     route::('/barang', function(){
//         return "Ini adalah halaman manage barang";
//     })->name(name:'barang');
// });

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

// Route::middleware(['auth', 'RoleCheck:admin,owner'])->group(function () {
//     Route::get('/produk/{angka}', [ProductController::class, 'index']);
// });

// Route::get('/uts', function () {
//     return view('uts.index');
// });
Route::get('/uts', [UtsController::class, 'index'])->name('uts.index');
Route::get('/uts/web', [UtsController::class, 'web'])->name('uts.web');
Route::get('/uts/database', [UtsController::class, 'database'])->name('uts.database');

Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
Route::post('/product',[ProductController::class, 'store'])->name('product-store');

// Tampilkan semua produk
Route::get('/product', [ProductController::class, 'index'])->name('product-index');

// Edit produk
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product-edit');

// Update produk
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product-update');

// Hapus produk
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product-destroy');



require __DIR__.'/auth.php';
