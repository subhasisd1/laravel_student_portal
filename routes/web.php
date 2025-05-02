<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::resource('students', StudentController::class);

Route::get('/', function () {
    return redirect()->route('students.index');
});