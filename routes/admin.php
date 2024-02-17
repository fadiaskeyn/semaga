<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// route aneh taruh sini aja decks

Route::get('/student', function () {
    return view('pages.students.index');

});
require __DIR__.'/auth.php';
