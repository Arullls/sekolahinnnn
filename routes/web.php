<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/sisterpadu', function () {
    return view('/sisterpadu');
});

// Route untuk menampilkan halaman login (GET)
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        // Cek role dan redirect ke dashboard sesuai role
        if ($user->role === 'admin') {
            return response()->json(['message' => 'Login berhasil', 'redirect' => '/admin/dashboard']);
        } elseif ($user->role === 'siswa') {
            return response()->json(['message' => 'Login berhasil', 'redirect' => '/siswa/dashboard']);
        } else {
            return response()->json(['message' => 'Login berhasil', 'redirect' => '/user/dashboard']);
        }
    }

    return response()->json(['message' => 'Email atau password salah'], 401);
});


Route::get('admin/dashboard', [DashboardController::class, 'indexx'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->group(function () {

    // Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard'); // misalnya
    Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::delete('/menu/{id}', [\App\Http\Controllers\Admin\MenuController::class, 'destroy']);
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
});

Route::get('/pengaturan/menu', [MenuController::class, 'index'])->name('admin.menu.index');



Route::post('/axios-test-submit', function (Request $request) {
    return response()->json([
        'message' => 'Berhasil dikirim!',
        'data' => $request->all()
    ]);
});
