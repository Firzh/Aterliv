<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ---------------------- GUEST ----------------------
Route::get('/', function () {
    return Auth::check() ? redirect()->route('user.home') : view('guest');
})->name('home');

Route::view('/artikel', 'artikel')->name('artikel');

// ---------------------- AUTH USER ----------------------
Route::middleware(['auth'])->group(function () {
    // Home user
    Route::get('/home', function () {
        return view('home');
    })->name('user.home');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Kalkulator
    Route::prefix('kalkulator')->name('pages.')->group(function () {
        Route::get('/kalkulator', [KalkulatorController::class, 'index'])->name('kalkulator');
        Route::post('/hitung', [KalkulatorController::class, 'hitung'])->name('hitung');
    });

    // Kontribusi
    Route::get('/kontribusi', [KontribusiController::class, 'index'])->name('pages.kontribusi');

    // Penjemputan Sampah

    Route::middleware('auth')->group(function () {
        Route::get('/jemput', [PenjemputanSampahController::class, 'index'])->name('pages.jemput');
        Route::get('/jemput/create', [PenjemputanSampahController::class, 'create'])->name('jemput.create');
        Route::post('/jemput', [PenjemputanSampahController::class, 'store'])->name('jemput.store');
    });


        Route::get('/penjemputan/create', [PenjemputanController::class, 'create'])->name('penjemputan.create');
        Route::post('/penjemputan/store', [PenjemputanController::class, 'store'])->name('penjemputan.store');

        // Halaman admin untuk lihat & approve
        Route::get('/penjemputan', [PenjemputanController::class, 'index'])->name('penjemputan.index');
        Route::post('/penjemputan/approve/{id}', [PenjemputanController::class, 'approve'])->name('penjemputan.approve');

        Route::get('/jemput/create', [PenjemputanSampahController::class, 'create'])->name('jemputan.create');



    // Reward
    Route::prefix('reward')->name('reward.')->group(function () {
        Route::get('/', [RewardController::class, 'index'])->name('index');
        Route::post('/tukar/{reward}', [RewardController::class, 'tukar'])->name('tukar');
        Route::get('/riwayat', [RewardController::class, 'riwayat'])->name('riwayat');
    });
});

//-----------------------PAGE----------------------
//komunitas
Route::get('/komunitas', [PageController::class, 'komunitas'])->name('pages.komunitas');

//statistik
Route::get('/statistik', [PageController::class, 'statistik'])->name('pages.statistik');

Route::get('/statistik', [KontribusiController::class, 'statistik'])->name('pages.statistik');



// ---------------------- ADMIN ----------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/users', [AdminController::class, 'index'])->name('users.index');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'userList'])->name('users.index');
    Route::post('/users/{user}/toggle-admin', [AdminController::class, 'toggleAdmin'])->name('users.toggleAdmin');
    Route::delete('/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
});


Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('penjemputan', PenjemputanController::class);
});
// ---------------------- User ADMIN CONTROLLER ----------------------

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', AdminController::class);
});


// ---------------------- INFORMASI PUBLIK ----------------------
Route::prefix('sampah')->name('pages.')->group(function () {
    Route::get('/', [JenisSampahController::class, 'index'])->name('index');
    Route::get('/{slug}', [JenisSampahController::class, 'show'])->name('show');
});

Route::prefix('lokasi')->name('pages.')->group(function () {
    Route::get('/', [LokasiDaurUlangController::class, 'index'])->name('lokasi');
});

// ---------------------- LOGIN GOOGLE ----------------------
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// ---------------------- BREEZE DEFAULT ----------------------
require __DIR__.'/auth.php';
