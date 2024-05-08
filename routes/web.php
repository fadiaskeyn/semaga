<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankUjianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Disini pintu awal user untuk akses aplikasi kita (login)
Route::get('/', function () {
    return view('auth.login');
});

// Setelah berhasil login, user akan diarahkan jika bukan admin akan masuk ke alur ini
Route::get('/dashboard', [DashboardController::class, 'index']);

// Disini adalah fitur profile user, mereka wajib login terlebih dahulu setelah itu baru dapat mengkaksesnya
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Disini adalah fitur admin , mereka dengan role admin dapat mengakses seluruh isi yang ada didalam group middleware hingga akhir grup
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('users', UserController::class)->except(['show']);
    //student
    Route::resource('students', StudentController::class)->except(['show']);
    //mapel
    Route::resource('mapels', MapelController::class)->except(['show']);
    //bank soal
    Route::resource('banks', BankUjianController::class)->except(['show']);
}); //Akhir dari group admin middleware

require __DIR__.'/auth.php';
