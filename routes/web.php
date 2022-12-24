<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [StudentController::class, 'index'])->name('student.create');
Route::get('/show', [StudentController::class, 'create'])->name('student.show');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::get('/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
Route::post('/store', [StudentController::class, 'store'])->name('student.store');
Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update');

