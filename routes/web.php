<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|*********************
| Ada dua route student dengan students,
| saranku hapus salah satu karena fungsinya sama saja,
| tinggal tugasmu menyesuaikan referensi hapus student atau students (menggunakan kata jamak 's')
| rekomendasi setelah perubahan hapus saja pesan ini
| -Heru
|*********************
*/
Route::get('/students', [StudentController::class, 'index'])->middleware('auth','verified')->name('students');

Route::get('/student', function () {
    return view('pages.students.index');

})->middleware(['auth', 'verified'])->name('student');

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('admin/dashboard', [AdminController::class,
        'AdminDashboard'])->name('admin.dashboard');
}); //End Group Admin Middleware

//TODO route web staff

require __DIR__.'/auth.php';
