<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\QuizController;
use App\Http\Controllers\TransgressionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    //route ujian DLL
    Route::get('admin/ujian',[QuizController::class,'index']);
    Route::get('admin/{id}/ujian',[QuizController::class,'index']);
    Route::get('guru/ujian',[QuizController::class,'index']);
    Route::get('guru/{id}/ujian',[QuizController::class,'index']);
    Route::post('/ujian/create',[QuizController::class,'create'])->name('ujian.create');
    Route::get('/ujian/delete/{id}', [QuizController::class, 'destroy'])->name('ujian.delete');
    Route::get('/ujian/set/{id}', [QuizController::class])->name('ujian.set');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //user
    Route::resource('users', UserController::class)->except(['show']);
    //student

    Route::get('students', [StudentController::class, 'index'])->name('students.index');
    Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('students', [StudentController::class, 'store'])->name('students.index');
    Route::get('students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

    //Transgression
    // Route::resource('transgressions', TransgressionController::class)->except([
    //     'show',
    // ]);

Route::middleware(['auth', 'role:user'])->group(function () {
});

    Route::resource('students', StudentController::class)->except(['show']);

}); //End Group Admin Middleware

require __DIR__.'/auth.php';
