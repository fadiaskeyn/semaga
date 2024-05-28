<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankUjianController;
// use App\Http\Controllers\TransgressionController;

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

    //user Admin + Staff
    Route::get('users', [UserController::class, 'index'])->name('user.index');
    Route::post('users', [UserController::class, 'store'])->name('user.index');
    Route::get('users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('user.destroy');


    Route::resource('users', UserController::class)->except(['show']);

    //student
    Route::resource('students', StudentController::class)->except(['show']);
    //mapel
    Route::resource('mapels', MapelController::class)->except(['show']);
    //bank soal
    Route::resource('banks', BankUjianController::class)->except(['show']);
}); //Akhir dari group admin middleware


    // Route untuk menampilkan daftar mapel
    Route::get('/mapels', [MapelController::class, 'index'])->name('mapels.index');

    // Route untuk menampilkan form pembuatan mapel baru
    Route::get('/mapels/create', [MapelController::class, 'create'])->name('mapels.create');

    // Route untuk menyimpan mapel baru yang dibuat
    Route::post('/mapels', [MapelController::class, 'store'])->name('mapels.store');

    // Route untuk menampilkan form edit mapel
    Route::get('/mapels/{id}/edit', [MapelController::class, 'edit'])->name('mapels.edit');

    // Route untuk menyimpan perubahan pada mapel yang diedit
    Route::put('/mapels/{id}', [MapelController::class, 'update'])->name('mapels.update');

    // Route untuk menghapus mapel
    Route::delete('/mapels/{id}', [MapelController::class, 'destroy'])->name('mapels.destroy');


    // //Transgression
    // Route::resource('transgressions', TransgressionController::class)->except(['show',]);
; //End Group Admin Middleware

require __DIR__.'/auth.php';
(function () {
    Route::resource('users', UserController::class)->except(['show']);
    //student
    Route::resource('students', StudentController::class)->except(['show']);
    //mapel
    Route::resource('mapels', MapelController::class)->except(['show']);
    //bank soal
    Route::resource('banks', BankUjianController::class)->except(['show']);

    Route::get('/createBank', [BankUjianController::class, 'create'])->name('createBank');

}); //Akhir dari group admin middleware

// route coba coba

Route::get('coba', function () {
    return view('admin.BankUjian.coba');
});
// akhir route coba coba

require __DIR__.'/auth.php';

