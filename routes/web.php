<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BankUjianController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Disini pintu awal user untuk akses aplikasi kita (login)
Route::get('/', function () {
    return view('auth.login');
});

// Disini adalah fitur profile user, mereka wajib login terlebih dahulu setelah itu baru dapat mengkaksesnya
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Disini adalah fitur admin , mereka dengan role admin dapat mengakses seluruh isi yang ada didalam group middleware hingga akhir grup
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //ujian >>penjadwalan
    Route::get('admin/ujian', [QuizController::class, 'index'])->name('ujian.index');
    Route::get('admin/{id}/ujian', [QuizController::class, 'index']);
    Route::get('guru/ujian', [QuizController::class, 'index']);
    Route::get('guru/{id}/ujian', [QuizController::class, 'index']);
    Route::post('/ujian/create', [QuizController::class, 'create'])->name('ujian.create');
    Route::get('/ujian/delete/{id}', [QuizController::class, 'destroy'])->name('ujian.delete');
    Route::get('/ujian/set/{id}', [QuizController::class])->name('ujian.set');

    //staff
    Route::resource('admin/users', UserController::class)->except(['show']);
    //murid
    Route::resource('admin/students', StudentController::class)->except(['show']);
    //mapel
    Route::resource('admin/mapels', MapelController::class)->except(['show']);
    //bank soal
    Route::resource('admin/banks', BankUjianController::class)->except(['show']);

}); //Akhir dari group admin middleware

// Setelah berhasil login, user akan diarahkan jika bukan admin akan masuk ke alur ini
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);

    // Penjadwalan
    Route::get('user/ujian', [QuizController::class, 'index']);
    Route::get('user/{id}/ujian', [QuizController::class, 'index']);
}); // Akhir dari group user middleware

require __DIR__.'/auth.php';
