<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisSampahController;
use App\Http\Controllers\LokasiDaurUlangController;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\PenjemputanSampahController;
use App\Http\Controllers\KontribusiController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PenjemputanController;
// use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ---------------------- GUEST ROUTES ----------------------
// Rute untuk pengguna yang belum login.
// Jika pengguna sudah login, langsung arahkan ke halaman home mereka.
Route::get('/', function () {
    return Auth::check() ? redirect()->route('user.home') : view('guest');
})->name('home');

// Halaman artikel yang bisa diakses oleh siapa saja (tamu maupun user terautentikasi)
Route::view('/artikel', 'artikel')->name('artikel');


// ---------------------- AUTH USER ROUTES ----------------------
// Grup utama untuk semua rute yang memerlukan otentikasi pengguna.
Route::middleware(['auth'])->group(function () {

    // Home User
    Route::get('/home', function () {
        return view('home');
    })->name('user.home');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Kalkulator (Layanan Interaktif)
    // Perbaikan: Ubah '/kalkulator' menjadi '/' di dalam group agar URL menjadi '/kalkulator'
    Route::prefix('kalkulator')->name('pages.kalkulator.')->group(function () { // Lebih spesifik di nama rute
        Route::get('/', [KalkulatorController::class, 'index'])->name('index'); // pages.kalkulator.index
        Route::post('/hitung', [KalkulatorController::class, 'hitung'])->name('hitung'); // pages.kalkulator.hitung
    });

    // Kontribusi
    Route::get('/kontribusi', [KontribusiController::class, 'index'])->name('pages.kontribusi');

    // Penjemputan Sampah (Layanan Interaktif)
    Route::prefix('jemput')->name('pages.jemput.')->group(function () { // Lebih spesifik di nama rute
        Route::get('/', [PenjemputanSampahController::class, 'index'])->name('index'); // pages.jemput.index
        Route::get('/create', [PenjemputanSampahController::class, 'create'])->name('create'); // pages.jemput.create
        Route::post('/', [PenjemputanSampahController::class, 'store'])->name('store'); // pages.jemput.store
    });

    // Reward
    // Penamaan rute sudah cukup baik.
    Route::prefix('reward')->name('reward.')->group(function () {
        Route::get('/', [RewardController::class, 'index'])->name('index');
        Route::post('/tukar/{reward}', [RewardController::class, 'tukar'])->name('tukar');
        Route::get('/riwayat', [RewardController::class, 'riwayat'])->name('riwayat');
    });

    // --- INFORMATIONAL PAGES ---

    // Komunitas
    Route::get('/komunitas', [PageController::class, 'komunitas'])->name('pages.komunitas');

    // Jenis Sampah (Informasi Detail)
    Route::prefix('sampah')->name('pages.sampah.')->group(function () {
        Route::get('/', [JenisSampahController::class, 'index'])->name('index'); // pages.sampah.index
        Route::get('/{slug}', [JenisSampahController::class, 'show'])->name('show'); // pages.sampah.show
    });

    // Lokasi Daur Ulang (Informasi)
    Route::prefix('lokasi')->name('pages.lokasi.')->group(function () { // Lebih spesifik di nama rute
        Route::get('/', [LokasiDaurUlangController::class, 'index'])->name('index'); // pages.lokasi.index
    });

    // Peta
    Route::get('/peta', function () {
        return view('pages.peta');
    })->name('pages.peta');
});

// ---------------------- ADMIN ----------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'userList'])->name('users.index'); // Menampilkan daftar user
    Route::post('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggleAdmin');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('users.destroy'); // Menggunakan 'users.destroy' karena sudah di dalam grup 'admin.'

    // Product Management
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
        Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
        Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
        });

    


    // Penjemputan Management
    Route::resource('penjemputan', PenjemputanController::class); // Membuat: admin.penjemputan.index, admin.penjemputan.create, dll.
    Route::put('/admin/penjemputan/{penjemputan}/status', [PenjemputanSampahController::class, 'updateStatus'])
    ->name('penjemputan.updateStatus');
    Route::get('/admin/penjemputan', [PenjemputanSampahController::class, 'index'])
    ->name('penjemputan.index');


});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('penjemputan', PenjemputanController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', AdminController::class);
});

// Form input
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');

// Menyimpan produk
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');

// Menampilkan semua produk (halaman produk)
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
});


Route::get('/produk', [ProductController::class, 'userProductList'])->name('products.index');
Route::resource('products', ProductController::class);


// ---------------------- LOGIN GOOGLE ----------------------
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// ---------------------- BREEZE DEFAULT ----------------------
require __DIR__.'/auth.php';
