<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\Web\SchoolViewController;
use App\Http\Controllers\Web\StudentViewController;
use App\Http\Controllers\Web\SubjectViewController;


// Route::get('/', function () {
//     return view('welcome');
// });
// Redirect '/' to one of your resource indexes (example: schools)
Route::get('/', function () {
    return redirect()->route('students.index');
});
Route::get('/api', function () {
    return view('api');
});

Route::resource('schools', SchoolViewController::class);
Route::resource('students', StudentViewController::class);
Route::resource('subjects', SubjectViewController::class);